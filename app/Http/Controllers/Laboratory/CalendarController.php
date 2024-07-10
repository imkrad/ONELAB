<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Laboratory\DropdownClass;

class CalendarController extends Controller
{
    public function __construct(DropdownClass $dropdown){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        $option = $request->option;
        switch($option){
            default: 
                return inertia('Modules/Laboratory/Calendar/Index',[
                    'dropdowns' => [
                        'events' => $this->dropdown->events()
                    ]
                ]);
        }
    }
}
