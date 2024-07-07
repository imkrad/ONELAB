<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Requests\SampleRequest;
use App\Http\Controllers\Controller;
use App\Services\Laboratory\Tsr\SampleClass;

class SampleController extends Controller
{
    use HandlesTransaction;

    public function __construct(SampleClass $sample){
        $this->sample = $sample;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->sample->lists($request);
            break;
            case 'print':
                return $this->sample->print($request);
            break;
        }
    }

    public function store(SampleRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'remove':
                    return $this->sample->remove($request);
                break;
                case 'report':
                    return $this->sample->report($request);
                break;
                default:
                return $this->sample->save($request);
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
