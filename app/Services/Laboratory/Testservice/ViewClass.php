<?php

namespace App\Services\Laboratory\Testservice;

use App\Models\TestserviceName;
use App\Models\Laboratory;
use App\Models\TestserviceMethod;
use App\Models\Testservice;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Laboratory\TestserviceResource;

class ViewClass
{
    public function __construct()
    {
        $this->role = (\Auth::check()) ? \Auth::user()->role : null;
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function lists($request){
        $data = DefaultResource::collection(
            Testservice::query()
            ->when($this->role != 'Administrator', function ($query) {
                $query->where('laboratory_id',$this->laboratory);
            })
            ->when($request->laboratory, function ($query, $laboratory) {
                $query->where('laboratory_type',$laboratory);
            })
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('sampletype', function ($query) use ($keyword){
                    $query->where('name', 'LIKE', "%{$keyword}%");
                })->orWhereHas('testname', function ($query) use ($keyword){
                    $query->where('name', 'LIKE', "%{$keyword}%");
                })->orWhereHas('method', function ($query) use ($keyword){
                    $query->whereHas('method', function ($query) use ($keyword){
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                });
            })
            ->with('fees')
            ->with('sampletype','testname','laboratory.member','laboratory.address.region','type')
            ->with('method.method','method.reference')
            ->where('is_active',1)
            ->orderBy('created_at','DESC')
            ->paginate($request->count)
        );
        return $data;
    }

    public function search($request){
        $keyword = $request->keyword;
        $type = $request->type;
        $laboratory = $request->laboratory_type;

        $data = TestserviceName::where('name', 'LIKE', "%{$keyword}%")->where('type_id',$type)->where('laboratory_type',$laboratory)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
            ];
        });
        return $data;
    }

    public function methods($request){
        $laboratory = $request->laboratory_type;
        $keyword = $request->keyword;
      
        $data = DefaultResource::collection(
            TestserviceMethod::query()
            ->where('is_active',1)
            ->withWhereHas('method', function ($query) use ($keyword){
                $query->select('id','name','short');
                $query->when($keyword, function ($query, $keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('short', 'LIKE', "%{$keyword}%");
                });
            })
            ->withWhereHas('reference', function ($query) use ($keyword){
                $query->select('id','name');
                $query->when($keyword, function ($query, $keyword) {
                    $query->orWhere('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->where('laboratory_type',$laboratory)
            ->paginate($request->count)
        );
        return $data;
    }

    public function testservices($request){
        $data = TestserviceResource::collection(
            Testservice::query()
            ->when($this->role != 'Administrator', function ($query) {
                $query->where('laboratory_id',$this->laboratory);
            })
            ->when($request->laboratory_type, function ($query, $laboratory) {
                $query->where('laboratory_type',$laboratory);
            })
            ->when($request->sampletype_id, function ($query, $sampletype) {
                $query->where('sampletype_id',$sampletype);
            })
            ->with('sampletype','laboratory.member','laboratory.address.region','type')
            ->with('method.method','method.reference')
            ->with(['testname' => function ($query) {
                $query->orderBy('name', 'asc');
            }])
            ->where('is_active',1)
            ->get()
        );
        return $data;
    }
}
