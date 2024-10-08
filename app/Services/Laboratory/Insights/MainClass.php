<?php

namespace App\Services\Laboratory\Insights;

use Carbon\Carbon;
use App\Models\Tsr;
use App\Models\TsrPayment;
use App\Models\TsrAnalysis;
use App\Models\FinanceOp;
use App\Models\Customer;
use App\Models\ListStatus;
use App\Http\Resources\Laboratory\Insight\CustomerTopResource;
use App\Http\Resources\Laboratory\Insight\TestnameTopResource;

class MainClass
{
    public function counts($request){
        return [
            $this->requests($request),
            $this->unpaid($request),
            $this->income($request),
        ];
    }

    private function requests($request){
        $array = [];
        $data = Tsr::selectRaw('YEAR(created_at) AS x, COUNT(*) AS y')
        ->where('status_id', 3)->groupBy('x')->orderBy('x', 'asc') ->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Requests',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Requests',
            'icon' => 'ri-hand-coin-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => Tsr::where('status_id',3)->count(),
        ];
    }

    private function customers($request){
        $array = [];
        $data = Tsr::selectRaw('YEAR(created_at) AS x, COUNT(customer_id) AS y')
        ->where('status_id', 3)->groupBy('x')->orderBy('x', 'asc') ->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Customer Served',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Customer Served',
            'icon' => 'ri-group-2-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => Tsr::where('status_id',3)->distinct('customer_id')->count(),
        ];
    }

    private function income($request){
        $array = [];
        $data = TsrPayment::selectRaw('YEAR(paid_at) AS x, SUM(total) AS y')
        ->whereHas('tsr',function ($query){
            $query->where('status_id',3);
        })->where('is_paid',1)->groupBy('x')->orderBy('x', 'asc')->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Income',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Income',
            'icon' => 'ri-secure-payment-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => '₱'.number_format(TsrPayment::whereHas('tsr',function ($query){
                $query->where('status_id',3);
            })->where('is_paid',1)->sum('total'),2,'.',','),
        ];
    }

    public function unpaid($request){
        $array = [];
        $data = TsrPayment::selectRaw('YEAR(paid_at) AS x, SUM(total) AS y')
        ->whereHas('tsr',function ($query){
            $query->where('status_id',3);
        })->where('is_paid',0)->groupBy('x')->orderBy('x', 'asc')->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Income',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Unpaid',
            'icon' => 'ri-safe-2-line',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => '₱'.number_format(TsrPayment::whereHas('tsr',function ($query){
                $query->where('status_id',3);
            })->where('is_paid',0)->sum('total'),2,'.',','),
        ];
    }

    public function recap($request){
        $year =  $request->year;
        $total = [
            ['name' => 'Value of Transactions', 'value' => FinanceOp::whereYear('created_at',$year)->sum('total')],
            ['name' => 'Actual Collection Based on Receipt', 'value' => FinanceOp::where('status_id',7)->whereYear('created_at',$year)->sum('total')],
            ['name' => 'Pending Collection', 'value' => FinanceOp::where('status_id',6)->whereYear('created_at',$year)->sum('total')],
        ];
        if($request->type === 'yearly'){
            $current_year = $request->year; $years = []; 
            $laboratory = $request->laboratory;

            $programs = [
                ['name' => 'Value of Transactions', 'value' => ''],
                ['name' => 'Actual Collection Based on Receipt', 'value' => 7],
                ['name' => 'Pending Collection', 'value' => 6],
            ];
            $prog = []; 
            foreach($programs as $program){
                $data = []; $year = $current_year - 20;
                for($year; $year <= $current_year; $year++){
                    $years[] = $year; $p = $program['value'];
                    $data[] = FinanceOp::where('status_id',$p)
                    // ->where('laboratory_id', $laboratory)
                    ->whereYear('created_at',$year)
                    ->sum('total');
                    // $data[] = TsrPayment::whereHas('tsr',function ($query) use ($year){
                    //     $query->where('status_id',3)->whereYear('created_at',$year);
                    // })
                    // ->when($request->laboratory, function ($query, $laboratory) {
                    //     $query->whereHas('tsr',function ($query) use ($laboratory){
                    //         $query->where('laboratory_id', $laboratory);
                    //     });
                    // })
                    // ->where('is_paid',$p)->sum('total');
                }
                $arr[] = [
                    'name' => $program['name'],
                    'data' => $data  
                ];
                
            }

            return $y =[
                'categories' => $years,
                'lists' => $arr,
                'total' => $total
            ];
        }else{
            $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

            $programs = [
                ['name' => 'Value of Transactions', 'value' => null],
                ['name' => 'Actual Collection Based on Receipt', 'value' => 7],
                ['name' => 'Pending Collection', 'value' => 6],
            ];
            $prog = []; 
            foreach($programs as $program){
                $data = [];
                for($month = 1; $month <= 12; $month++){
                    $p = $program['value'];
                    $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                    $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();
                    $query = FinanceOp::query();
                    ($p) ? $query->where('status_id',$p) : '';
                    $sum = $query->whereBetween('created_at',[$startOfMonth,$endOfMonth])
                    ->sum('total');

                    $data[] = $sum;
                }
                $arr[] = [
                    'name' => $program['name'],
                    'data' => $data  
                ];
                
            }

            return $y =[
                'categories' => $months,
                'lists' => $arr,
                'total' => $total
            ];
        }
    }

    public function target($request){
        $laboratories = $request->laboratories;
        foreach($laboratories as $laboratory){
            $lab = $laboratory['value'];
            $sum = TsrPayment::whereHas('tsr',function ($query) use ($lab){
                $query->where('laboratory_type',$lab);
            })
            ->whereIn('status_id',[7,8])->sum('subtotal');

            $discount = TsrPayment::whereHas('tsr',function ($query) use ($lab){
                $query->where('laboratory_type',$lab);
            })
            ->whereIn('status_id',[7,8])->sum('discount');

            $statuses = ListStatus::where('type','Payment')->get();
            foreach($statuses as $status){
                $status_id = $status['id'];
                $breakdown[] = [
                    'name' => $status['name'],
                    'total' => TsrPayment::whereHas('tsr',function ($query) use ($lab){
                        $query->where('laboratory_type',$lab);
                    })->where('status_id',$status_id)->sum('subtotal')
                ];
            }
            $arr[] = [
                'name' => $laboratory['name'],
                'others' => $laboratory['others'],
                'total' => $sum,
                'discount' => $discount,
                'breakdown' => $breakdown
            ];
        }
        return $arr;
    }

    public function payment($request){
        $statuses = ListStatus::whereIn('id',[6,7,8,18])->where('type','Payment')->get();
        foreach($statuses as $status){
            $status_id = $status['id'];
            $sum = TsrPayment::whereHas('tsr',function ($query){
                $query->where('laboratory_id',14);
            })->where('status_id',$status_id)->sum('subtotal');

            if ($sum >= 1000 && $sum < 1000000) {
                $total = [round($sum / 1000) . 'k'];
            } elseif ($sum >= 1000000) {
                $total = [round($sum / 1000000) . 'M'];
            }else {
                $total = [0];
            }

            $arr[] = [
                'name' => $status['name'],
                'data' => $total
            ];
        }

        return [
            'data' => $arr,
            'total' => TsrPayment::whereHas('tsr',function ($query){
                $query->where('laboratory_id',14);
            })->whereIn('status_id',[6,7,8,18])->sum('subtotal'),
            'gratis' => TsrPayment::whereHas('tsr',function ($query){
                $query->where('laboratory_id',14);
            })->whereIn('status_id',[6,7,8,18])->sum('discount'),
        ];
    }

    public function topcustomers($request){
        $sort = $request->sort;
        $year = $request->year;
        $data = Customer::with('customer_name')->withCount(['tsrs' => function ($query) use ($year){
            $query->where('status_id', 3)->whereYear('created_at',$year);
        }])
        ->orderBy('tsrs_count', $sort)->take(5)->get();
        return CustomerTopResource::collection($data);
    }

    public function toptestnames($request){
        $sort = $request->sort;
        $year = $request->year;
        $data = TsrAnalysis::whereHas('sample',function ($query) use ($year){
            $query->whereHas('tsr',function ($query) use ($year){
                $query->where('status_id',3)->whereYear('created_at',$year);
            });
        })
        ->join('list_testservices', 'tsr_analyses.testservice_id', '=', 'list_testservices.id')
        ->join('list_names', 'list_testservices.testname_id', '=', 'list_names.id')
        ->select('list_names.name', \DB::raw('COUNT(*) as count'))
        ->groupBy('list_testservices.testname_id')
        ->orderBy('count', $sort)->take(5)->get();
        return TestnameTopResource::collection($data);
    }

}
