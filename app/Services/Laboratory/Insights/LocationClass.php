<?php

namespace App\Services\Laboratory\Insights;

class LocationClass
{
    public function __construct()
    {   
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }
}
