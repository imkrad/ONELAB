<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\SampleRegisterClass;

class SampleRegisterController extends Controller
{
    public function __construct(DropdownClass $dropdown, SampleRegisterClass $sample){
        $this->dropdown = $dropdown;
        $this->sample = $sample;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->sample->lists($request);
            break;
            default :
            return inertia('Modules/Laboratory/Sampleregister/Index',[
                'dropdowns' => []
            ]);
        }
    }
}
