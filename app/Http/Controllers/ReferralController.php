<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownService;

class ReferralController extends Controller
{
    public function __construct(DropdownService $dropdown){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            default :
            return inertia('Modules/Referrals/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    'purposes' => $this->dropdown->purposes(),
                    'discounts' => $this->dropdown->discounts()
                ]
            ]);
        }
    }
}
