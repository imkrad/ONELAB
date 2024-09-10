<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\Laboratory\DropdownClass;
use App\Services\Laboratory\Quotation\ViewClass;
use App\Services\Laboratory\Quotation\SaveClass;

class Quotation2Controller extends Controller
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
            return inertia('Modules/Laboratory/Quotations2/Index',[
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

    public function show($id){
        return inertia('Modules/Laboratory/Quotations2/Profile/Index',[
            'quotation' => $this->view->view($id),
            'analyses' => $this->view->analyses($id),
            'services' => $this->dropdown->services()
        ]);
    }
}
