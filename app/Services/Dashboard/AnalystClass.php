<?php

namespace App\Services\Dashboard;

use App\Models\Tsr;
use Carbon\Carbon;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Http\Resources\Laboratory\SampleResource;
use App\Http\Resources\Laboratory\AnalysisResource;

class AnalystClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function tsrs(){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        $data = Tsr::with('status')->where('laboratory_type',$laboratory)->whereIn('status_id',[3,4])->where('released_at',null)
        ->with(['samples' => function ($query) {
            $query->withCount([
                'analyses as analyses_count',
                'analyses as completed_analyses_count' => function ($query) {
                    $query->where('status_id', 12);
                },
                'analyses as ongoing_analyses_count' => function ($query) {
                    $query->where('status_id', 11);
                },
                'analyses as pending_analyses_count' => function ($query) {
                    $query->where('status_id', 10);
                }
            ]);
        }])
        ->get()
        ->map(function ($tsr) {
            $tsr->total_analyses_count = $tsr->samples->sum('analyses_count');
            $tsr->total_completed_analyses_count = $tsr->samples->sum('completed_analyses_count');
            $tsr->total_ongoing_analyses_count = $tsr->samples->sum('ongoing_analyses_count');
            $tsr->total_pending_analyses_count = $tsr->samples->sum('pending_analyses_count');
            $tsr_id = $tsr->id;
            return [
                'id' => $tsr->id,
                'tsr' => $tsr,
                'lists' => AnalysisResource::collection(TsrAnalysis::with('sample','testservice.testname','testservice.method.reference','testservice.method.method')
                ->whereHas('sample',function ($query) use ($tsr_id) {
                    $query->whereHas('tsr',function ($query) use ($tsr_id){
                        $query->where('id',$tsr_id);
                    });
                })->orderBy('status_id','ASC')->get()),
                'samples' => $tsr->samples_count,
                'analyses' => $tsr->total_analyses_count,
                'pending' => $tsr->total_pending_analyses_count,
                'ongoing' => $tsr->total_ongoing_analyses_count,
                'completed' => $tsr->total_completed_analyses_count
            ];
        });
        return $data;
    }

    public function samples($request){
        // return [];
        $laboratory = \Auth::user()->userrole->laboratory_type;
        $data = TsrSample::with('tsr')->whereHas('tsr',function ($query) use ($laboratory) {
            $query->where('laboratory_type',$laboratory)->whereIn('status_id',[3,4])->where('released_at',null);
        })
       ->withCount([
            'analyses as analyses_count',
            'analyses as completed_analyses_count' => function ($query) {
                $query->where('status_id', 12);
            },
            'analyses as ongoing_analyses_count' => function ($query) {
                $query->where('status_id', 11);
            },
            'analyses as pending_analyses_count' => function ($query) {
                $query->where('status_id', 10);
            }
        ])
        ->get()
        ->map(function ($sample) {
            $id = $sample->id;
            return [
                'id' => $sample->id,
                'tsr_id' => $sample->tsr->id,
                'due' => $sample->tsr->due_at,
                'due_at' => date('Y-m-d', strtotime($sample->tsr->due_at)),
                'sample' => $sample,
                'lists' => AnalysisResource::collection(TsrAnalysis::with('sample','testservice.testname','testservice.method.reference','testservice.method.method')
                ->whereHas('sample',function ($query) use ($id) {
                    $query->where('id',$id);
                })->orderBy('status_id','ASC')->get()),
                'analyses' => $sample->analyses_count,
                'pending' => $sample->pending_analyses_count,
                'ongoing' => $sample->ongoing_analyses_count,
                'completed' => $sample->completed_analyses_count
            ];
        });
        return $data;
        // $data = SampleResource::collection(
        //     TsrSample::query()->with('analyses.status','analyses.testservice.method.method','analyses.testservice.testname','analyses.sample','analyses.analyst.profile')
        //     ->when($request->keyword, function ($query, $keyword) {
        //         $query->where('code', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%");
        //     })
        //     ->orderBy('created_at','ASC')
        //     ->get()
        // );
        // return $data;

        // $laboratory = \Auth::user()->userrole->laboratory_type;
        // $data = SampleResource::collection(
        //     TsrSample::with('analyses.status','analyses.testservice.method.method','analyses.testservice.testname','analyses.sample','analyses.analyst.profile')
        //     ->whereHas('tsr',function ($query) use ($laboratory) {
        //         $query->where('laboratory_type',$laboratory)->whereIn('status_id',[3,4])->where('released_at',null);
        //     })
        //     ->get()
        // );
        // return $data;
    }

    public function reminders($request){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        return [ 
            [
                'name' => 'Due Soon',
                'description' => '5 days ahead of the due date',
                'count' => Tsr::whereDate('due_at',now())->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->count(),
                'icon' => 'ri-error-warning-line',
                'color' => 'bg-warning-subtle text-warning'
            ],
            [
                'name' => 'Overdue Request',
                'description' => 'Keep track of all laboratory tasks',
                'count' => TsrSample::whereHas('tsr',function ($query) use ($laboratory) {
                    $query->where('status_id',3)->whereDate('due_at','<',now())->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory);
                })->count(),
                'icon' => 'ri-error-warning-fill',
                'color' => 'bg-danger-subtle text-danger'
            ],
            [
                'name' => 'For Released',
                'description' => 'Reports that are ready to be released',
                'count' => Tsr::where('status_id',4)->where('due_at','>',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->count(),
                'icon' => 'ri-alert-fill',
                'color' => 'bg-success-subtle text-success'
            ],
            [
                'name' => 'Unclaimed Reports',
                'description' => 'Ensure follow-up on unclaimed reports.',
                'count' => Tsr::where('status_id',4)->where('due_at','<',now())->where('released_at',null)->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->count(),
                'icon' => 'ri-information-fill',
                'color' => 'bg-dark-subtle text-dark'
            ],
        ];
    }

    public function tasks($request){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        return [
            [
                'name' => 'Ongoing Task',
                'description' => 'Task I\'ve handled for completion',
                'count' => TsrAnalysis::where('status_id',11)->where('analyst_id',\Auth::user()->id)->count(),
                'icon' => 'ri-error-warning-fill',
                'color' => 'bg-info-subtle text-info'
            ],
            [
                'name' => 'Completed',
                'description' => 'Task I\'ve successfully completed',
                'count' => TsrAnalysis::where('status_id',12)->where('analyst_id',\Auth::user()->id)->count(),
                'icon' => 'ri-alert-fill',
                'color' => 'bg-success-subtle text-success'
            ]
        ];
    }
}
