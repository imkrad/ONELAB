<?php

namespace App\Services\Finance;

use App\Exports\OrExport;
use App\Models\Customer;
use App\Models\ListDropdown;
use App\Models\FinanceOp;
use App\Models\FinanceName;
use App\Models\FinanceDeposit;
use App\Models\FinanceReceipt;
use App\Models\FinanceOrseries;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Finance\OpResource;
use App\Http\Resources\Finance\ReceiptResource;

class ViewClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function payor($request){
        $keyword = $request->keyword;
        if($request->type == 'external'){
            $data = Customer::with('customer_name')
            ->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('customer_name', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%$keyword%");
                    });
            })
            ->limit(5)->get()->map(function ($item) {
                $name = ($item->name != 'Main') ? ' - '.$item->name : '' ;
                return [
                    'value' => $item->id,
                    'name' => $item->customer_name->name.$name
                ];
            });
        }else{
            $data = FinanceName::where('name', 'LIKE', "%{$keyword}%")->limit(5)->get()
            ->map(function ($item) {
                return [
                    'value' => $item->id,
                    'name' => $item->name
                ];
            });
        }

        if($keyword){
            return $data;
        }else{
            return [];
        }
    }

    public function ops($request){
        $data = OpResource::collection(
            FinanceOp::query()
            ->with('items.itemable','or')
            ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
            ->with('collection:id,name','payment:id,name,others','status:id,name,color,others')
            ->with('payorable')
            ->when($request->status, function ($query, $status) {
                $query->where('status_id',$status);
            })
            ->when($this->laboratory, function ($query, $lab) {
                $query->where('laboratory_id',$lab);
            })
            ->orderBy('updated_at','DESC')
            ->paginate($request->count)
            ->loadMorph('payorable', [
                FinanceName::class => [],
                Customer::class => [
                    'customer_name:id,name,has_branches',
                    'address:address,addressable_id,region_code,province_code,municipality_code,barangay_code',
                    'address.region:code,name,region',
                    'address.province:code,name',
                    'address.municipality:code,name',
                    'address.barangay:code,name',
                    'contact:id,email,contact_no,customer_id'
                ],
             ])
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

    public function names($request){
        $data = FinanceName::when($request->keyword, function ($query, $keyword) {
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

    public function ornumbers($request){
        $receipt = FinanceReceipt::with('op')->where('deposit_id',$request->deposit_id)->where('orseries_id',$request->orseries_id)->where('is_deposited',0)->get()->map(function ($item) {
            return [
                'value' => $item->number,
                'name' => $item->number,
                'amount' => $item->op->total,
            ];
        });
        return $receipt;
    }
}