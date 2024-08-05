<?php

namespace App\Services\Dashboard;

use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrPayment;
use App\Models\ListStatus;

class CroClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->start = now()->copy()->startOfMonth()->format('Y-m-d');
        $this->end = now()->copy()->endOfMonth()->format('Y-m-d');
    }

    public function info($request){
        return [
            'month' => date('F'),
            'date' => $this->start.' to '.$this->end
        ];
    }

    public function counts($request){
        return [
            $this->fees($request),
            $this->tsrs($request),
            $this->samples($request),
            $this->testservices($request),
        ];
    }

    private function tsrs($request){
        $series = [];
        $data = Tsr::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->where('laboratory_id', $this->laboratory)
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
            'total' => Tsr::whereBetween('created_at',[$this->start,$this->end])->where('laboratory_id',$this->laboratory)->count()
        ];
    }

    private function samples($request){
        $series = [];
        $data = TsrSample::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->whereHas('tsr', function ($query){
            $query->where('laboratory_id',$this->laboratory);
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
            'total' => TsrSample::whereBetween('created_at',[$this->start,$this->end])->whereHas('tsr', function ($query){
                $query->where('laboratory_id',$this->laboratory);
            })->count()
        ];
    }

    private function testservices($request){
        $series = [];
        $data = TsrAnalysis::select(\DB::raw('DATE(created_at) AS x'), \DB::raw('count(*) AS y'))
        ->whereHas('sample', function ($query){
            $query->whereHas('tsr', function ($query){
                $query->where('laboratory_id',$this->laboratory);
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
            'total' => TsrAnalysis::whereBetween('created_at',[$this->start,$this->end])->whereHas('sample', function ($query){
                $query->whereHas('tsr', function ($query){
                    $query->where('laboratory_id',$this->laboratory);
                });
            })
           ->count()
        ];
    }

    private function fees($request){
        return $arr = [
            'name' => 'Actual Fees Collected',
            'icon' => 'ri-bank-card-fill',
            'color' => 'bg-info-subtle',
            'total' => TsrPayment::whereBetween('paid_at',[$this->start,$this->end])->where('is_paid',1)
            ->whereHas('tsr', function ($query){
                $query->where('laboratory_id',$this->laboratory);
            })
           ->sum('total')
        ];
    }

    public function statuses(){
        $data = ListStatus::whereIn('id',[1,2,3,4])
        ->withCount(['tsrs' => function ($query) {
            $query->where('laboratory_id',$this->laboratory);
        }])->get();
        return $data;
    }

    public function reminders($request){
        return [
            [
                'name' => 'Due Today',
                'description' => 'List of items',
                'count' => Tsr::where('due_at',now())->where('laboratory_id',$this->laboratory)->count(),
                'icon' => 'ri-error-warning-line',
                'color' => 'bg-warning-subtle text-warning'
            ],
            [
                'name' => 'Overdue Request',
                'description' => 'List of items',
                'count' => Tsr::where('status_id',3)->where('due_at','>',now())->where('laboratory_id',$this->laboratory)->count(),
                'icon' => 'ri-error-warning-fill',
                'color' => 'bg-danger-subtle text-danger'
            ],
            [
                'name' => 'For Released',
                'description' => 'Check for expiration',
                'count' => Tsr::where('status_id',4)->where('due_at','>',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->count(),
                'icon' => 'ri-alert-fill',
                'color' => 'bg-success-subtle text-success'
            ],
            [
                'name' => 'Unclaimed Reports',
                'description' => 'Please restock soon',
                'count' => Tsr::where('status_id',4)->where('due_at','<',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->count(),
                'icon' => 'ri-information-fill',
                'color' => 'bg-dark-subtle text-dark'
            ],
        ];
    }
    
}
