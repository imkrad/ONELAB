<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Traits\HandlesTransaction;
use App\Services\Executive\ViewClass;
use App\Services\Executive\SaveClass;
use App\Services\Executive\UpdateClass;
use App\Services\Laboratory\DropdownClass;

class ExecutiveController extends Controller
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
            case 'users':
                return $this->view->users($request);
            break;
            case 'roles':
                return $this->view->roles($request);
            break;
            default:
                return inertia('Modules/Executive/Dashboard/Index'); 
        }   
    }

    public function show($code){
        switch($code){
            case 'users':
                return inertia('Modules/Executive/Users/Index',[
                    'dropdowns' => [
                        'laboratories' => $this->dropdown->laboratories(),
                        'types' => $this->dropdown->laboratory_all(),
                        'roles' => $this->dropdown->roles(),
                    ]
                ]);
            break;
            case 'roles':
                return inertia('Modules/Executive/Roles/Index');
            break;
            case 'menus':
                return inertia('Modules/Executive/Menus/Index');
            break;
            case 'authentications':
                return inertia('Modules/Executive/Authentications/Index');
            break;
            case 'activities':
                return inertia('Modules/Executive/Activities/Index');
            break;
            case 'backups':
                return inertia('Modules/Executive/Backups/Index');
            break;
        }
    }

    public function store(UserRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'user':
                    return $this->save->user($request);
                break;
                case 'role':
                    return $this->save->role($request);
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
                case 'user':
                    return $this->update->user($request);
                break;
                case 'role':
                    return $this->update->role($request);
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
