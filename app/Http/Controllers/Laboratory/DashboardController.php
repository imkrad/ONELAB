<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Services\Laboratory\DropdownClass;
use App\Http\Controllers\Controller;
use App\Services\Laboratory\Dashboard\AnalystClass;
use App\Services\Laboratory\Dashboard\FinanceClass;
use App\Services\Laboratory\Dashboard\ReleasingClass;
use App\Services\Laboratory\Dashboard\MainClass;

class DashboardController extends Controller
{
    public function __construct(FinanceClass $finance, 
                                AnalystClass $analyst, 
                                DropdownClass $dropdown, 
                                ReleasingClass $releasing, 
                                MainClass $main)
    {
        $this->analyst = $analyst;
        $this->dropdown = $dropdown;
        $this->finance = $finance;
        $this->releasing = $releasing;
        $this->main = $main;
    }

    public function index(Request $request){
        if(!\Auth::check()){
            return inertia('Auth/Login',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratories(),
                    'types' => $this->dropdown->laboratory_all(),
                    'roles' => $this->dropdown->roles(),
                ]
            ]);
        }else{
            if(\Auth::user()->role === 'Administrator'){
                return inertia('Modules/Executive/Dashboard/Index');
            }else{
                $role = (\Auth::user()->userrole) ? \Auth::user()->userrole->role->name : null;
                switch($role){
                    case 'Customer Relation Officer':
                        return inertia('Modules/Laboratory/Dashboard/CRO/Index');
                    break;
                    case 'Lab Analyst':
                        return inertia('Modules/Laboratory/Dashboard/Analyst/Index',[
                            'samples' => $this->analyst->samples()
                        ]);
                    break;
                    case 'Accountant':
                        return inertia('Modules/Finance/Dashboard/Index',[
                            'dropdowns' => [
                                'laboratories' => $this->dropdown->laboratory_types(),
                                'collections' => $this->dropdown->collections(),
                                'payments' => $this->dropdown->payments(),
                                'statuses' => $this->dropdown->statuses('Payment'),
                                'counts' => $this->finance->counts($request)
                            ]
                        ]);
                    break;
                    case 'Cashier':
                        return inertia('Modules/Finance/Dashboard/Index',[
                            'dropdowns' => [
                                'laboratories' => $this->dropdown->laboratory_types(),
                                'collections' => $this->dropdown->collections(),
                                'payments' => $this->dropdown->payments(),
                                'deposits' => $this->dropdown->deposits(),
                                'statuses' => $this->dropdown->statuses('Payment'),
                                'orseries' => $this->finance->orseries(),
                                'counts' => $this->finance->counts($request)
                            ],
                            'statuses' => $this->finance->statuses($request),
                            'payments' => $this->finance->payments($request)
                        ]);
                    break;
                    case 'Releasing Officer':
                        return inertia('Modules/Laboratory/Dashboard/Releasing/Index',[
                            'lists' => $this->releasing->lists()
                        ]);
                    break;
                    default:
                        return inertia('Modules/Laboratory/Dashboard/Index',[
                            'laboratories' => $this->dropdown->laboratory_types(),
                        ]);
                }  
            } 
        }
    }
}
