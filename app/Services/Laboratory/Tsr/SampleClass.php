<?php

namespace App\Services\Laboratory\Tsr;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrSampleReport;
use App\Models\TsrSampleDisposal;
use App\Models\TsrPayment;
use App\Models\Configuration;
use App\Models\ListDropdown;
use App\Models\ListLaboratory;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Http\Resources\SampleResource;
use App\Http\Resources\Laboratory\AnalysisResource;

class SampleClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->configuration = Configuration::with('laboratory.address')->where('laboratory_id',$this->laboratory)->first();
    }

    public function lists($request){
        $data = SampleResource::collection(
            TsrSample::query()->with('analyses.status','analyses.testservice.method.method','analyses.testservice.testname','analyses.sample','analyses.analyst.profile')->where('tsr_id',$request->id)
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%");
            })
            ->orderBy('created_at','ASC')
            ->get()
        );
        return $data;
    }

    public function samples($request){
        $pendings = []; $ongoings = []; $completeds = [];

        return [
            'pendings' => $this->pendings($request),
            'ongoings' => $this->ongoings($request),
            'completeds' => $this->completeds($request),
        ];
    }

    private function completeds($request){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        $ongoings = TsrSample::when($request->keyword, function ($query, $keyword) {
            $query->where('code', 'LIKE', "%{$keyword}%");
        })->withWhereHas('tsr',function ($query) use ($laboratory,$request){
            $query->select('id','due_at','created_at');
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->whereIn('status_id',[3,4]);
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Completed with no report number':
                        $query->where('status_id',4)->where('due_at','<',now())->where('released_at',null);
                    break;
                    case 'Due Soon':
                        $query->whereBetween('due_at', [Carbon::now()->startOfDay(), Carbon::now()->addDays(5)->endOfDay()]);
                    break;
                    case 'Overdue Request':
                        $query->where('status_id',3)->whereDate('due_at','<',now());
                    break;
                    case 'Completed':
                        $query->where('status_id',4);
                    break;
                }
            });
            $query->when($request->month, function ($query, $month) {
                $query->whereMonth('due_at',$month);
            });
        })->withWhereHas('analyses', function ($query) use ($request){
            $query->with('sample','testservice.testname','testservice.method.reference','testservice.method.method');
            $query->where('status_id',12);
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Due Soon':
                        $query->whereIn('status_id',[10,11]);
                    break;
                    case 'Ongoing Task':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                    case 'Completed':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                }
            });
        })
        ->doesntHave('report')
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
        ->get()->map(function ($sample) {
            return [
                'tsr_id' => $sample->tsr_id,
                'tsr' => $sample->tsr,
                'code' => $sample->code,
                'name' => $sample->name,
                'analyses' => AnalysisResource::collection($sample->analyses),
                'count' => $sample->analyses_count,
                'pending' => $sample->pending_analyses_count,
                'ongoing' => $sample->ongoing_analyses_count,
                'completed' => $sample->completed_analyses_count
            ];
        });
        return $ongoings;
    }   

    private function ongoings($request){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        $ongoings = TsrSample::when($request->keyword, function ($query, $keyword) {
            $query->where('code', 'LIKE', "%{$keyword}%");
        })->withWhereHas('tsr',function ($query) use ($laboratory,$request){
            $query->select('id','due_at','created_at');
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->where('status_id',3);
            $query->when($request->month, function ($query, $month) {
                $query->whereMonth('due_at',$month);
            });
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Completed with no report number':
                        $query->where('status_id',4)->where('due_at','<',now())->where('released_at',null);
                    break;
                    case 'Due Soon':
                        $query->whereBetween('due_at', [Carbon::now()->startOfDay(), Carbon::now()->addDays(5)->endOfDay()]);
                    break;
                    case 'Overdue Request':
                        $query->whereDate('due_at','<',now());
                    break;
                    case 'Completed':
                        $query->where('status_id',4);
                    break;
                }
            });
        })->withWhereHas('analyses', function ($query) use ($request){
            $query->with('sample','testservice.testname','testservice.method.reference','testservice.method.method');
            $query->where('status_id',11);
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Due Soon':
                        $query->whereIn('status_id',[10,11]);
                    break;
                    case 'Ongoing Task':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                    case 'Completed':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                }
            });
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
        ->get()->map(function ($sample) {
            return [
                'tsr_id' => $sample->tsr_id,
                'tsr' => $sample->tsr,
                'code' => $sample->code,
                'name' => $sample->name,
                'analyses' => AnalysisResource::collection($sample->analyses),
                'count' => $sample->analyses_count,
                'pending' => $sample->pending_analyses_count,
                'ongoing' => $sample->ongoing_analyses_count,
                'completed' => $sample->completed_analyses_count
            ];
        });
        return $ongoings;
    }   

    private function pendings($request){
        $laboratory = \Auth::user()->userrole->laboratory_type;
        $pendings = TsrSample::when($request->keyword, function ($query, $keyword) {
            $query->where('code', 'LIKE', "%{$keyword}%");
        })->withWhereHas('tsr',function ($query) use ($laboratory,$request){
            $query->select('id','due_at','created_at');
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory)->where('status_id',3);
            $query->when($request->month, function ($query, $month) {
                $query->whereMonth('due_at',$month);
            });
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Completed with no report number':
                        $query->where('status_id',4)->where('due_at','<',now())->where('released_at',null);
                    break;
                    case 'Due Soon':
                        $query->whereBetween('due_at', [Carbon::now()->startOfDay(), Carbon::now()->addDays(5)->endOfDay()]);
                    break;
                    case 'Overdue Request':
                        $query->whereDate('due_at','<',now());
                    break;
                    case 'Completed':
                        $query->where('status_id',4);
                    break;
                }
            });
        })->withWhereHas('analyses', function ($query) use ($request){
            $query->with('sample','testservice.testname','testservice.method.reference','testservice.method.method');
            $query->where('status_id',10);
            $query->when($request->reminder, function ($query, $reminder) {
                switch($reminder){
                    case 'Due Soon':
                        $query->whereIn('status_id',[10,11]);
                    break;
                    case 'Ongoing Task':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                    case 'Completed':
                        $query->where('analyst_id',\Auth::user()->id);
                    break;
                }
            });
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
        ->get()->map(function ($sample) {
            return [
                'tsr_id' => $sample->tsr_id,
                'tsr' => $sample->tsr,
                'code' => $sample->code,
                'name' => $sample->name,
                'analyses' => AnalysisResource::collection($sample->analyses),
                'count' => $sample->analyses_count,
                'pending' => $sample->pending_analyses_count,
                'ongoing' => $sample->ongoing_analyses_count,
                'completed' => $sample->completed_analyses_count
            ];
        });
        return $pendings;
    }

    public function analyses($request){
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
                'lists' => AnalysisResource::collection(TsrAnalysis::with('sample','analyst','testservice.testname','testservice.method.reference','testservice.method.method')
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
    }

    public function save($request){
        $data = TsrSample::create($request->all());
        $data = TsrSample::with('analyses.status','analyses.testservice.method.method','analyses.sample','analyses.analyst')->where('id',$data->id)->first();
        
        return [
            'data' => $data,
            'message' => 'Sample added was successful!', 
            'info' => "You've successfully created the new sample."
        ];
    }

    public function update($request){
        $data = TsrSample::findOrFail($request->id);
        $data->name = $request->name;
        $data->customer_description = $request->customer_description;
        $data->description = $request->description;
        $data->save();
        return [
            'data' => $data,
            'message' => 'Sample update was successful!', 
            'info' => "You've successfully updated the selected sample."
        ];
    }

    public function disposal($request){
        $data = TsrSample::findOrFail($request->sample['value']);
        $data->is_disposed = 1;
        if($data->save()){
            TsrSampleDisposal::create([
                'sample_id' => $request->sample['value'],
                'disposed_at' => $request->disposed_at,
                'disposal_id' => $request->disposal_id,
                'user_id' => \Auth::user()->id
            ]);
        }

        return [
            'data' => $data,
            'message' => 'Sample was disposed successful!', 
            'info' => "You've successfully disposed the sample."
        ];
    }

    public function report($request){
        $labs = json_decode($this->configuration->laboratories,true);
        $laboratory_type = $request->laboratory_type;
        $lab = array_values(array_filter($labs, function ($object) use ($laboratory_type) {
            return $object['value'] === $laboratory_type;
        }));
        $report_count = $lab[0]['report_count'];

        $lab_type = ListLaboratory::select('short')->where('id',$laboratory_type)->first();
        $c = TsrSampleReport::whereHas('sample',function ($query) use ($laboratory_type){
            $query->whereHas('tsr',function ($query) use ($laboratory_type){
                $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory_type);
            });
        })
        ->whereYear('created_at',date('Y'))->where('code','!=',NULL)->count();
        $code = $this->configuration->code.'-'.date('m').date('d').date('Y').'-'.$lab_type->short.'-'.str_pad(($report_count+$c+1), 4, '0', STR_PAD_LEFT);  

        $check = TsrSampleReport::where('code',$code)->count();
        if($check == 0){
            $data = TsrSampleReport::create([
                'code' => $code,
                'sample_id' => $request->sample_id,
                'user_id' => \Auth::user()->id
            ]);
            $message = 'Report number was generated!';
        }else{
            $data = null;
            $message = 'Report number already generated!';
        }

        return [
            'data' => $data,
            'message' => $message, 
            'info' => "You've successfully generated the report number."
        ];

    }

    public function remove($request){
        $id = $request->id;
        $tsr_id = $request->tsr_id;
        $data = TsrSample::find($id);
        $fee = $data->analyses()->sum('fee');
        if($data->delete()){
            $payment = TsrPayment::with('discounted')->where('tsr_id',$tsr_id)->first();
            $subtotal = (float) trim(str_replace(',','',$payment->subtotal),'₱ ');
            $total = (float) trim(str_replace(',','',$payment->total),'₱ ');
            if($payment->discount_id === 1){
                $discount = 0;
                $subtotal = $subtotal - $fee;
                $total = $total - $fee;
            }else{
                $subtotal = $subtotal - $fee;
                $discount = (float) (($payment->discounted->value/100) * $subtotal);
                $total =  ((float) $subtotal - (float) $discount);
            }
            $payment->subtotal = $subtotal;
            $payment->discount = $discount;
            $payment->total = $total;
            $payment->save();
        }
        return [
            'data' => $payment,
            'message' => 'Sample was removed successful!', 
            'info' => "You've successfully remove the sample."
        ];
    }

    public function print($request){
        $id = $request->id;
        $sample = TsrSample::with('report','analyses:id,testservice_id,sample_id','analyses.testservice:id,testname_id,sampletype_id,method_id','analyses.testservice.sampletype:id,name','analyses.testservice.testname:id,name','analyses.testservice.method:id,method_id,fee','analyses.testservice.method.method:id,name,short')
        ->with('tsr:id,code,created_at,customer_id','tsr.customer:id,name_id,name,is_main','tsr.customer.customer_name:id,name,has_branches','tsr.customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','tsr.customer.address.region:code,name,region','tsr.customer.address.province:code,name','tsr.customer.address.municipality:code,name','tsr.customer.address.barangay:code,name')
        ->where('id',$id)->first();

        $hashids = new Hashids('krad',10);
        $code = $hashids->encode($request->id);
        $url = $_SERVER['HTTP_HOST'].'/verification/sample/'.$code;
        $qrCode = new QrCode($url);
        $qrCode->setSize(300);
        $pngWriter = new PngWriter();
        $qrCodeImageString = $pngWriter->write($qrCode)->getString();
        $base64Image = 'data:image/png;base64,' . base64_encode($qrCodeImageString);

        $array = [
            'qrCodeImage' => $base64Image,
            'configuration' => $this->configuration,
            'edited' => json_decode($request->data),
            'sample' => $sample,
            'code' =>  ($sample->report) ? $sample->report->code : 'TESTCODE123'
        ];

        $pdf = \PDF::loadView('reports.test',$array)->setPaper('a4', 'portrait');
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            
            $text = "PAGE $pageNumber OF $pageCount"; 
            $font = $fontMetrics->get_font("Helvetica", "normal");
            $size = 7;
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $canvas->text(106 - $width, 796, $text, $font, $size);
        });
        return $pdf->stream('TestReport.pdf');
    }
}
