<?php

namespace App\Services\Laboratory;

use App\Models\TsrSample;
use App\Http\Resources\Laboratory\SampleRegisterResource;

class SampleRegisterClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function lists($request){
        $data = SampleRegisterResource::collection(
            TsrSample::query()
            ->with('status','sample','testservice.method.method','testservice.testname','sample','analyst.profile')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%");
            })
            ->whereHas('sample',function ($query){
                $query->whereHas('tsr',function ($query){
                    $query->where('laboratory_id',$this->laboratory);
                });
            })
            ->paginate($request->count)
        );
        return $data;
    }
}
