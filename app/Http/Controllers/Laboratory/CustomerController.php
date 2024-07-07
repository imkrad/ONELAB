<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\CustomerClass;


class CustomerController extends Controller
{
    use HandlesTransaction;

    public function __construct(CustomerClass $customer, DropdownClass $dropdown){
        $this->customer = $customer;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->customer->lists($request);
            break;
            case 'counts':
                return $this->customer->counts($request);
            break;
            case 'search':
                return $this->customer->search($request);
            break;
            case 'pick':
                return $this->customer->pick($request);
            break;
            default :
            return inertia('Modules/Laboratory/Customers/Index',[
                'dropdowns' => [
                    'bussinesses' => $this->dropdown->bussiness_nature(),
                    'industries' => $this->dropdown->industry_type(),
                    'classes' => $this->dropdown->classes(),
                    'regions' => $this->dropdown->regions()
                ],
                'region' => $this->customer->region()
            ]);
        }
    }

    public function store(CustomerRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            if($request->type == 'customer'){
                return $this->customer->save($request);
            }else{
                return $this->customer->conforme($request);
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
        $customer = $this->customer->view($id);
        return inertia('Modules/Laboratory/Customers/Profile/Index',[
            'customer' => $customer
        ]);
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->customer->update($request);
        });
        
        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
