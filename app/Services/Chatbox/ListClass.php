<?php

namespace App\Services\Chatbox;

use Hashids\Hashids;
use App\Models\UserRole;
use App\Models\ListDropdown;
use App\Models\Configuration;
use App\Models\ChatConversation;

class ListClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::check()) ? (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null : '';
        $this->ids =(\Auth::check()) ? (\Auth::user()->role == 'Administrator') ? [] : json_decode(Configuration::where('laboratory_id',$this->laboratory)->value('laboratories')) : '';
    }

    public function laboratory_types(){
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $query = ListDropdown::query()->where('classification','Laboratory');
        ($lab_id) ? $query->whereIn('id',$lab_id) : '';
        $data = $query->get()->map(function ($item) {
            $hashids = new Hashids('krad',10);
            $id = $hashids->encode($item->id);
            return [
                'id' => $id,
                'name' => $item->name,
                'others' => $item->others,
                'avatar' => null
            ];
        });
        return $data;
    }

    public function personnels(){
        $data = UserRole::with('user.profile','role')->where('laboratory_id',$this->laboratory)->get()->map(function ($item) {
            $hashids = new Hashids('krad',10);
            $id = $hashids->encode($item->user_id);
            $conversation = ChatConversation::where(function($query) use ($item) {
                $query->where('first_id', \Auth::user()->id)
                      ->where('second_id', $item->user_id);
            })->orWhere(function($query) use ($item) {
                $query->where('first_id', $item->user_id)
                      ->where('second_id', \Auth::user()->id);
            })
            ->first();
            return [
                'user_id' => $id,
                'id' => ($conversation) ? $hashids->encode($conversation->id) : null,
                'name' => $item->user->profile->firstname.' '.$item->user->profile->lastname,
                'role' => $item->role->name,
                'avatar' => $item->user->profile->avatar,
                'has_convo' => ($conversation) ? true : false
            ];
        });
        return $data;
    }
}
