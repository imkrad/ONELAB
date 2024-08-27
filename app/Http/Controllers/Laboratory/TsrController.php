<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\Tsr\SaveClass;
use App\Services\Laboratory\Tsr\ViewClass;
use App\Http\Requests\TsrRequest;

class TsrController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown, SaveClass $save, ViewClass $view){
        $this->dropdown = $dropdown;
        $this->save = $save;
        $this->view = $view;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'customer':
                return $this->view->customer($request);
            break;
            case 'print':
                return $this->view->print($request);
            break;
            case 'tsrs':
                return $this->view->tsrs($request);
            break;
            default :
            return inertia('Modules/Laboratory/Tsr/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    // 'modes' => $this->dropdown->modes(),
                    'discounts' => $this->dropdown->discounts(),
                    'statuses' => $this->dropdown->statuses('Request'),
                    'services' => $this->dropdown->services()
                ],
                'counts' => $this->view->counts($this->dropdown->statuses('Request'))
            ]);
        }
    }

    public function report(){
        $this->save->report();
    }

    public function store(TsrRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->save->tsr($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function update(TsrRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'Confirm':
                    return $this->save->confirm($request);
                break;
                case 'Cancel':
                    return $this->save->cancel($request);
                break;
                case 'release':
                    return $this->save->release($request);
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

    public function show($id){
        return inertia('Modules/Laboratory/Tsr/Profile/Index',[
            'tsr' => $this->view->view($id),
            'analyses' => $this->view->analyses($id),
            'services' => $this->dropdown->services(),
            'laboratories' => $this->dropdown->laboratory_types()
        ]);
    }
}
