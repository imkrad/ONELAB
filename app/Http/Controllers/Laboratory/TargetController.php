<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Laboratory\TargetClass;

class TargetController extends Controller
{
    public function __construct(TargetClass $target){
        $this->target = $target;
    }

    public function index(Request $request){
        switch($request->option){
            default:
                return inertia('Modules/Laboratory/Targets/Index',[
                    'info' => [
                        'targets' => $this->target->counts()
                    ] 
                ]); 
        }   
    }

    public function show($code){
        switch($code){
            case 'customers':
                return inertia('Modules/Laboratory/Targets/Customers/Index');
            break;
            case 'samples':
                return inertia('Modules/Laboratory/Targets/Samples/Index');
            break;
            case 'services':
                return inertia('Modules/Laboratory/Targets/Services/Index');
            break;
            case 'fees':
                return inertia('Modules/Laboratory/Targets/Fees/Index');
            break;
        }
    }
}
