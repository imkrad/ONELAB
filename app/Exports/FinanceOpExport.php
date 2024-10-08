<?php

namespace App\Exports;

use App\Models\FinanceOp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FinanceOpExport implements FromView
{
    protected $month,$year;

    function __construct($month,$year) {
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $lists = FinanceOp::select('id','total','code','payorable_id','payorable_type','created_at','created_by')
        ->with('createdby:id','createdby.profile:user_id,firstname,lastname,middlename')
        ->with('payorable:id,name,name_id','payorable.customer_name:id,name')
        ->with(['items' => function ($query) {
            $query->with('itemable:id,code')->where('itemable_type', 'App\Models\Tsr');
        }, 'or:op_id,number'])
        ->where('payorable_type', 'App\Models\Customer')
        ->where('status_id',7)
        ->whereMonth('created_at',$this->month)
        ->whereYear('created_at',$this->year)
        ->get();

        return view('exports.financeop', [
            'lists' => $lists
        ]);
    }
}
