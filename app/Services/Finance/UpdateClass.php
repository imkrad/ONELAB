<?php

namespace App\Services\Finance;

use App\Models\ListDropdown;
use App\Models\FinanceName;
use App\Models\FinanceOrseries;
use App\Http\Resources\DefaultResource;

class UpdateClass
{
    public function collection($request){
        $data = ListDropdown::where('id',$request->id)->first();
        $data->update($request->all());

        return [
            'data' => new DefaultResource($data),
            'message' => 'Collection type update was successful!', 
            'info' => "You've successfully updated the selected collection type."
        ];
    }

    public function name($request){
        $data = FinanceName::where('id',$request->id)->first();
        $data->update($request->all());

        return [
            'data' => new DefaultResource($data),
            'message' => 'Name update was successful!', 
            'info' => "You've successfully updated the selected name."
        ];
    }


    public function orseries($request){
        $data = FinanceOrseries::where('id',$request->id)->first();
        $data->update($request->all());

        return [
            'data' => new DefaultResource($data),
            'message' => 'Orseries update was successful!', 
            'info' => "You've successfully updated the selected orseries."
        ];
    }
}
