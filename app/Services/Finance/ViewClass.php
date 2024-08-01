<?php

namespace App\Services\Finance;

use App\Exports\OrExport;
use App\Models\ListDropdown;
use App\Models\FinanceOp;
use App\Models\FinanceOrseries;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Finance\OpResource;

class ViewClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function ops($request){
        $data = OpResource::collection(
            FinanceOp::query()
            ->with('items.tsr','or')
            ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
            ->with('collection:id,name','payment:id,name','status:id,name,color,others')
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
            ->with('customer.contact:id,email,contact_no,customer_id')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")
                ->orWhereHas('customer',function ($query) use ($keyword) {
                    $query->whereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                })
                ->orWhereHas('or',function ($query) use ($keyword) {
                    $query->where('number', 'LIKE', "%{$keyword}%");
                });
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status_id',$status);
            })
            ->orderBy('created_at','DESC')
            ->paginate($request->count)
        );
        return $data;
    }

    public function ops_pending($request){
        $data = OpResource::collection(
            FinanceOp::query()
            ->with('items.tsr','or')
            ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
            ->with('collection:id,name','payment:id,name','status:id,name,color,others')
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
            ->with('customer.contact:id,email,contact_no,customer_id')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")
                ->orWhereHas('customer',function ($query) use ($keyword) {
                    $query->whereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                })
                ->orWhereHas('or',function ($query) use ($keyword) {
                    $query->where('number', 'LIKE', "%{$keyword}%");
                });
            })
            ->where('status_id',6)
            ->orderBy('created_at','DESC')
            ->paginate($request->count)
        );
        return $data;
    }

    public function collections($request){
        $data = ListDropdown::where('classification','Collection Type')
        ->when($request->keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })->paginate($request->count);
        return DefaultResource::collection($data);
    }

    public function orseries($request){
        $data = FinanceOrseries::when($request->keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })
        ->when($this->laboratory, function ($query, $lab) {
            $query->where('laboratory_id',$lab);
        })
        ->paginate($request->count);
        return DefaultResource::collection($data);
    }

    public function print($request){
        $id = $request->id;
        return Excel::download(new OrExport($id), 'or.xlsx');
    }
}
