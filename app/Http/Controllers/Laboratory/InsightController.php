<?php

namespace App\Http\Controllers\Laboratory;

use App\Models\Tsr;
use App\Models\TsrAnalysis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DefaultResource;
use App\Services\Laboratory\Insights\MainClass;
use App\Services\Laboratory\Insights\LocationClass;
use App\Services\Laboratory\Insights\CustomerClass;
use App\Services\Laboratory\Insights\LaboratoryClass;

class InsightController extends Controller
{
    public function __construct(CustomerClass $customer, LaboratoryClass $laboratory, LocationClass $location, MainClass $main){
        $this->customer = $customer;
        $this->laboratory = $laboratory;
        $this->main = $main;
    }

    public function customers_view(Request $request){
        switch($request->option){
            case 'industry':
                return $this->customer->industry($request);
            break;
            case 'spender':
                return $this->customer->spender($request);
            break;
            case 'tsr':
                return $this->customer->tsr($request);
            break;
            case 'info':
                return $this->customer->info($request);
            break;
            case 'wallet':
                return $this->customer->wallet($request);
            break;
            default:
            return inertia('Modules/Laboratory/Insights/Customer/Index',[
                'customer' => [
                    'total' => $this->customer->total(),
                    'total_request' => $this->customer->total_request(),
                    'wallet' => $this->customer->total_wallet(),
                    'industry' => $this->customer->industry($request),
                    'spender' => $this->customer->spender($request),
                    'tsr' => $this->customer->tsr($request),
                    'location' => $this->customer->location($request)
                ]
            ]);
        }
    }

    public function laboratories_view(Request $request){
        switch($request->option){
            case 'info':
                return $this->laboratory->info($request);
            break;
            case 'tsr':
                return $this->laboratory->tsrs($request);
            break;
            case 'earnings':
                return $this->laboratory->earnings($request);
            break;
            case 'samples':
                return $this->laboratory->samples($request);
            break;
            default:
                return inertia('Modules/Laboratory/Insights/Laboratory/Index',[
                    'laboratory' => [
                        'total_request' => $this->laboratory->total_request(),
                        'total_earnings' => $this->laboratory->total_earnings(),
                        'tsrs' => $this->laboratory->tsrs($request),
                        'earnings' => $this->laboratory->earnings($request),
                        'samples' => $this->laboratory->samples($request)
                    ]
                ]);
        }
    }

    public function locations_view(Request $request){
        switch($request->option){
            case 'info':
                return $this->laboratory->info($request);
            break;
            default:
            return inertia('Modules/Laboratory/Insights/Location/Index');
        }
    }

    public function index(Request $request){
        $option = $request->option;
        switch($option){
            case 'lists':
                return [
                    'counts' => $this->main->counts($request),
                    'customers' => $this->main->topcustomers($request),
                    'testnames' => $this->main->toptestnames($request),
                    'totalanalysis' => TsrAnalysis::count(),
                    'total' => Tsr::where('status_id',3)->count()
                ];
            break;
            case 'recap':
                return $this->main->recap($request);
            break;
            case 'target':
                return $this->main->target($request);
            break;
            case 'payment':
                return $this->main->payment($request);
            break;
        }   
    }

   
}
