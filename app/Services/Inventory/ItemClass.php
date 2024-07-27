<?php

namespace App\Services\Inventory;

use App\Models\ListDropdown;
use App\Models\InventoryItem;

class ItemClass
{
    public function __construct()
    {   
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
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
}
