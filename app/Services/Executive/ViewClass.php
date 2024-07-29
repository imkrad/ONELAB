<?php

namespace App\Services\Executive;

use App\Models\User;
use App\Models\ListRole;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\DefaultResource;

class ViewClass
{
    public function users($request){
        $data = UserResource::collection(
            User::query()
            ->with('profile','userrole.type','userrole.laboratory')
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('profile',function ($query) use ($keyword) {
                    $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', "%{$keyword}%")
                    ->orWhere(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', "%{$keyword}%");
                })->orWhere(function ($query) use ($keyword) {
                    $query->where('username', 'LIKE', "%{$keyword}%")->whereNotIn('role',['Scholar','Administrator']);
                });
            })
            ->when($request->laboratory, function ($query, $laboratory) {
                $query->whereHas('userrole',function ($query) use ($laboratory) {
                    $query->where('laboratory_id',$laboratory);
                });
            })
            ->when($request->type, function ($query, $type) {
                $query->whereHas('userrole',function ($query) use ($type) {
                    $query->where('laboratory_type',$type);
                });
            })
            ->where('role','Staff')
            ->paginate($request->count)
        );
        return $data;
    }

    public function roles($request){
        $data = ListRole::paginate($request->count);
        return DefaultResource::collection($data);
    }
}
