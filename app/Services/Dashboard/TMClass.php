<?php

namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Models\UserRole;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrPayment;
use App\Models\TsrPaymentDeduction;

class TMClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->start = now()->copy()->startOfMonth()->format('Y-m-d');
        $this->end = now()->copy()->endOfMonth()->format('Y-m-d');
    }

    public function laboratories(){
        $data = UserRole::with('type')->where('user_id',\Auth::user()->id)->get()->map(function ($item) {
            return [
                'value' => $item->laboratory_type,
                'name' => $item->type->name
            ];
        });
        return $data;
    }

    public function counts($request){
        $laboratories = $this->laboratories();
        $lab_id = ($request->laboratory) ? $request->laboratory : $laboratories[0]['value'];
        return [
            $this->fees($request,$lab_id),
            $this->tsrs($request,$lab_id),
            $this->samples($request,$lab_id),
            $this->testservices($request,$lab_id),
        ];
    }

    private function tsrs($request,$lab_id){
        $series = [];
        $data = Tsr::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->where('laboratory_id', $this->laboratory)->where('laboratory_type',$lab_id)
        ->whereIn('status_id',[1,2,3,4]) //status is completed
        ->whereBetween('created_at', [$this->start, $this->end])
        ->groupBy(\DB::raw('DATE(created_at)'))
        ->orderBy(\DB::raw('DATE(created_at)'))
        ->get()->map(function ($item) {
            return [
                'x' => date('F d, Y',strtotime($item->x)),
                'y' => $item->y
            ];
        });
        $info = [
            'name' => 'Customer Served',
            'data' => $data
        ];
        array_push($series,$info);
        return $arr = [
            'name' => 'Customer Served',
            'icon' => 'ri-hand-coin-fill',
            'color' => '',
            'series' => $series,
            'total' => Tsr::whereBetween('created_at',[$this->start,$this->end])->whereIn('status_id',[1,2,3,4])->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count()
        ];
    }

    private function samples($request,$lab_id){
        $series = [];
        $data = TsrSample::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->whereHas('tsr', function ($query) use ($lab_id){
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->whereIn('status_id',[1,2,3,4]);
        })
        ->whereBetween('created_at', [$this->start, $this->end])
        ->groupBy(\DB::raw('DATE(created_at)'))
        ->orderBy(\DB::raw('DATE(created_at)'))
        ->get()->map(function ($item) {
            return [
                'x' => date('F d, Y',strtotime($item->x)),
                'y' => $item->y
            ];
        });
        $info = [
            'name' => 'Samples Received',
            'data' => $data
        ];
        array_push($series,$info);
        return $arr = [
            'name' => 'Samples Received',
            'icon' => 'ri-inbox-archive-fill',
            'color' => '',
            'series' => $series,
            'total' => TsrSample::whereBetween('created_at',[$this->start,$this->end])->whereHas('tsr', function ($query) use ($lab_id){
                $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->whereIn('status_id',[1,2,3,4]);
            })->count()
        ];
    }

    private function testservices($request,$lab_id){
        $series = [];
        $data = TsrAnalysis::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->whereHas('sample', function ($query) use ($lab_id){
            $query->whereHas('tsr', function ($query) use ($lab_id){
                $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->whereIn('status_id',[1,2,3,4]);
            });
        })
        ->whereBetween('created_at', [$this->start, $this->end])
        ->groupBy(\DB::raw('DATE(created_at)'))
        ->orderBy(\DB::raw('DATE(created_at)'))
        ->get()->map(function ($item) {
            return [
                'x' => date('F d, Y',strtotime($item->x)),
                'y' => $item->y
            ];
        });
        $info = [
            'name' => 'Services Conducted',
            'data' => $data
        ];
        array_push($series,$info);
        return $arr = [
            'name' => 'Services Conducted',
            'icon' => 'ri-flask-fill',
            'color' => '',
            'series' => $series,
            'total' => TsrAnalysis::whereBetween('created_at',[$this->start,$this->end])->whereHas('sample', function ($query) use ($lab_id){
                $query->whereHas('tsr', function ($query) use ($lab_id){
                    $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->whereIn('status_id',[1,2,3,4]);
                });
            })
           ->count()
        ];
    }

    private function fees($request,$lab_id){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');
        $wallet = TsrPaymentDeduction::whereMonth('created_at',$month)->whereYear('created_at',$year)
        ->whereHas('payment', function ($query) use ($lab_id){
            $query->whereHas('tsr', function ($query) use ($lab_id){
                $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id);
            });
        })->sum('amount');

        $contract = TsrPayment::where('status_id',18)->whereHas('tsr', function ($query) use ($month,$year,$lab_id){
            $query->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id);
        })->sum('total');

        $pending = TsrPayment::where('status_id',6)->whereHas('tsr', function ($query) use ($month,$year,$lab_id){
            $query->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id);
        })->sum('total');

        $gratis = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',1)
        ->whereHas('tsr', function ($query) use ($lab_id){
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id);
        })->sum('discount');

        $discount = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',0)
        ->whereHas('tsr', function ($query) use ($lab_id){
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id);
        })->sum('discount');

        $total = TsrPayment::where('is_child',0)->where('paid_at','!=',NULL)->whereHas('tsr', function ($query) use ($month,$year,$lab_id){
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->whereMonth('created_at',$month)->whereYear('created_at',$year)->where('status_id','!=',5);
        })->sum('total');

        return $arr = [
            'name' => 'Actual Fees Collected',
            'icon' => 'ri-bank-card-fill',
            'color' => 'bg-info-subtle',
            'total' => $total+$pending+$contract+$wallet+$gratis+$discount
        ];
    }

    public function reminders($request){
        $laboratories = $this->laboratories();
        $lab_id = ($request->laboratory) ? $request->laboratory : $laboratories[0]['value'];
        return [
            [
                'name' => 'Due Soon',
                'description' => '5 days ahead of the due date',
                'count' => Tsr::whereBetween('due_at', [Carbon::now(), Carbon::now()->addDays(5)])->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count(),
                'icon' => 'ri-error-warning-line',
                'color' => 'bg-primary-subtle text-primary'
            ],
            [
                'name' => 'Due Today',
                'description' => 'See all requests due for today',
                'count' => Tsr::whereDate('due_at',now())->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count(),
                'icon' => 'ri-error-warning-line',
                'color' => 'bg-warning-subtle text-warning'
            ],
            [
                'name' => 'Overdue Request',
                'description' => 'Keep track of all laboratory tasks',
                'count' => Tsr::where('status_id',3)->whereDate('due_at','<',now())->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count(),
                'icon' => 'ri-error-warning-fill',
                'color' => 'bg-danger-subtle text-danger'
            ],
            [
                'name' => 'For Released',
                'description' => 'Reports that are ready to be released',
                'count' => Tsr::where('status_id',4)->where('due_at','>',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count(),
                'icon' => 'ri-alert-fill',
                'color' => 'bg-success-subtle text-success'
            ],
            [
                'name' => 'Unclaimed Reports',
                'description' => 'Ensure follow-up on unclaimed reports.',
                'count' => Tsr::where('status_id',4)->where('due_at','<',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$lab_id)->count(),
                'icon' => 'ri-information-fill',
                'color' => 'bg-dark-subtle text-dark'
            ],
        ];
    }
}
