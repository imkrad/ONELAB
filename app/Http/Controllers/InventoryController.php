<?php

namespace App\Http\Controllers;

use App\Models\InventorySupplier;
use Illuminate\Http\Request;
use App\Services\Inventory\DropdownClass;
use App\Traits\HandlesTransaction;
use App\Services\Inventory\ViewService;
use App\Services\Inventory\SaveService;
use App\Services\Inventory\ItemClass;
use App\Services\Inventory\UpdateService;
use App\Http\Requests\InventoryRequest;

class InventoryController extends Controller
{
    use HandlesTransaction;

    public function __construct(SaveService $save, ViewService $view, UpdateService $update, DropdownClass $dropdown, ItemClass $item){
        $this->dropdown = $dropdown;
        $this->save = $save;
        $this->view = $view;
        $this->item = $item;
        $this->update = $update;
    }

    public function index(Request $request){
        switch($request->option){
            case 'suppliers':
                return $this->view->suppliers($request);
            break;
            case 'items':
                return $this->item->lists($request);
            break;
            case 'equipments':
                return $this->view->equipments($request);
            break;
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'search':
                return $this->view->search($request);
            break;
            default:
                return inertia('Modules/Inventory/Dashboard/Index',[
                    'dropdowns' => [
                        'statistics' => $this->view->statistics(),
                        'suppliers' => $this->view->supplier_lists(),
                        'units' => $this->dropdown->units(),
                    ]
                ]); 
        }   
    }

    public function show($code){
        switch($code){
            case 'entries':
                return inertia('Modules/Inventory/Entries/Index');
            break;
            case 'withdrawals':
                return inertia('Modules/Inventory/Withdrawals/Index');
            break;
            case 'equipments':
                return inertia('Modules/Inventory/Equipments/Index',[
                    'dropdowns' => [
                        'types' => $this->dropdown->types(),
                        'suppliers' => $this->view->supplier_lists()
                    ]
                ]);
            break;
            case 'items':
                return inertia('Modules/Inventory/Items/Index',[
                    'dropdowns' => [
                        'categories' => $this->dropdown->categories(),
                        'units' => $this->dropdown->units(),
                        'suppliers' => $this->view->supplier_lists()
                    ],
                    'analytics' => [
                        'categories' => $this->item->categories(),
                        'statuses' => $this->item->statuses(),
                        'reminders' => $this->item->reminders(),
                    ]
                ]);
            break;
            case 'suppliers':
                return inertia('Modules/Inventory/Suppliers/Index',[
                    'dropdowns' => [
                        'regions' => $this->dropdown->regions()
                    ]
                ]);
            break;
        }
    }

    public function store(InventoryRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'supplier':
                    return $this->save->supplier($request);
                break;
                case 'item':
                    return $this->item->save($request);
                break;
                case 'stock':
                    return $this->save->stock($request);
                break;
                case 'equipment':
                    return $this->save->equipment($request);
                break;
                case 'withdraw':
                    return $this->save->withdraw($request);
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
                case 'supplier':
                    return $this->update->supplier($request);
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
