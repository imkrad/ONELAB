<?php

namespace App\Services\Inventory;

use App\Models\ListDropdown;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use App\Models\InventoryWithdrawal;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\Inventory\StockResource;
use App\Http\Resources\Inventory\ItemResource;

class ItemClass
{
    public function __construct()
    {   
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function lists($request){
        $data = ItemResource::collection(
            InventoryItem::query()
            ->with('category','unittype','stocks.withdrawals')
            ->where('laboratory_id',$this->laboratory)
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->withCount([
                'stocks as onhand' => function (Builder $query) {
                    $query->select(\DB::raw('SUM(onhand)'));
                }, 
                'stocks as stock' => function (Builder $query) {
                    $query->select(\DB::raw('SUM(
                    CASE
                        WHEN inventory_stocks.unit_id = inventory_items.unit_id THEN inventory_stocks.unit * inventory_stocks.onhand
                        WHEN inventory_stocks.unit_id = 123 AND inventory_items.unit_id = 124 THEN inventory_stocks.unit * inventory_stocks.onhand * 1000
                        WHEN inventory_stocks.unit_id = 124 AND inventory_items.unit_id = 123 THEN inventory_stocks.unit * inventory_stocks.onhand * 0.001
                        WHEN inventory_stocks.unit_id = 125 AND inventory_items.unit_id = 126 THEN inventory_stocks.unit * inventory_stocks.onhand * 0.001
                        WHEN inventory_stocks.unit_id = 126 AND inventory_items.unit_id = 125 THEN inventory_stocks.unit * inventory_stocks.onhand * 1000
                        ELSE inventory_stocks.unit * inventory_stocks.onhand
                    END)'))
                        ->where('onhand', '!=', 0);
                }
            ])
            ->paginate($request->count)
        );
        return $data;
    }

    public function search($request){
        $keyword = $request->keyword;
        $data = InventoryItem::with('category','unittype')
            ->withWhereHas('stocks', function ($query) use ($keyword){
                $query->with('withdrawals','unittype','item:id,name')->where('onhand', '!=', 0);   
            })
            ->where('laboratory_id',$this->laboratory)
            ->where('name', 'LIKE', "%{$keyword}%")
            ->withCount([
                'stocks as onhand' => function (Builder $query) {
                    $query->select(\DB::raw('SUM(onhand)'));
                }, 
                'stocks as stock' => function (Builder $query) {
                    $query->select(\DB::raw('SUM(
                    CASE
                        WHEN inventory_stocks.unit_id = inventory_items.unit_id THEN inventory_stocks.unit * inventory_stocks.onhand
                        WHEN inventory_stocks.unit_id = 123 AND inventory_items.unit_id = 124 THEN inventory_stocks.unit * inventory_stocks.onhand * 1000
                        WHEN inventory_stocks.unit_id = 124 AND inventory_items.unit_id = 123 THEN inventory_stocks.unit * inventory_stocks.onhand * 0.001
                        WHEN inventory_stocks.unit_id = 125 AND inventory_items.unit_id = 126 THEN inventory_stocks.unit * inventory_stocks.onhand * 0.001
                        WHEN inventory_stocks.unit_id = 126 AND inventory_items.unit_id = 125 THEN inventory_stocks.unit * inventory_stocks.onhand * 1000
                        ELSE inventory_stocks.unit * inventory_stocks.onhand
                    END)'))
                        ->where('onhand', '!=', 0);
                }
            ])
            ->limit(5)->get();
        return ItemResource::collection($data);
    }

    public function save($request){
        $data = InventoryItem::create(array_merge($request->all(),[
            'code' => $this->generateCode($request),
            'laboratory_id' => $this->laboratory,
            'img' => 'avatar.jpg'
        ]));
        return [
            'data' => new ItemResource($data),
            'message' => 'Item creation was successful!', 
            'info' => "You've successfully created the new item."
        ];
    }

    public function stock($request){
        $data = InventoryStock::create(array_merge($request->all(),[
            'code' => date('Ymdhis'),
            'onhand' => $request->quantity,
            'user_id' => \Auth::user()->id
        ]));
        $data = InventoryStock::with('suppliers')->where('id',$data->id)->first();
        return [
            'data' => new StockResource($data),
            'message' => 'Stock was added successful!', 
            'info' => "You've successfully added the new stock."
        ];
    }

    public function withdraw($request){
        $items = $request->carts;
        foreach($items as $item){
            $stock = InventoryStock::where('id',$item['id'])->first();
            $stock->quantity = $stock->quantity - $item['quantity'];
            if($stock->save()){
                $withdrawal = new InventoryWithdrawal;
                $withdrawal->quantity = $item['quantity'];
                $withdrawal->stock_id = $item['id'];
                $withdrawal->user_id = \Auth::user()->id;
                if($withdrawal->save()){
                    return [
                        'data' => [],
                        'message' => 'Withdraw was successful!', 
                        'info' => "You've successfully updated the stock."
                    ];
                }
            }
        }
    }

    public function update($request){
        $data = InventoryItem::findOrFail($request->id)->update($request->all());
        $data = InventoryItem::with('category')->where('id',$request->id)->first();
        return [
            'data' => $data,
            'message' => 'Item updated successfully!', 
            'info' => "You've successfully updated item."
        ];
    }

    public function categories(){
        $data = ListDropdown::where('classification','Inventory')
        ->where('type','Category')->where('is_active',1)
        ->withCount(['inventory_category' => function ($query) {
            $query->where('laboratory_id', $this->laboratory);
        }])->get();
        return $data;
    }

    public function statuses(){
        return [
            'Active' => InventoryItem::where('is_active',1)->count(),
            'Inactive' => InventoryItem::where('is_active',0)->count()
        ];
    }

    public function reminders(){
        $itemsBelowReorderLevel = InventoryItem::all()->filter(function ($item) {
            return $item->isBelowReorderLevel();
        });
        $count = $itemsBelowReorderLevel->count();
        return [
            [
                'name' => 'All items',
                'description' => 'List of items',
                'count' => InventoryItem::count(),
                'icon' => 'ri-inbox-fill',
                'color' => 'bg-success-subtle text-success'
            ],
            [
                'name' => 'Expired Items',
                'description' => 'Check for expiration',
                'count' => InventoryStock::where('expired_at','<',now())->count(),
                'icon' => 'ri-error-warning-fill',
                'color' => 'bg-danger-subtle text-danger'
            ],
            [
                'name' => 'Out of Stocks',
                'description' => 'Please restock soon',
                'count' => InventoryItem::whereDoesntHave('stocks', function ($query) { $query->where('onhand', '>', 0); })->count(),
                'icon' => 'ri-alert-fill',
                'color' => 'bg-warning-subtle text-warning'
            ],
            [
                'name' => 'For Reorder',
                'description' => 'Resupply needed urgently',
                'count' => $count,
                'icon' => 'ri-shopping-cart-fill',
                'color' => 'bg-primary-subtle text-primary'
            ],
        ];
    }
}
