<?php

namespace App\Services\Inventory;

use App\Models\Laboratory;
use App\Models\ListDropdown;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use App\Models\InventorySupplier;
use App\Models\InventoryWithdrawal;
use App\Models\InventoryEquipment;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Inventory\ItemResource;
use App\Http\Resources\Inventory\SupplierResource;

class SaveService
{
    public $laboratory;

    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }
    
    public function supplier($request){
        $data = InventorySupplier::create(array_merge($request->all(),['laboratory_id' => $this->laboratory, 'user_id' => \Auth::user()->id]));
        return [
            'data' => new SupplierResource($data),
            'message' => 'Supplier creation was successful!', 
            'info' => "You've successfully created the new supplier."
        ];
    }

    public function item($request){
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
            'code' => date('Ymdhis')
        ]));
        return [
            'data' => new DefaultResource($data),
            'message' => 'Stock was added successful!', 
            'info' => "You've successfully added the new stock."
        ];
    }

    public function equipment($request){
        $data = InventoryEquipment::create(array_merge($request->all(),[
            'code' => date('Ymdhis'),
            'laboratory_id' => $this->laboratory, 
            'laboratory_type' => 9,
            'user_id' => \Auth::user()->id
        ]));
        return [
            'data' => new DefaultResource($data),
            'message' => 'Equipment was added successful!', 
            'info' => "You've successfully added the new equipment."
        ];
    }

    public function withdraw($request){
        $items = $request->carts;
        foreach($items as $item){
            $stock = InventoryStock::where('id',$item['id'])->first();
            $stock->quantity = $stock->quantity - $item['qnty'];
            if($stock->save()){
                $withdrawal = new InventoryWithdrawal;
                $withdrawal->quantity = $item['qnty'];
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

    public function generateCode($request){
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $c = InventoryItem::where('laboratory_id',$this->laboratory)->count();
        $code = $lab->code.'-INV-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
