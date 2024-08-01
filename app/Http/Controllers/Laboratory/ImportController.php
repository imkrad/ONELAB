<?php

namespace App\Http\Controllers\Laboratory;

use App\Models\TestserviceName;
use App\Models\TestserviceMethod;
use App\Models\Testservice;
use App\Models\ListLaboratory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TestserviceImport;

class ImportController extends Controller
{
    public function index(Request $request){
        return inertia('Modules/Laboratory/Testservices/Import');
    }

    public function store(Request $request){
        $option = $request->option;
        switch($option){
            case 'preview':
                return $this->preview($request);
            break;
            case 'upload':
                return $this->upload($request);
            break;
        }
    }

    public function preview($request){
        $data =  Excel::toCollection(new TestserviceImport,$request->import_file);
        $rows = $data[0]; 
        foreach($rows as $row){ 
            if($row[1] != ''){
                if($row[0] == 'Chemical Laboratory'){
                    $information[] = [
                        'laboratory' => $row[0],
                        'sampletype' => $row[1],
                        'testname' => $row[2],
                        'method_long' => $row[3],
                        'method_short' => $row[4],
                        'reference' => $row[5],
                        'fee' => $row[6]
                    ];
                }else if($row[0] == 'Metrology Laboratory'){
                    $information[] = [
                        'laboratory' => $row[0],
                        'sampletype' => $row[1],
                        'testname' => $row[2],
                        'method_long' => $row[3],
                        'method_short' => null,
                        'reference' => $row[4],
                        'fee' => $row[5]
                    ];
                }else if($row[0] == 'Microbiological Laboratory'){
                    $information[] = [
                        'laboratory' => $row[0],
                        'sampletype' => $row[1],
                        'testname' => $row[2],
                        'method_long' => $row[4],
                        'method_short' => null,
                        'reference' => $row[5],
                        'fee' => $row[6]
                    ];
                }
               
            }
        }
        return $information;
    }

    public function upload($request){
        set_time_limit(0);

        $result = \DB::transaction(function () use ($request){
            $lists = $request->lists;
            $success = array();
            $failed = array();
            $duplicate = array();

            foreach($lists as $list){
                $laboratory = $list['laboratory'];
                $sampletype = $list['sampletype'];
                $testname = $list['testname'];
                $long = $list['method_long'];
                $short = $list['method_short'];
                $reference = $list['reference'];
                $fee = $list['fee'];

                $laboratory_type = ListLaboratory::where('name',$laboratory)->value('id');
                
                $q_sampletype = TestserviceName::where('name',$sampletype)->where('type_id',30)->where('laboratory_type',$laboratory_type)->first();
                if($q_sampletype){
                    $sampletype_id = $q_sampletype->id;
                }else{
                    $q_sampletype = new TestserviceName;
                    $q_sampletype->name = $sampletype;
                    $q_sampletype->laboratory_type = $laboratory_type;
                    $q_sampletype->type_id = 30;
                    $q_sampletype->save();
                    $sampletype_id = $q_sampletype->id;
                }

                $q_testname = TestserviceName::where('name',$testname)->where('type_id',31)->where('laboratory_type',$laboratory_type)->first();
                if($q_testname){
                    $testname_id = $q_testname->id;
                }else{
                    $q_testname = new TestserviceName;
                    $q_testname->name = $testname;
                    $q_testname->laboratory_type = $laboratory_type;
                    $q_testname->type_id = 31;
                    $q_testname->save();
                    $testname_id = $q_testname->id;
                }

                if($long){
                    $q_method = TestserviceName::where('name',$long)->where('short',$short)->where('type_id',28)->where('laboratory_type',$laboratory_type)->first();
                    if($q_method){
                        $method_id = $q_method->id;
                    }else{
                        $q_method = new TestserviceName;
                        $q_method->name = $long;
                        $q_method->short = $short;
                        $q_method->laboratory_type = $laboratory_type;
                        $q_method->type_id = 28;
                        $q_method->save();
                        $method_id = $q_method->id;
                    }
                }else{
                    $method_id = 1;
                }

                if($reference){
                    $q_reference = TestserviceName::where('name',$reference)->where('type_id',29)->where('laboratory_type',$laboratory_type)->first();
                    if($q_reference){
                        $reference_id = $q_reference->id;
                    }else{
                        $q_reference = new TestserviceName;
                        $q_reference->name = $reference;
                        $q_reference->laboratory_type = $laboratory_type;
                        $q_reference->type_id = 29;
                        $q_reference->save();
                        $reference_id = $q_reference->id;
                    }
                }else{
                    $reference_id = 2;
                }

                $q_TestserviceMethod = TestserviceMethod::where('fee',$fee)
                ->where('method_id',$method_id)
                ->where('reference_id',$reference_id)
                ->where('laboratory_type',$laboratory_type)
                ->first();

                if($q_TestserviceMethod){
                    $TestserviceMethod_id = $q_TestserviceMethod->id;
                }else{
                    $q_TestserviceMethod = new TestserviceMethod;
                    $q_TestserviceMethod->fee = $fee;
                    $q_TestserviceMethod->method_id = $method_id;
                    $q_TestserviceMethod->reference_id = $reference_id;
                    $q_TestserviceMethod->laboratory_type = $laboratory_type;
                    $q_TestserviceMethod->save();
                    $TestserviceMethod_id = $q_TestserviceMethod->id;
                }

                $data = new Testservice;
                $data->sampletype_id = $sampletype_id;
                $data->testname_id = $testname_id;
                $data->method_id = $TestserviceMethod_id;
                $data->laboratory_type = $laboratory_type;
                $data->laboratory_id = 14;
                $data->save();
            }
        });

        return $result;
    }

}