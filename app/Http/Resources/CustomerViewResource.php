<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerViewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->contact->email,
            'contact_no' => $this->contact->contact_no,
            'name' => ($this->customer_name->has_branches) ? ($this->is_main) ? $this->customer_name->name :  $this->customer_name->name.' - '.$this->name : $this->customer_name->name,
            'wallet' => $this->wallet,
        ];
    }
}
