<?php

namespace App\Http\Resources\Laboratory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SampleRegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'sample' => $this->name,
            'is_disposed' => $this->is_disposed,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'created_at' => $this->created_at,
            'analyst' => ($this->analyst) ? $this->analyst->profile->firstname.' '.$this->analyst->profile->lastname : '-',
        ];
    }
}
