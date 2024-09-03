<?php

namespace App\Services\Finance;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat\NumberFormatter;
use App\Exports\OrExport;
use App\Models\Customer;
use App\Models\Configuration;
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
        $this->configuration = Configuration::where('laboratory_id',$this->laboratory)->first();
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
        $items = [];
        $data = FinanceReceipt::with('op.payorable','op.items.itemable','laboratory','op.collection')->where('id',$id)->first();
        // return Excel::download(new OrExport($id), 'or.xlsx');
        if($data){
            $customer = ($data->op->payorable->customer_name) ? $data->op->payorable->customer_name->name : $data->op->payorable->name; 
            if($data->op->payorable->customer_name){
                $sub = ($data->op->payorable->name == 'Main') ? '' : ' - '.$data->op->payorable->name;
                foreach($data->op->items as $item){
                    $items[] = [
                        'name' => $item->itemable->code,
                        'amount' => $item->itemable->payment->total
                    ];
                }
                
            }else{
                $sub = '';
                foreach($data->op->items as $item){
                    $items[] = [
                        'name' => $item->itemable->name,
                        'amount' => $item->itemable->amount
                    ];
                }
            }
        }
        $val = trim($data->op->total, '₱ ');
        $val = (float) str_replace(',', '', $val);
        $wholeNumber = intval($val);
        $excess = $this->checkDecimal($val);
        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $number = $digit->format($wholeNumber);

        $array = [
            'agency' => $this->configuration->acronym,
            'customer' => $customer.$sub,
            'word' => ucwords($number).$excess,
            'date' => $data->created_at,
            'total' => $data->op->total,
            'items' => $items,
        ];
        $pdf = \PDF::loadView('printings.receipt',$array)->setPaper([0, 0, 300, 641.68], 'portrait');
        return $pdf->stream('officialreceipt.pdf');
    }

    private function checkDecimal($number) {
        $decimal = $number - floor($number);
        $decimal = round($decimal, 2);
    
        if ($decimal == 0.00) {
            return ' And 00/100';
        } else {
            return ' And '.ltrim(substr($decimal, 2), '0').'/100';
        }
    }

    public function ornumbers($request){
        $receipt = FinanceReceipt::with('op')->where('deposit_id',$request->deposit_id)->where('orseries_id',$request->orseries_id)->where('is_deposited',0)->get()->map(function ($item) {
            return [
                'value' => $item->number,
                'name' => $item->number,
                'amount' => $item->op->total
            ];
        });
        return $receipt;
    }
}
