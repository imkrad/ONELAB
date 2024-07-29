<?php

namespace App\Services\Laboratory\Testservice;

use App\Models\TestserviceName;
use App\Models\Testservice;
use App\Models\TestserviceMethod;

class SaveClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

    public function create($request){
        $service = Testservice::create(array_merge($request->all(),['laboratory_id' => $this->laboratory]));
        return [
            'data' => $service,
            'message' => 'Testservice creation was successful!', 
            'info' => "You've successfully created the new testservice."
        ];
    }

    public function add($request){
        $name = TestserviceName::create($request->all());
        $data = TestserviceName::findOrFail($name->id);
        $data = [
            'value' => $data->id,
            'name' => $data->name,
        ];
        return $data;
    }

    public function method($request){
        $method = TestserviceMethod::create($request->all());
        $data = TestserviceMethod::with('method')->where('id',$method->id)->first();
        return $data;
    }

    public function fee($request){
        $data = Testservice::findOrFail($request->id);
        $data->fee()->create(array_merge($request->all(),['laboratory_id' => $this->laboratory]));
        return [
            'data' => $data,
            'message' => 'Additional fee added was successful!', 
            'info' => "You've successfully added additional fee."
        ];
    }
}
