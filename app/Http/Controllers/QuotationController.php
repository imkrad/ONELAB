<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuotationService;
use App\Services\DropdownService;
use App\Services\Quotations\ViewService;
use App\Services\Quotations\SaveService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\TsrRequest;

class QuotationController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownService $dropdown, QuotationService $quot, ViewService $view, SaveService $save){
        $this->dropdown = $dropdown;
        $this->quot = $quot;
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
            return inertia('Modules/Quotations2/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    'purposes' => $this->dropdown->purposes(),
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
                    return $this->quot->tsr($request);
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
                    return $this->quot->cancel($request);
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
        return inertia('Modules/Quotations2/Profile/Index',[
            'quotation' => $this->view->view($id),
            'analyses' => $this->view->analyses($id),
            'services' => $this->dropdown->services()
        ]);
    }
}
