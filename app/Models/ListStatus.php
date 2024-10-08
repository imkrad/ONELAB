<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListStatus extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->hasMany('App\Models\TsrPayment', 'status_id');
    } 

    public function tsrs()
    {
        return $this->hasMany('App\Models\Tsr', 'status_id');
    } 
}
