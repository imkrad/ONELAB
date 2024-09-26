<?php

namespace App\Http\Resources\Laboratory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DisposalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'code' => $this->code,
            'sample' => $this->name,
            'is_disposed' => $this->is_disposed,
            'disposed_at' => $this->disposal->disposed_at,
            'disposal' => $this->disposal->disposal,
            'created_at' => $this->tsr->created_at,
            'due_at' => $this->tsr->due_at,
            'user' => $this->disposal->user->profile->firstname.' '.$this->disposal->user->profile->lastname
        ];
    }
}
