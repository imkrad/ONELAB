<?php

namespace App\Services\Laboratory;

use App\Models\Schedule;
use App\Http\Resources\CalendarResource;

class CalendarClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function lists($request){
        $data = Schedule::with('user','event')->where('laboratory_id',$this->laboratory)->get();
        return CalendarResource::collection($data);
    }

    public function save($request){
        if (strpos($request->date, ' to ') !== false) {
            list($start, $end) = explode(' to ', $request->date);
            $startTime = "08:00:00";
            $endTime = "23:00:00";
            $start = substr($start, 0, 10);
            $end = substr($end, 0, 10);
            $start = $start.' '.$startTime;
            $end = $end.' '.$endTime;
        }else{
            if($request->is_allday){
                $startTime = "08:00:00";
                $endTime = "17:00:00";
                $date = substr($request->date, 0, 10);
                $start = $date.' '.$startTime;
                $end = $date.' '.$endTime;
            }else{
                $start = $request->start;
                $end = $request->end;
            }
        }
        
        $data = Schedule::create([
            'title' => $request->title,
            'description' => $request->description,
            'venue' => $request->venue,
            'start' => $start,
            'end' => $end,
            'is_allday' => $request->is_allday,
            'event_id' => $request->event_id,
            'user_id' => \Auth::user()->id,
            'laboratory_id' => $this->laboratory
        ]);

        return [
            'data' => $data,
            'message' => 'Schedule creation was successful!', 
            'info' => "You've successfully created the new event."
        ];
    }
}
