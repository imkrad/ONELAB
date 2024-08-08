<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Requests\NameRequest;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\Testservice\SaveClass;
use App\Services\Laboratory\Testservice\ViewClass;

class ServiceController extends Controller
{
    use HandlesTransaction;

    public function __construct(ViewClass $view, SaveClass $save, DropdownClass $dropdown){
        $this->dropdown = $dropdown;
        $this->view = $view;
        $this->save = $save;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'testservices':
                return $this->view->testservices($request);
            break;
            case 'search':
                return $this->view->search($request);
            break;
            case 'methods':
                return $this->view->methods($request);
            break;
            default:
                return inertia('Modules/Services/Dashboard/Index'); 
        }   
    }

    public function show($code){
        switch($code){
            case 'lists':
                return inertia('Modules/Services/Lists/Index',[
                    'dropdowns' => [
                        'laboratories' => $this->dropdown->laboratories(),
                        'types' => $this->dropdown->laboratory_types()
                    ]
                ]);
            break;
            case 'import':
                return inertia('Modules/Services/Lists/Import');
            break;
        }
    }

    public function store(NameRequest $request){
        $option = $request->option;
        switch($option){
            case 'add':
                return $this->save->add($request);
            break;
            case 'create':
                $result = $this->handleTransaction(function () use ($request) {
                    return $this->save->create($request);
                });
                return back()->with([
                    'data' => $result['data'],
                    'message' => $result['message'],
                    'info' => $result['info'],
                    'status' => $result['status'],
                ]);
            break;
            case 'fee':
                $result = $this->handleTransaction(function () use ($request) {
                    return $this->save->fee($request);
                });
                return back()->with([
                    'data' => $result['data'],
                    'message' => $result['message'],
                    'info' => $result['info'],
                    'status' => $result['status'],
                ]);
            break;
            case 'method':
                return $this->save->method($request);
            break;
            case 'preview':
                return $this->save->preview($request);
            break;
            case 'upload':
                return $this->save->upload($request);
            break;
        }
    }
}
