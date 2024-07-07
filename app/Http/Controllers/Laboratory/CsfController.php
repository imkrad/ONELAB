<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Laboratory\CsfClass;
use App\Traits\HandlesTransaction;
use App\Models\Tsr;

class CsfController extends Controller
{
    use HandlesTransaction;

    public function __construct(CsfClass $csf){
        $this->csf = $csf;
    }

    public function index(Request $request){
        $option = $request->option;
        switch($option){
            case 'lists':
                return $this->csf->lists($request);
            break;
            default: 
                return inertia('Modules/Laboratory/Csf/Index');
        }
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'question':
                    return $this->csf->question($request);
                break;
                case 'survey':
                    return $this->csf->survey($request);
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

    public function show(Request $request){
        return inertia('Modules/Laboratory/Public/Csf',[
            'tsrs' => $this->csf->tsrs(),
            'questions' => $this->csf->questions(),
        ]);
    }
}
