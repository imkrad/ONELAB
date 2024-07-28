<?php

namespace App\Services\Inventory;

use App\Models\ListDropdown;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use Illuminate\Database\Eloquent\Builder;
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
                    $query->select(\DB::raw('SUM(unit * onhand)'))
                        ->where('onhand', '!=', 0);
                }
            ])
            ->paginate($request->count)
        );
        return $data;
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
