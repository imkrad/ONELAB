<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\Quotation\ViewClass;
use App\Services\Laboratory\Quotation\SaveClass;

class QuotationController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown, ViewClass $view, SaveClass $save){
        $this->dropdown = $dropdown;
        $this->view = $view;
        $this->save = $save;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'print':
                return $this->view->print($request);
            break;
            default :
            return inertia('Modules/Laboratory/Quotations/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    'modes' => $this->dropdown->modes(),
                    'discounts' => $this->dropdown->discounts(),
                    'statuses' => $this->dropdown->statuses('Quotation'),
                ],
                'counts' => $this->view->counts($this->dropdown->statuses('Quotation'))
            ]);
        }
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'quotation':
                    return $this->save->quotation($request);
                break;
                case 'sample':
                    return $this->save->sample($request);
                break;
                case 'analyses':
                    return $this->save->analyses($request);
                break;
                case 'tsr':
                    return $this->save->tsr($request);
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

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'Confirm':
                    return $this->save->confirm($request);
                break;
                case 'Cancel':
                    return $this->save->cancel($request);
                break;
                case 'sample':
                    return $this->save->removeSample($request);
                break;
                case 'analysis':
                    return $this->save->removeAnalysis($request);
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
        return inertia('Modules/Laboratory/Quotations/Profile/Index',[
            'quotation' => $this->view->view($id),
            'analyses' => $this->view->analyses($id),
            'services' => $this->dropdown->services()
        ]);
    }
}
