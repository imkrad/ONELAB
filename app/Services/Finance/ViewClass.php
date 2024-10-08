<?php

namespace App\Services\Finance;

use NumberFormatter;
use App\Exports\OrExport;
use App\Models\Tsr;
use App\Models\Target;
use App\Models\Customer;
use App\Models\Configuration;
use App\Models\ListDropdown;
use App\Models\FinanceOp;
use App\Models\FinanceName;
use App\Models\FinanceDeposit;
use App\Models\FinanceReceipt;
use App\Models\FinanceOrseries;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Finance\OpResource;
use App\Http\Resources\Finance\FinanceResource;
use App\Http\Resources\Finance\ReceiptResource;
use App\Http\Resources\TsrNoPaymentResource;
use App\Exports\FinanceOrExport;
use App\Exports\FinanceOpExport;
use Maatwebsite\Excel\Facades\Excel;

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
            ->where('payorable_type','!=','App\Models\FinanceName')
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

    public function forpayment($request){
        $data = TsrNoPaymentResource::collection(
            Tsr::query()
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.wallet')
            ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,is_free,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")
                ->orWhereHas('customer',function ($query) use ($keyword) {
                    $query->whereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                });
            })
            ->when($this->laboratory, function ($query, $lab) {
                $query->where('laboratory_id',$lab);
            })
            ->whereHas('payment',function ($query){
                $query->where('payment_id',NULL)->where('collection_id',NULL);
            })
            ->where('status_id',2)
            ->get()
        );
        return $data;
    }

    public function receipts($request){
        $data = ReceiptResource::collection(
            FinanceReceipt::query()
            ->with('op.items.itemable')
            ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
            ->with('op.payorable','op.collection','op.payment')
            ->with('detail','transaction')
            ->when($this->laboratory, function ($query, $lab) {
                $query->where('laboratory_id',$lab);
            })
            ->orderBy('updated_at','DESC')
            ->paginate($request->count)
            ->loadMorph('op.payorable', [
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
        $data = FinanceReceipt::with('op.payorable','op.items.itemable','laboratory','op.collection','op.payment','transaction','detail')->where('id',$id)->first();
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
                if($data->transaction){
                    $items[] = [
                        'name' => 'Credited to Customer Wallet',
                        'amount' => $data->transaction->amount
                    ];
                    $total = (float) str_replace(',', '', trim($data->op->total, '₱ ')) + (float) str_replace(',', '', trim($data->transaction->amount, '₱ ')); 
                    $total = number_format($total,2,'.',',');
                }else{
                    $total = $data->op->total;
                }
                
            }else{
                $sub = '';
                foreach($data->op->items as $item){
                    $items[] = [
                        'name' => $item->itemable->name,
                        'amount' => $item->itemable->amount
                    ];
                }
                $total = $data->op->total;
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
            'detail' => ($data->detail) ? $data->detail : null,
            'total' => $total,
            'items' => $items,
            'payment' => $data->op->payment->name,
        ];
        $pdf = \PDF::loadView('printings.receipt',$array)->setPaper([0, 0, 300, 641.68], 'portrait');
        return $pdf->stream('officialreceipt.pdf');
    }

    public function print_op($request){
        $id = $request->id;
        $items = [];

        $data = FinanceOp::query()
        ->with('items.itemable:id,code,created_at','items.itemable.samples:id,name,tsr_id','items.itemable.samples.analyses:id,sample_id,testservice_id','items.itemable.samples.analyses.testservice:id,testname_id','items.itemable.samples.analyses.testservice.testname:id,name')
        ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
        ->with('payorable')
        ->where('id',$id)
        ->first()
        ->loadMorph('payorable', [
            FinanceName::class => [],
            Customer::class => [
                'customer_name:id,name,has_branches',
                'address:address,addressable_id,region_code,province_code,municipality_code,barangay_code',
                'address.region:code,name,region',
                'address.province:code,name',
                'address.municipality:code,name',
                'address.barangay:code,name'
            ],
        ]);
        
        if($data){
            $samples_list = [];
            $customer = ($data->payorable->customer_name) ? $data->payorable->customer_name->name : $data->payorable->name; 
            if($data->payorable->customer_name){
                $sub = ($data->payorable->name == 'Main') ? '' : ' - '.$data->payorable->name;
                foreach($data->items as $item){
                    foreach($item->itemable->samples as $samples){
                        foreach($samples['analyses'] as $analysis){
                            $analyses[] = [$analysis['testservice']['testname']['name']];
                        }
                        $samples = [
                            'name' => $samples['name'],
                            'analyses' => $analyses
                        ];
                    }
                    $items[] = [
                        'name' => $item->itemable->code,
                        'date' => $item->itemable->created_at
                    ];
                    $samples_list[] = $samples;
                }
                
            }
        }
        $val = trim($data->total, '₱ ');
        $val = (float) str_replace(',', '', $val);
        $wholeNumber = intval($val);
        $excess = $this->checkDecimal($val);
        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $number = $digit->format($wholeNumber);

        $array = [
            'lists' => $data->items,
            'code' => $data->code,
            'date' => $data->created_at,
            'total' => $data->total,
            'word' => ucwords($number).$excess,
            'customer' => $customer.$sub,
            'items' => $items,
            'samples' => $samples_list,
            'address' => $data->payorable->address->address.', '.$data->payorable->address->barangay->name.', '.$data->payorable->address->municipality->name.', '.$data->payorable->address->province->name,
            'cashier' => 'Jali Badiola'
        ];

        // return $array;

        $pdf = \PDF::loadView('printings.op',$array)->setPaper('A4', 'portrait');
        return $pdf->stream('orderofpayment.pdf');
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

    public function years(){
        $data = Target::where('laboratory_id',$this->laboratory)->distinct()->pluck('year')->toArray();
        return $data;
    }

    public function printReportOp($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        // $lists = FinanceOp::select('id','total','code','payorable_id','payorable_type','created_at','created_by')
        // ->with('createdby:id','createdby.profile:user_id,firstname,lastname,middlename')
        // ->with('payorable:id,name,name_id','payorable.customer_name:id,name')
        // ->with(['items' => function ($query) {
        //     $query->with('itemable:id,code')->where('itemable_type', 'App\Models\Tsr');
        // }, 'or:op_id,number'])
        // ->where('payorable_type', 'App\Models\Customer')
        // ->where('status_id',7)
        // ->whereMonth('created_at',$month)
        // ->whereYear('created_at',$year)
        // ->get();
        
        // $array = [
        //     'title' => 'List of OP',
        //     'lists' => $lists,
        //     'year' =>  strtoupper(\DateTime::createFromFormat('m', $month)->format('F')).' '.$year
        // ];
        // $pdf = \PDF::loadView('generated.op',$array)->setPaper([0, 0, 500, 900], 'landscape');
        // return $pdf->stream('orderofpayment.pdf');

        return Excel::download(new FinanceOpExport($month,$year), 'financeop.xlsx');
    }

    public function printReportOr($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        // $lists = Tsr::select('id','code','customer_id')
        // ->whereDoesntHave('parent')
        // ->with('customer:id,name,name_id','customer.customer_name:id,name','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        // ->withWhereHas('payment', function ($query) {
        //     $query->select('tsr_id','or_number','total','subtotal','discount');
        // })
        // ->whereMonth('created_at',$month)
        // ->whereYear('created_at',$year)
        // ->get();
        // return $lists;
        // $array = [
        //     'title' => 'List of OP',
        //     'lists' => $lists,
        //     'year' =>  strtoupper(\DateTime::createFromFormat('m', $month)->format('F')).' '.$year
        // ];
        // $pdf = \PDF::loadView('generated.or',$array)->setPaper([0, 0, 500, 900], 'landscape');
        // return $pdf->stream('or.pdf');

        return Excel::download(new FinanceOrExport($month,$year), 'financeor.xlsx');
    }
}
