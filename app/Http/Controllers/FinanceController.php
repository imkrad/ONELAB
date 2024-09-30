<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\FinanceService;
use App\Http\Requests\FinanceRequest;
use App\Services\Finance\ViewClass;
use App\Services\Finance\SaveClass;
use App\Services\Finance\UpdateClass;
use App\Services\Finance\DropdownClass;

class FinanceController extends Controller
{
    use HandlesTransaction;

    public function __construct(ViewClass $view, SaveClass $save, UpdateClass $update, DropdownClass $dropdown){
        $this->view = $view;
        $this->save = $save;
        $this->update = $update;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'collections':
                return $this->view->collections($request);
            break;
            case 'receipts':
                return $this->view->receipts($request);
            break;
            case 'names':
                return $this->view->names($request);
            break;
            case 'orseries':
                return $this->view->orseries($request);
            break;
            case 'ops':
                return $this->view->ops($request);
            break;
            case 'ops_pending':
                return $this->view->ops_pending($request);
            break;
            case 'op':
                return $this->view->print_op($request);
            break;
            case 'print':
                return $this->view->print($request);
            break;
            case 'payor':
                return $this->view->payor($request);
            break;
            case 'ornumbers':
                return $this->view->ornumbers($request);
            break;
            case 'forpayment':
                return $this->view->forpayment($request);
            break;
            case 'report-op':
                return $this->view->printReportOp($request);
            break;
            case 'report-or':
                return $this->view->printReportOr($request);
            break;
            default:
                return inertia('Modules/Finance/Dashboard/Index'); 
        }   
    }

    public function show($code){
        switch($code){
            case 'ops':
                return inertia('Modules/Finance/Orders/Index',[
                    'statuses' => $this->dropdown->statuses('Payment'),
                ]);
            break;
            case 'receipts':
                return inertia('Modules/Finance/Receipts/Index');
            break;
            case 'names':
                return inertia('Modules/Finance/Names/Index');
            break;
            case 'orseries':
                return inertia('Modules/Finance/Orseries/Index');
            break;
            case 'deposits':
                return inertia('Modules/Finance/Deposits/Index',[
                    'deposits' => $this->dropdown->deposits(),
                    'orseries' => $this->dropdown->orseries(),
                ]);
            break;
            case 'collections':
                return inertia('Modules/Finance/Collections/Index');
            break;
            case 'reports':
                return inertia('Modules/Finance/Reports/Index',[
                    'years' => $this->view->years(),
                    'info' => [
                        'month' => \DateTime::createFromFormat('!m', date('m'))->format('F'),
                        'year' => date('Y')
                    ]
                ]);
            break;
        }
    }

    public function store(FinanceRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'collection':
                    return $this->save->collection($request);
                break;
                case 'name':
                    return $this->save->name($request);
                break;
                case 'orseries':
                    return $this->save->orseries($request);
                break;
                case 'op':
                    return $this->save->op($request);
                break;
                case 'wallet':
                    return $this->save->wallet($request);
                break;
                case 'receipt':
                    return $this->save->receipt($request);
                break;
                case 'receipt_nonlab':
                    return $this->save->receipt_nonlab($request);
                break;
                case 'deposit':
                    return $this->save->deposit($request);
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
                case 'collection':
                    return $this->update->user($request);
                break;
                case 'orseries':
                    return $this->update->orseries($request);
                break;
                case 'name':
                    return $this->update->name($request);
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

    // use HandlesTransaction;

    // public function __construct(FinanceService $finance){
    //     $this->finance = $finance;
    // }

    // public function index(Request $request){
    //     switch($request->option){
    //         case 'lists':
    //             return $this->finance->lists($request);
    //         break;
    //         case 'print':
    //             return $this->finance->print($request);
    //         break;
    //     }
    // }

    // public function store(FinanceRequest $request){
    //     $result = $this->handleTransaction(function () use ($request) {
    //         if($request->option == 'op'){
    //             return $this->finance->store_op($request);
    //         }else if($request->option == 'receipt'){
    //             return $this->finance->store_receipt($request);
    //         }else if($request->option == 'series'){
    //             return $this->finance->store_series($request);
    //         }else if($request->option == 'wallet'){
    //             return $this->finance->store_wallet($request);
    //         }
    //     });

    //     return back()->with([
    //         'data' => $result['data'],
    //         'message' => $result['message'],
    //         'info' => $result['info'],
    //         'status' => $result['status'],
    //     ]);
    // }
}
