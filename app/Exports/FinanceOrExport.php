<?php

namespace App\Exports;

use App\Models\Tsr;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FinanceOrExport implements FromView
{
    protected $month,$year;

    function __construct($month,$year) {
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $lists = Tsr::select('id','code','customer_id')
        ->whereDoesntHave('parent')
        ->with('customer:id,name,name_id','customer.customer_name:id,name','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->withWhereHas('payment', function ($query) {
            $query->select('tsr_id','or_number','total','subtotal','discount','status_id')->with('status');
        })
        ->whereMonth('created_at',$this->month)
        ->whereYear('created_at',$this->year)
        ->get();

        return view('exports.financeor', [
            'lists' => $lists
        ]);
    }
}
