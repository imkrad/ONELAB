<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsrChild extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\Laboratory', 'laboratory_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo('App\Models\Laboratory', 'laboratory_id', 'id');
    }
}
