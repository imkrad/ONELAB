<?php

namespace App\Services\Laboratory\Tsr;

use Hashids\Hashids;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrReport;
use App\Models\Laboratory;
use App\Models\ListLaboratory;
use App\Models\Configuration;
use App\Http\Resources\Laboratory\TsrResource;

class SaveClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->configuration = Configuration::with('laboratory.address')->where('laboratory_id',$this->laboratory)->first();
    }

    public function tsr($request){
        $data = Tsr::create(array_merge($request->all(),[
            'status_id' => 1,
            'laboratory_id' => $this->laboratory,
            'customer_id' => $request->customer['value'],
            'conforme_id' => $request->conforme['value'],
            'received_by' => \Auth::user()->id
        ]));
        
        $payment = (in_array($request->discount_id, [5, 6, 7])) ? ['status_id' => 8,'is_free' => 1,'paid_at' => now()] : ['status_id' => 6];
        $data->payment()->create(array_merge($request->all(),$payment));

        return [
            'data' => $data,
            'message' => 'TS Request creation was successful!', 
            'info' => "You've successfully created the new request."
        ];
    }

    public function cancel($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        $data = Tsr::find($id[0]);
        $data->update($request->except(['option']));
        
        return [
            'data' => $data,
            'message' => 'TSR cancellation was successful!', 
            'info' => "You've successfully updated the tsr status.",
        ];
    }

    public function release($request){
        $data = Tsr::find($request->id);
        $data->update($request->except(['option']));
        
        return [
            'data' => $data,
            'message' => 'TSR was released successfully!', 
            'info' => "You've successfully released the tsr.",
        ];
    }

    public function confirm($request){
        $data = Tsr::with('payment')->where('id',$request->id)->first();
        $data->status_id = (in_array($data->payment->discount_id, [5, 6, 7])) ? 3 : $request->status_id;
        $data->due_at = $request->due_at;
        $data->code = $this->generateCode($data);
        if($data->save()){
            $samples = TsrSample::where('tsr_id',$request->id)->get();
            foreach($samples as $sample){
                $s = TsrSample::findOrFail($sample->id);
                $s->code = $this->generateSampleCode($data);
                $s->save();
            }
            $this->report($request->id);
            
            if($request->is_government){
                $data->status_id = 3;
                $data->save();
                $data->payment()->update(['status_id' => 18]);
            }
        }

        $final =  Tsr::query()
        ->with('laboratory','status','received.profile')
        ->with('customer.customer_name','conforme','customer.address.region','customer.address.province','customer.address.municipality','customer.address.barangay')
        ->with('payment.status','payment.collection','payment.type','payment.discounted')
        ->where('id',$request->id)
        ->first();
        return [
            'data' => new TsrResource($final),
            'message' => 'TSR was successfully confirmed!', 
            'info' => "You've successfully updated the tsr status.",
        ];
    }

    private function generateCode($data){
        $labs = json_decode($this->configuration->laboratories,true);
        $specificValue = $data->laboratory_type;
        $lab = array_values(array_filter($labs, function ($object) use ($specificValue) {
            return $object['value'] === $specificValue;
        }));
        $tsr_count = $lab[0]['tsr_count'];

        $laboratory_type = $data->laboratory_type;
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $year = date('Y'); 
        $lab_type = ListLaboratory::select('short')->where('id',$laboratory_type)->first();
        $c = Tsr::where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory_type)
        ->whereYear('created_at',$year)->where('code','!=',NULL)->count();
        $code = $lab->code.'-'.date('m').date('Y').'-'.$lab_type->short.'-'.str_pad(($tsr_count+$c+1), 4, '0', STR_PAD_LEFT);  
        return $code;
    }

    private function generateSampleCode($data){
        $labs = json_decode($this->configuration->laboratories,true);
        $specificValue = $data->laboratory_type;
        $lab = array_values(array_filter($labs, function ($object) use ($specificValue) {
            return $object['value'] === $specificValue;
        }));
        $sample_count = $lab[0]['sample_count'];

        $laboratory_type = $data->laboratory_type;
        $year = ($this->configuration->samplecode_year) ? '-'.date('Y') : '';
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $year = date('Y'); 
        $lab_type = ListLaboratory::select('short')->where('id',$laboratory_type)->first();
        $c = TsrSample::whereHas('tsr',function ($query) use ($laboratory_type) {
            $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$laboratory_type);
        })->whereYear('created_at',$year)->where('code','!=','NULL')->count();
        return $lab_type->short.'-'.str_pad(($sample_count+$c+1), 5, '0', STR_PAD_LEFT); 
    }

    private function report($id){
        $tsr = Tsr::where('id',$id)
        ->with('received:id','received.profile:id,firstname,lastname,user_id')
        ->with('laboratory','laboratory_type:id,name','status:id,name,color,others')
        ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.wallet')
        ->with('customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->with('conforme:id,name,contact_no','customer.contact:id,email,contact_no,customer_id')
        ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,is_free,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others','payment.collection:id,name','payment.type:id,name','payment.discounted:id,name,value')
        ->first();

        $samples = TsrAnalysis::query()->with('testservice.method.method','testservice.testname','sample')
        ->whereHas('sample',function ($query) use ($id) {
            $query->whereHas('tsr',function ($query) use ($id) {
                $query->where('id',$id);
            });
        })
        ->orderBy('created_at','ASC')
        ->get();

        $groupedData = [];
        foreach ($samples as $row) {
            $sampleCode = $row['sample']['code'];
            $sampleName = $row['sample']['name'];
            $testName = $row['testservice']['testname']['name'];
            $testMethod = $row['testservice']['method']['method']['name'];
            
            $key = $sampleCode . "_" . $testName . "_" . $testMethod;
            
            if (!isset($groupedData[$key])) {
                $groupedData[$key] = [
                    "samplecode" => $sampleCode,
                    "samplename" => $sampleName,
                    "testname" => $testName,
                    "method" => $testMethod,
                    "count" => 0,
                    "fee" => $row['fee']
                ];
            }
            $groupedData[$key]["count"] += 1;
        }
        $samples = array_values($groupedData);

        $descs = TsrSample::query()
        ->where('tsr_id',$id)
        ->get();

        $information = [
            'code' => $tsr->code,
            'date' => $tsr->created_at,
            'laboratory_id' => $tsr->laboratory_id,
            'due_at' => $tsr->due_at,
            'customer' => [
                'name' => ($tsr->customer->is_main) ? $tsr->customer->customer_name->name :  $tsr->customer->customer_name->name.' - '.$tsr->customer->name,
                'address' => $tsr->customer->address->address.', '.$tsr->customer->address->municipality->name.', '.$tsr->customer->address->province->name.', '.$tsr->customer->address->region->region,
                'contact_no' => $tsr->customer->contact->contact_no,
                'email' => $tsr->customer->contact->email,
                'conforme' => [
                    'name' => $tsr->conforme->name,
                    'contact_no' => $tsr->conforme->contact_no
                ]
            ],
            'payment' => [
                'subtotal' => $tsr->payment->subtotal,
                'discount' => $tsr->payment->discount,
                'total' => $tsr->payment->total,
            ],
            'samples' => $samples,
            'descriptions' => $descs    
        ];
        
        $data = TsrReport::create([
            'information' => json_encode($information),
            'tsr_id' => $id
        ]);

        return true;
    }
}
