<?php

namespace App\Services\Executive;

use App\Models\User;
use App\Models\ListRole;
use App\Http\Resources\UserResource;
use App\Http\Resources\DefaultResource;

class SaveClass
{   
    public function user($request){
        $data = User::create(array_merge($request->all(), ['password' => bcrypt('123456789'), 'role' => 'Staff','avatar' =>'avatar.jpg']));
        $data->profile()->create($request->all());
        $data->userrole()->create($request->all());
           
        return [
            'data' => new UserResource($data),
            'message' => 'User creation was successful!', 
            'info' => "You've successfully created an account for the user."
        ];
    }

    public function role($request){
        $data = ListRole::create($request->all());
           
        return [
            'data' => new DefaultResource($data),
            'message' => 'Role creation was successful!', 
            'info' => "You've successfully created a role."
        ];
    }
}
