<?php

namespace App\Services\Laboratory\Tsr;

use Hashids\Hashids;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrSampleReport;
use App\Models\TsrPayment;
use App\Models\Configuration;
use App\Models\ListDropdown;
use App\Models\ListLaboratory;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Http\Resources\SampleResource;

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
        $data = TsrSample::findOrFail($request->id)->update($request->all());
        return [
            'data' => $data,
            'message' => 'Sample update was successful!', 
            'info' => "You've successfully updated the selected sample."
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

        $data = TsrSampleReport::create([
            'code' => $code,
            'sample_id' => $request->sample_id,
            'user_id' => \Auth::user()->id
        ]);

        return [
            'data' => $data,
            'message' => 'Report number was generated!', 
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
                $total =  ((float) $total - (float) $discount);
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
