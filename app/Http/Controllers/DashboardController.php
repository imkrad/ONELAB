<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Dashboard\CroClass;
use App\Services\Dashboard\AnalystClass;
use App\Services\Dashboard\FinanceClass;
use App\Services\Laboratory\DropdownClass;

class DashboardController extends Controller
{
    public function __construct(FinanceClass $finance, CroClass $cro, DropdownClass $dropdown, AnalystClass $analyst){
        $this->finance = $finance;
        $this->cro = $cro;
        $this->dropdown = $dropdown;
        $this->analyst = $analyst;
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
                        return inertia('Modules/Laboratory/Dashboard/CRO/Index',[
                            'dropdowns' => [
                                'info' => $this->cro->info($request),
                                'counts' => $this->cro->counts($request),
                                'reminders' => $this->cro->reminders($request),
                                'statuses' => $this->cro->statuses($request),
                                'laboratories' => $this->dropdown->laboratory_types($request),
                            ]
                        ]);
                    break;
                    case 'Lab Analyst':
                        return inertia('Modules/Laboratory/Dashboard/Analyst/Index',[
                            'samples' => $this->analyst->samples(),
                            'reminders' => $this->analyst->reminders($request),
                        ]);
                    break;
                    case 'Cashier':
                        return inertia('Modules/Finance/Dashboard/Cashier/Index',[
                            'dropdowns' => [
                                'counts' => $this->finance->accountant($request),
                                'deposits' => $this->finance->deposits(),
                                'orseries' => $this->finance->orseries(),
                                'collections' => $this->finance->collections('Non-laboratory'),
                                'payments' => $this->finance->payments(),
                            ]
                        ]);
                    break;
                    case 'Accountant':
                        return inertia('Modules/Finance/Dashboard/Accountant/Index',[
                            'dropdowns' => [
                                'counts' => $this->finance->accountant($request),
                                'collections' => $this->finance->collections('Laboratory'),
                                'payments' => $this->finance->payments(),
                            ]
                        ]);
                    break;
                }
            }
        }
    }
}
