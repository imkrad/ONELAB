<?php

namespace App\Services\Laboratory;

use Carbon\Carbon;
use App\Exports\TsrExport;
use App\Models\Target;
use App\Models\Configuration;
use App\Models\ListLaboratory;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrPayment;
use App\Models\TsrPaymentDeduction;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\Laboratory\TsrReportResource;

class ReportClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::check()) ? (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null : '';
        $this->ids =(\Auth::check()) ? (\Auth::user()->role == 'Administrator') ? [] : json_decode(Configuration::where('laboratory_id',$this->laboratory)->value('laboratories')) : '';
    }

    public function years(){
        $data = Target::where('laboratory_id',$this->laboratory)->distinct()->pluck('year')->toArray();
        return $data;
    }

    public function laboratory_types(){
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $data = ListLaboratory::whereIn('id', $lab_id)->get()
        ->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function laboratories($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $laboratories = ListLaboratory::whereIn('id', $lab_id)->get();
        
        $lists = []; $requests_total = 0; $samples_total = 0; $analyses_total = 0; $fees_total = 0; $gratis_total = 0; $discount_total = 0; $gross_total = 0;
        
        foreach($laboratories as $laboratory){
            $req = Tsr::where('status_id','!=',5)->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->count();

            $sample  = TsrSample::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->where('status_id','!=',5);
            })->count();

            $analysis = TsrAnalysis::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('sample', function ($query) use ($laboratory){
                $query->whereHas('tsr', function ($query) use ($laboratory){
                    $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->where('status_id','!=',5)->where('is_shelf',0);
                });
            })->count();

            $wallet = TsrPaymentDeduction::whereMonth('created_at',$month)->whereYear('created_at',$year)
            ->whereHas('payment', function ($query) use ($laboratory){
                $query->whereHas('tsr', function ($query) use ($laboratory){
                    $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
                });
            })->sum('amount');

            $contract = TsrPayment::where('status_id',18)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
                $query->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('total');

            $pending = TsrPayment::where('status_id',6)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
                $query->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('total');

            $total = TsrPayment::where('is_child',0)->where('paid_at','!=',NULL)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('status_id','!=',5);
            })->sum('total');

            $gratis = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',1)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->where('status_id','!=',5);
            })->sum('discount');

            $discount = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',0)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $lists[] = [
                $laboratory->name,
                $req,
                $sample,
                $analysis,
                '₱'.number_format($total+$contract+$pending+$wallet),
                '₱'.number_format($gratis),
                '₱'.number_format($discount),
                '₱'.number_format(($total+$contract+$pending+$wallet) + $gratis + $discount),
                $laboratory->id,
            ];

            $requests_total += $req;
            $samples_total += $sample;
            $analyses_total += $analysis;
            $fees_total += ($total+$contract+$pending+$wallet);
            $gratis_total += $gratis;
            $discount_total += $discount;
            $gross_total += (($total+$contract+$pending+$wallet) + $gratis + $discount);
        }
        $footer[] = [
            'Total',$requests_total, $samples_total, $analyses_total, '₱'.number_format($fees_total), '₱'.number_format($gratis_total), '₱'.number_format($discount_total), '₱'.number_format($gross_total)
        ];
        return [
            'lists' => $lists,
            'footer' => $footer
        ];
    }

    public function year($request){
        $year = ($request->year) ? $request->year : date('Y');
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        
        $lists = []; $requests_total = 0; $samples_total = 0; $analyses_total = 0; $fees_total = 0; $gratis_total = 0; $discount_total = 0; $gross_total = 0;
        
       
            $req = Tsr::whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->count();
            // $total1 = TsrPayment::where('status_id',18)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
            //     $query->whereMonth('created_at',$month)->whereYear('created_at',$year)
            //     ->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            // }) ->sum('total');

            $sample  = TsrSample::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->count();

            $analysis = TsrAnalysis::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('sample', function ($query) use ($laboratory){
                $query->whereHas('tsr', function ($query) use ($laboratory){
                    $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
                });
            })->count();

            $wallet = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('payment_id',21)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('subtotal');

            $total = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('total');

            $gratis = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',1)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $discount = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',0)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $lists[] = [
                $laboratory->name,
                $req,
                $sample,
                $analysis,
                '₱'.number_format($total + $total1),
                '₱'.number_format($gratis),
                '₱'.number_format($discount),
                '₱'.number_format(($total1 + $total) + $gratis + $discount)
            ];

            $requests_total += $req;
            $samples_total += $sample;
            $analyses_total += $analysis;
            $fees_total += ($total + $total1);
            $gratis_total += $gratis;
            $discount_total += $discount;
            $gross_total += (($total1 + $total) + $gratis + $discount);
        
       
        return [
            'lists' => $lists,
            'footer' => $footer
        ];
    }

    public function samples($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        $data = TsrSample::select('name', \DB::raw('count(*) as count'))
        ->withWhereHas('tsr',function ($query) use ($request){
            $query->where('laboratory_id',$this->laboratory);
            // $query->when($request->type, function ($query, $type) {
            //     $query->where('laboratory_type',$type);
            // });
            $query->when($request->laboratory, function ($query, $laboratory) {
                $query->where('laboratory_type',$laboratory);
            });
        })
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->groupBy('name')
        ->orderBy('count', 'desc')
        ->take(10)
        ->get();
        return $data;
    }

    public function analyses($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        $data = TsrAnalysis::with('testservice.testname')
        ->select('testservice_id', \DB::raw('count(*) as count'))
        ->withWhereHas('sample', function ($query) use ($request) {
            $query->whereHas('tsr', function ($query) use ($request) {
                $query->where('laboratory_id', $this->laboratory)
                    ->when($request->laboratory, function ($query, $laboratory) {
                        $query->where('laboratory_type', $laboratory);
                    });
            });
        })
        ->where('status_id', '!=', 13)
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->groupBy('testservice_id')
        ->orderBy('count', 'desc')
        ->take(10)
        ->get();
        return $data;
    }

    public function gratis($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        $request = Tsr::whereHas('payment', function ($query) {
            $query->where('status_id', 8);
        })
        ->where('status_id','!=', 5)
        ->where('laboratory_id',$this->laboratory)
        ->when($request->laboratory, function ($query, $laboratory) {
            $query->where('laboratory_type',$laboratory);
        })
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->count();
        
        $testservice = TsrAnalysis::withWhereHas('sample',function ($query) use ($request){
            $query->whereHas('tsr',function ($query) use ($request){
                $query->where('laboratory_id',$this->laboratory)->where('status_id','!=', 5);
                $query->whereHas('payment', function ($query) {
                    $query->where('status_id', 8);
                });
            });
        })
        ->where('status_id','!=', 13)
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->count();

        return [
            'TSR Request' => $request,
            'Analyses' => $testservice
        ];
    }

    public function breakdownTsrs($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        $data = Tsr::with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches')
        ->with('customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->whereHas('payment', function ($query) {
            $query->where('status_id', 8);
        })
        ->where('status_id','!=', 5)
        ->where('laboratory_id',$this->laboratory)
        ->when($request->laboratory, function ($query, $laboratory) {
            $query->where('laboratory_type',$laboratory);
        })
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->get();

        return TsrReportResource::collection($data);
    }

    public function breakdownAnalyses($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

        $data = Tsr::with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches')
        ->with('customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->whereHas('payment', function ($query) {
            $query->where('status_id', 8);
        })
        ->where('status_id','!=', 5)
        ->where('laboratory_id',$this->laboratory)
        ->when($request->laboratory, function ($query, $laboratory) {
            $query->where('laboratory_type',$laboratory);
        })
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->get();

        return TsrReportResource::collection($data);
    }

    public function printReportOr($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');
        $lab = $request->laboratory;

        $lists = Tsr::select('id','code','customer_id')
        ->whereDoesntHave('parent')
        ->with('customer:id,name,name_id','customer.customer_name:id,name','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->withWhereHas('payment', function ($query) {
            $query->select('tsr_id','or_number','total','subtotal','discount');
        })
        ->whereMonth('created_at',$month)
        ->whereYear('created_at',$year)
        ->where('laboratory_type',$lab)
        ->get();
        // return $lists;
        $array = [
            'title' => 'List of OP',
            'lists' => $lists,
            'year' =>  strtoupper(\DateTime::createFromFormat('m', $month)->format('F')).' '.$year
        ];
        $pdf = \PDF::loadView('generated.accomplishment',$array)->setPaper([0, 0, 500, 900], 'landscape');
        return $pdf->stream('accomplishment.pdf');
    }

    public function printTsr($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');

//         $lists = Tsr::select('id','code','customer_id')
//         ->whereDoesntHave('parent')
//         ->with('customer:id,name,name_id','customer.customer_name:id,name','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
//         ->with('samples:tsr_id,id,code,name','samples.analyses:id,sample_id,testservice_id','samples.analyses.testservice:id,testname_id','samples.analyses.testservice.testname:id,name')
//         ->withWhereHas('payment', function ($query) {
//             $query->select('tsr_id','or_number','total','subtotal','discount','is_free','paid_at');
//         })
//         ->whereIn('status_id',[3,4])
//         ->whereMonth('created_at',$month)
//         ->whereYear('created_at',$year)
//         ->get();
// return $lists;
//         $groupedData = [];
//         foreach ($lists as $row) {
//             $code = $row['code'];
//             $customer = $row['customer']['customer_name']['name'];
//             $address = $this->address($row);

//             foreach($row['samples'] as $index2=>$sample){
//                 $sample_code = $sample['code'];
//                 $sample_name = $sample['name'];

//                 foreach($sample['analyses'] as $index=>$analysis){
//                     $testName = $analysis['testservice']['testname']['name'];
//                     $key = $sample_code . "_" . $sample_name . "_" . $testName;
                    
//                     if (!isset($groupedData[$key])) {
        
//                         $groupedData[$key] = [
//                             "code" => ($index == 0) ? $code : '',
//                             "customer" => ($index == 0) ? $customer : '',
//                             "address" => ($index == 0) ? $address : '',
//                             "samplecode" => ($index == 0) ? $sample_code : '',
//                             "samplename" => ($index == 0) ? $sample_name : '',
//                             "testname" => $testName,
//                         ];
//                     }
//                 }
//             }
//         }
//         $tsrs = array_values($groupedData);
       
        return Excel::download(new TsrExport($month,$year), 'tsr.xlsx');
    }

    public function address($list){
        $address = ($list['customer']['address']['address'] != '' ||$list['customer']['address']['address'] != NULL) ? $list['customer']['address']['address'].', ' : '';
        if($list['customer']['address']['municipality']['name'] == 'Zamboanga City' || $list['customer']['address']['municipality']['name'] == 'Isabela City'){
            $a = '';
        }else if($list['customer']['address']['province']['name'] == 'Sulu'){
            $a = ', '.$list['customer']['address']['province']['name'];
        }else{
            $a = ', '.$list['customer']['address']['province']['name'];
        }
        $barangay = $list['customer']['address']['barangay']['name'];
        $municipality = $list['customer']['address']['municipality']['name'];
        $province = $list['customer']['address']['province']['name'];

        $complete_address = $address.$list['customer']['address']['barangay']['name'].', '.$list['customer']['address']['municipality']['name'].$a;
        return $complete_address;
    }
}
