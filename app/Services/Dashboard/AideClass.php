<?php

namespace App\Services\Dashboard;

use App\Models\TsrSample;
use App\Models\ListDropdown;
use App\Http\Resources\Laboratory\DisposalResource;

class AideClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function lists($request){
        $data = DisposalResource::collection(
            TsrSample::query()
            ->withWhereHas('disposal')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%");
            })
            ->withWhereHas('tsr',function ($query) use ($request){
                $query->where('laboratory_id',$this->laboratory);
                $query->when($request->type, function ($query, $type) {
                    $query->where('laboratory_type',$type);
                });
            })
            ->orderBy('created_at','DESC')
            ->paginate($request->count)
        );
        return $data;
    }

    public function fordisposal($request){
        $data = TsrSample::whereDoesntHave('disposal')->with('analyses.testservice.testname','analyses.analyst')
        ->where('code', 'LIKE', "%{$request->keyword}%")->where('is_completed',1)->where('is_disposed',0)
        ->orderBy('updated_at','ASC')
        ->get()
        ->map(function ($item) {
            return [
                'value' => $item->id,
                'code' => $item->code,
                'name' => $item->name,
                'date' => $item->updated_at,
                'analyses' => $item->analyses
            ];
        });
        return $data;
    }

    public function samples($request){
        $keyword = $request->keyword;
        $data = TsrSample::whereDoesntHave('disposal')->with('analyses.testservice.testname','analyses.analyst')
        ->where('code', 'LIKE', "%{$keyword}%")->where('is_completed',1)->where('is_disposed',0)
        ->get()
        ->map(function ($item) {
            return [
                'value' => $item->id,
                'code' => $item->code,
                'name' => $item->name,
                'analyses' => $item->analyses
            ];
        });
        return $data;
    }

    public function disposals(){
        $data = ListDropdown::where('classification','Disposal')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }
}
