<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceiptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'customer' => ($this->op->payorable->customer_name) ? $this->op->payorable->customer_name->name : $this->op->payorable->name,
            'collection' => $this->op->collection->name,
            'total' => $this->op->total,
            'payment' => $this->op->payment->name,
            'user' => $this->createdby->profile->firstname.' '.$this->createdby->profile->lastname,
            'date' => $this->created_at
        ];
    }
}
