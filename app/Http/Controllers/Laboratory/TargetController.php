<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Requests\TargetRequest;
use App\Services\Laboratory\TargetClass;

class TargetController extends Controller
{
    use HandlesTransaction;

    public function __construct(TargetClass $target){
        $this->target = $target;
    }

    public function index(Request $request){
        switch($request->option){
            default:
                return inertia('Modules/Laboratory/Targets/Index',[
                    'info' => [
                        'targets' => $this->target->targets(),
                        'counts' => $this->target->counts()
                    ] 
                ]); 
        }   
    }

    public function show($code){
        return $this->target->view($code);
    }

    public function store(TargetRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'target':
                    return $this->target->save($request);
                break;
            }
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
