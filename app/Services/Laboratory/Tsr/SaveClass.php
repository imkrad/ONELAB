<?php

namespace App\Services\Laboratory\Tsr;

use Hashids\Hashids;
use App\Models\Tsr;
use App\Models\TsrChild;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrPayment;
use App\Models\TsrGroup;
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

    public function updateReport($request){
        // $hashids = new Hashids('krad',10);
        // $code = $hashids->decode($request->id);
        // return $this->report($code[0]);
        $tsrs =Tsr::get();
        foreach($tsrs as $tsr){
            $this->report($tsr->id);
        }
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

        $hashids = new Hashids('krad',10);
        $code = $hashids->encode($data->id);

        return [
            'data' => $code,
            'message' => 'TS Request creation was successful!', 
            'info' => "You've successfully created the new request."
        ];
    }

    public function child($request){
        $data = Tsr::create(array_merge($request->all(),[
            'code' => $this->generateCode($request),
            'laboratory_id' => $this->laboratory,
            'received_by' => \Auth::user()->id
        ]));

        if($data){
            TsrChild::create([
                'parent_id' => $request->tsr_id,
                'child_id' => $data->id
            ]);
            $data->payment()->create([
                'discount_id' => $request->payment['discount_id'],
                'collection_id' => $request->payment['collection_id'],
                'payment_id' => $request->payment['payment_id'],
                'status_id' => $request->payment['status_id'],
                'or_number' => $request->payment['or_number'],
                'is_child' => 1,
                'is_paid' => 1
            ]);
            $count = ($request->has_control) ? 2 : 1;
            for ($i = 0; $i < $count; $i++) {
                $sample = $data->samples()->create([
                    'name' => $request->name,
                    'customer_description' => $request->customer_description,
                    'description' => $request->description,
                    'code' => $this->generateSampleCode($data)
                ]);
                foreach($request->lists as $list){
                    TsrGroup::where('id',$list['id'])->update(['status_id' => 24]);
                    TsrAnalysis::create([
                        'status_id' => 10,
                        'testservice_id' => $list['testservice_id'],
                        'sample_id' => $sample->id,
                        'fee' => $list['fee']
                    ]);

                    $total = $this->updateTotal($data->id,$list['fee']);
                }
            }

            $this->report($data->id);
        }

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
        if(is_null($data->code)){
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

    private function updateTotal($id,$fee){
        $data = TsrPayment::with('discounted')->where('tsr_id',$id)->first();
        $fee = (float) trim(str_replace(',','',$fee),'₱ ');
        $subtotal = (float) trim(str_replace(',','',$data->subtotal),'₱ ');
        if($data->discount_id === 1){
            $discount = 0;
            $subtotal = $subtotal + $fee;
            $total = $subtotal;
        }else{
            $subtotal = $subtotal + $fee;
            $discount = (float) (($data->discounted->value/100) * $subtotal);
            $total =  ((float) $subtotal - (float) $discount);
        }
        $data->subtotal = $subtotal;
        $data->discount = $discount;
        $data->total = $total;
        $data->save();
        return $data;
    }

    private function report($id){
        $tsr = Tsr::where('id',$id)
        ->with('service.service')
        ->with('received:id','received.profile:id,firstname,middlename,lastname,user_id')
        ->with('laboratory','laboratory_type:id,name','status:id,name,color,others')
        ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.wallet')
        ->with('customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->with('conforme:id,name,contact_no','customer.contact:id,email,contact_no,customer_id')
        ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,is_free,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others','payment.collection:id,name','payment.type:id,name','payment.discounted:id,name,value')
        ->first();
        // dd($tsr);
        // $samples = TsrAnalysis::query()->with('testservice.method.method','testservice.testname','sample')
        // ->whereHas('sample',function ($query) use ($id) {
        //     $query->whereHas('tsr',function ($query) use ($id) {
        //         $query->where('id',$id);
        //     });
        // })
        // ->orderBy('created_at','ASC')
        // ->get();

        $samples = TsrSample::with('analyses.testservice.method.method','analyses.testservice.testname','analyses.addfee.service')->whereHas('tsr',function ($query) use ($id) {
            $query->where('id',$id);
        })->get();

        $groupedData = [];
        foreach ($samples as $row) {
            $sampleCode = $row['code'];
            $sampleName = $row['name'];
            
            foreach($row['analyses'] as $index=>$analysis){
                $testName = $analysis['testservice']['testname']['name'];
                $testMethod = $analysis['testservice']['method']['method']['name'];
                $key = $sampleCode . "_" . $testName . "_" . $testMethod;
                
                if (!isset($groupedData[$key])) {
                    if($analysis['addfee']){
                        $fee = [
                            'name' => $analysis['addfee']['service']['name'],
                            'fee' => $analysis['addfee']['service']['fee'],
                            'quantity' => $analysis['addfee']['quantity'],
                            'total' => $analysis['addfee']['total']
                        ];
                    }else{
                        $fee = null;
                    }
                    $groupedData[$key] = [
                        "samplecode" => ($index == 0) ? $sampleCode : '',
                        "samplename" => ($index == 0) ? $sampleName : '-',
                        "testname" => $testName,
                        "method" => $testMethod,
                        "count" => 0,
                        "fee" => $analysis['fee'],
                        'additional' => $fee
                    ];
                }
                $groupedData[$key]["count"] += 1;
            }
        }
        if(isset($tsr->service)){
            $service = [
                'name' => $tsr->service->service->name,
                'description' => $tsr->service->service->description,
                'quantity' => $tsr->service->quantity,
                'fee' => $tsr->service->fee
            ];
        }else{
            $service = null;
        }

        $samples = array_values($groupedData);

        $descs = TsrSample::query()
        ->where('tsr_id',$id)
        ->get();
        $d = ($tsr->customer->address->address != NULL || $tsr->customer->address->address != '') ? $tsr->customer->address->address.', ' : '';
        if($tsr->customer->address->municipality->name == 'Zamboanga City' || $tsr->customer->address->municipality->name == 'Isabela City'){
            $a = $tsr->customer->address->municipality->name;
        }else if($tsr->customer->address->province->name == 'Sulu'){
            $a = ', '.$tsr->customer->address->province->name;
        }else{
            $a = $tsr->customer->address->municipality->name.', '.$tsr->customer->address->province->name.', '.$tsr->customer->address->region->region;
        }
        $information = [
            'code' => $tsr->code,
            'service' => $service,
            'date' => $tsr->created_at,
            'laboratory_id' => $tsr->laboratory_id,
            'due_at' => $tsr->due_at,
            'receiver' => $tsr->received->profile->firstname.' '.$tsr->received->profile->middlename[0].'. '.$tsr->received->profile->lastname,
            'customer' => [
                'name' => ($tsr->customer->is_main) ? $tsr->customer->customer_name->name :  $tsr->customer->customer_name->name.' - '.$tsr->customer->name,
                'address' => $d.$tsr->customer->address->barangay->name.', '.$a,
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
        if(TsrReport::where('tsr_id',$id)->count() > 0){
            $data = TsrReport::where('tsr_id',$id)->first();
            $data->information = json_encode($information);
            $data->save();
        }else{
            $data = TsrReport::create([
                'information' => json_encode($information,true),
                'tsr_id' => $id
            ]);
        }
        return true;
    }
}
