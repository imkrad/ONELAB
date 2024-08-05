<?php

namespace App\Services\Laboratory;

class TargetClass
{
    public function counts(){
        return [
            ['name' => 'KPIs with below 50%','color' => 'bg-danger-subtle'],
            ['name' => 'KPIs with 50% to 99&','color' => 'bg-warning-subtle'],
            ['name' => 'KPIs with 100% and above','color' => 'bg-success-subtle']
        ];
    }
}
