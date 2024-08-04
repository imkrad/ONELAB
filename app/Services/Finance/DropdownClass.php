<?php

namespace App\Services\Finance;

use App\Models\ListStatus;
use App\Models\ListDropdown;
use App\Models\FinanceOrseries;

class DropdownClass
{
    public function collections(){
        $data = ListDropdown::where('classification','Collection Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function payments(){
        $data = ListDropdown::where('classification','Payment Mode')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function deposits(){
        $data = ListDropdown::where('classification','Deposit Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function statuses($type){
        $data = ListStatus::where('type',$type)->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'color' => $item->color,
                'others' => $item->others,
            ];
        });
        return $data;
    }

    public function orseries(){
        $data = FinanceOrseries::where('is_active',1)->where('user_id',\Auth::user()->id)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'start' => $item->start,
                'next' => $item->next,
                'end' => $item->end
            ];
        });
        return $data;
    }
}
