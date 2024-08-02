<?php

namespace App\Services\Finance;

use App\Models\Wallet;
use App\Models\TsrPayment;

class DashboardClass
{
    public function counts($request){
        return [
            $this->total($request),
            $this->pending($request),
            $this->wallet($request)
        ];
    }

    private function total($request){
        return $arr = [
            'name' => 'Total Collection',
            'icon' => 'ri-hand-coin-fill',
            'color' => 'danger',
            'total' => TsrPayment::where('status_id', 7)->where('is_paid',1)->sum('total')
        ];
    }

    private function pending($request){
        return $arr = [
            'name' => 'Pending Collection',
            'icon' => 'ri-safe-2-fill',
            'color' => 'danger',
            'total' => TsrPayment::where('is_paid', 0)->sum('total')
        ];
    }

    private function wallet($request){
        return $arr = [
            'name' => 'Wallet Balance',
            'icon' => 'ri-wallet-3-fill',
            'color' => 'danger',
            'total' => Wallet::sum('available')
        ];
    }
}
