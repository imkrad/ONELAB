<?php

namespace App\Services\Dashboard;

use App\Models\Tsr;
use App\Models\Wallet;
use App\Models\FinanceOp;
use App\Models\TsrPayment;
use App\Models\FinanceReceipt;
use App\Models\FinanceOrseries;
use App\Models\ListStatus;
use App\Models\ListDropdown;
use App\Http\Resources\Finance\ReceiptResource;
use App\Http\Resources\TsrNoPaymentResource;

class FinanceClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
    }

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
        // ->where('user_id',\Auth::user()->id)
        $data = FinanceOrseries::where('is_active',1)->get()->map(function ($item) {
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

    public function forpayment($request){
        $data = TsrNoPaymentResource::collection(
            Tsr::query()
            ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.wallet')
            ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,is_free,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")
                ->orWhereHas('customer',function ($query) use ($keyword) {
                    $query->whereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                });
            })
            ->when($this->laboratory, function ($query, $lab) {
                $query->where('laboratory_id',$lab);
            })
            ->whereHas('payment',function ($query){
                $query->where('payment_id',NULL)->where('collection_id',NULL);
            })
            ->where('status_id',2)
            ->get()
        );
        return $data;
    }

    public function receipts(){
        $data = ReceiptResource::collection(
            FinanceReceipt::query()
            ->with('op.items.itemable')
            ->with('createdby:id','createdby.profile:id,firstname,lastname,user_id')
            ->with('op.payorable','op.collection','op.payment')
            ->with('detail','transaction')
            ->when($this->laboratory, function ($query, $lab) {
                $query->where('laboratory_id',$lab);
            })
            ->orderBy('updated_at','DESC')
            ->limit(5)->get()
        );
        return $data;
    }
}
