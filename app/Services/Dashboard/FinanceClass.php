<?php

namespace App\Services\Dashboard;

use App\Models\Wallet;
use App\Models\FinanceOp;
use App\Models\TsrPayment;
use App\Models\FinanceOrseries;
use App\Models\ListStatus;
use App\Models\ListDropdown;

class FinanceClass
{
    public function accountant($request){
        return [
            $this->waiting($request),
            $this->pending($request),
            $this->total($request),
        ];
    }

    private function waiting($request){
        return $arr = [
            'name' => 'Order of Payment not Issued',
            'icon' => 'ri-bill-fill',
            'color' => 'danger',
            'total' => TsrPayment::where('payment_id',null)->where('collection_id',null)->count()
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

    public function orseries(){
        $data = FinanceOrseries::where('is_active',1)->where('user_id',\Auth::user()->id)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'start' => $item->start,
                'next' => $item->next,
                'end' => $item->end
            ];
        });
        return $data;
    }
    //Dropdown 
    public function collections($type){
        $data = ListDropdown::where('classification','Collection Type')->where('type',$type)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function payments(){
        $data = ListDropdown::where('classification','Payment Mode')->where('type','n/a')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'others' => $item->others
            ];
        });
        return $data;
    }

    public function deposits(){
        $data = ListDropdown::where('classification','Deposit Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }
}
