<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\Laboratory\CalendarClass;
use App\Services\Laboratory\DropdownClass;

class CalendarController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown, CalendarClass $calendar){
        $this->dropdown = $dropdown;
        $this->calendar = $calendar;
    }

    public function index(Request $request){
        $option = $request->option;
        switch($option){
            case 'lists':
                return $this->calendar->lists($request);
            break;
            default: 
            return inertia('Modules/Laboratory/Calendar/Index',[
                'dropdowns' => [
                    'events' => $this->dropdown->events(),
                    'laboratories' => $this->dropdown->laboratory_types($request)
                ]
            ]);
        }
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->calendar->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
