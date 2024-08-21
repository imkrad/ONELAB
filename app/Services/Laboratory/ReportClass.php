<?php

namespace App\Services\Laboratory;

use App\Models\Target;
use App\Models\Configuration;
use App\Models\ListLaboratory;
use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\TsrPayment;

class ReportClass
{
    public function __construct()
    {
        $this->laboratory = (\Auth::check()) ? (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null : '';
        $this->ids =(\Auth::check()) ? (\Auth::user()->role == 'Administrator') ? [] : json_decode(Configuration::where('laboratory_id',$this->laboratory)->value('laboratories')) : '';
    }

    public function years(){
        $data = Target::where('laboratory_id',$this->laboratory)->distinct()->pluck('year')->toArray();
        return $data;
    }

    public function laboratories($request){
        $month = ($request->month) ? \DateTime::createFromFormat('F', $request->month)->format('m') : date('m');  
        $year = ($request->year) ? $request->year : date('Y');
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $laboratories = ListLaboratory::whereIn('id', $lab_id)->get();
        
        $lists = []; $requests_total = 0; $samples_total = 0; $analyses_total = 0; $fees_total = 0; $gratis_total = 0; $discount_total = 0; $gross_total = 0;
        
        foreach($laboratories as $laboratory){
            $req = Tsr::whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->count();
            $total1 = TsrPayment::where('status_id',18)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
                $query->whereMonth('created_at',$month)->whereYear('created_at',$year)
                ->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('total');

            $sample  = TsrSample::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->count();

            $analysis = TsrAnalysis::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('sample', function ($query) use ($laboratory){
                $query->whereHas('tsr', function ($query) use ($laboratory){
                    $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
                });
            })->count();

            $total = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('total');

            $gratis = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',1)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $discount = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',0)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $lists[] = [
                $laboratory->name,
                $req,
                $sample,
                $analysis,
                '₱'.number_format($total + $total1),
                '₱'.number_format($gratis),
                '₱'.number_format($discount),
                '₱'.number_format(($total1 + $total) + $gratis + $discount)
            ];

            $requests_total += $req;
            $samples_total += $sample;
            $analyses_total += $analysis;
            $fees_total += ($total + $total1);
            $gratis_total += $gratis;
            $discount_total += $discount;
            $gross_total += (($total1 + $total) + $gratis + $discount);
        }
        $footer[] = [
            'Total',$requests_total, $samples_total, $analyses_total, '₱'.number_format($fees_total), '₱'.number_format($gratis_total), '₱'.number_format($discount_total), '₱'.number_format($gross_total)
        ];
        return [
            'lists' => $lists,
            'footer' => $footer
        ];
    }

    public function year($request){
        $year = ($request->year) ? $request->year : date('Y');
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        
        $lists = []; $requests_total = 0; $samples_total = 0; $analyses_total = 0; $fees_total = 0; $gratis_total = 0; $discount_total = 0; $gross_total = 0;
        
       
            $req = Tsr::whereMonth('created_at',$month)->whereYear('created_at',$year)->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory)->count();
            $total1 = TsrPayment::where('status_id',18)->whereHas('tsr', function ($query) use ($laboratory,$month,$year){
                $query->whereMonth('created_at',$month)->whereYear('created_at',$year)
                ->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('total');

            $sample  = TsrSample::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->count();

            $analysis = TsrAnalysis::whereMonth('created_at',$month)->whereYear('created_at',$year)->whereHas('sample', function ($query) use ($laboratory){
                $query->whereHas('tsr', function ($query) use ($laboratory){
                    $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
                });
            })->count();

            $total = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            }) ->sum('total');

            $gratis = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',1)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $discount = TsrPayment::whereMonth('paid_at',$month)->whereYear('paid_at',$year)->where('is_free',0)
            ->whereHas('tsr', function ($query) use ($laboratory){
                $query->where('laboratory_type',$laboratory->id)->where('laboratory_id',$this->laboratory);
            })->sum('discount');

            $lists[] = [
                $laboratory->name,
                $req,
                $sample,
                $analysis,
                '₱'.number_format($total + $total1),
                '₱'.number_format($gratis),
                '₱'.number_format($discount),
                '₱'.number_format(($total1 + $total) + $gratis + $discount)
            ];

            $requests_total += $req;
            $samples_total += $sample;
            $analyses_total += $analysis;
            $fees_total += ($total + $total1);
            $gratis_total += $gratis;
            $discount_total += $discount;
            $gross_total += (($total1 + $total) + $gratis + $discount);
        
       
        return [
            'lists' => $lists,
            'footer' => $footer
        ];
    }
}
