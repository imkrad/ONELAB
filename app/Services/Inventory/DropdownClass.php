<?php

namespace App\Services\Inventory;

use App\Models\ListDropdown;
use App\Models\LocationRegion;

class DropdownClass
{
    public function categories(){
        $data = ListDropdown::where('classification','Inventory')->where('type','Category')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'color' => $item->color
            ];
        });
        return $data;
    }

    public function units(){
        $data = ListDropdown::where('classification','Inventory')->where('type','Unit')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function types(){
        $data = ListDropdown::where('classification','Inventory Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function regions(){
        $data = LocationRegion::all()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->region
            ];
        });
        return $data;
    }
}
