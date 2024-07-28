<?php

namespace App\Http\Resources\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
            'old_code' => $this->old_code,
            'reorder' => $this->reorder,
            'unit' => $this->unittype->name,
            'is_active' => $this->is_active,
            'onhand' => ($this->onhand ) ? $this->onhand : 0,
            'stock' => ($this->stock ) ? $this->stock : 0,
            'category' => ($this->category) ? $this->category->name : 'Not Specified',
            'stocks' => StockResource::collection($this->stocks)
        ];
    }
}
