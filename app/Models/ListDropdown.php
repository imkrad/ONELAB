<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDropdown extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasMany('App\Models\TsrPayment', 'payment_id');
    } 

    public function customer_industry()
    {
        return $this->hasMany('App\Models\Customer', 'industry_id');
    } 

    public function tsrs()
    {
        return $this->hasMany('App\Models\Tsr', 'laboratory_type');
    }

    public function messages()
    {
        return $this->morphMany('App\Models\ChatMessage', 'receivable');
    }

    public function services()
    {
        return $this->morphMany('App\Models\ListService', 'typeable');
    }

    public function inventory_category()
    {
        return $this->hasMany('App\Models\InventoryItem', 'category_id');
    } 
}
