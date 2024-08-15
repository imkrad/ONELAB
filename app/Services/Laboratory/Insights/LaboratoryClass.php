<?php

namespace App\Services\Laboratory\Insights;

use App\Models\Tsr;
use App\Models\User;
use App\Models\TsrSample;
use App\Models\TsrPayment;
use App\Models\ListDropdown;
use App\Models\ListLaboratory;
use App\Models\Configuration;
use App\Http\Resources\DefaultResource;

class LaboratoryClass
{
    public function __construct()
    {   
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->ids =(\Auth::check()) ? (\Auth::user()->role == 'Administrator') ? [] : json_decode(Configuration::where('laboratory_id',$this->laboratory)->value('laboratories')) : '';
    }

    public function total_request(){
        return Tsr::where('laboratory_id',$this->laboratory)->whereIn('status_id',[3,4])->count();
    }

    public function total_earnings(){
        return TsrPayment::whereHas('tsr', function ($query) {
            $query->where('laboratory_id',$this->laboratory);
        })->where('status_id',7)->where('is_paid',1)->sum('total');
    }

    public function info($request){
        $year = $request->year;
        $total = [
            ['name' => 'Active Laboratories', 'value' => count($this->ids)],
            ['name' => 'No. of Personnels', 'value' => User::whereHas('userrole', function ($query) {
                $query->where('laboratory_id',$this->laboratory);
            })->count()],
            ['name' => 'Pending Collection', 'value' => 0],
        ];

        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $laboratories = ListDropdown::whereIn('id',$lab_id)->get();
        foreach($laboratories as $list){
            $data = [];
            for($month = 1; $month <= 12; $month++){
                $count = Tsr::where('laboratory_type',$list['id'])->where('laboratory_id',$this->laboratory)->whereYear('created_at',$year)->whereMonth('created_at',$month)->count();
                $data[] = $count;
            }
            $arr[] = [
                'name' => $list['name'],
                'data' => $data  
            ];
        }

        return $y =[
            'categories' => $months,
            'lists' => $arr,
            'total' => $total
        ];
    }

    public function tsrs($request){
        // $ids = Configuration::where('laboratory_id',$this->laboratory)->value('laboratories');
        // dd($ids);
        // dd($this->ids);
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $sort = ($request->sort) ? $request->sort : 'desc';
        $year = $request->year;
        $month = $request->month;
  
        $query = ListLaboratory::query()->select('id','name');
        $query->whereIn('id',$lab_id);
        $query->withCount(['tsrs' => function ($query) use ($year,$month){
            $query->whereIn('status_id', [3,4])->where('laboratory_id', $this->laboratory);
            ($year) ? $query->whereYear('created_at',$year) : '';
            ($month) ? $query->whereMonth('created_at',$month) : '';
        }])
        ->orderBy('tsrs_count', $sort);
        $data = $query->get();
        return DefaultResource::collection($data);
    }

    public function earnings($request){
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $sort = ($request->sort) ? $request->sort : 'desc';
        $year = $request->year;
        $month = $request->month;

        $query = ListLaboratory::query()->whereIn('list_laboratories.id',$lab_id);
        $query->select('list_laboratories.id','list_laboratories.name',\DB::raw('SUM(tsr_payments.total) as total'))
        ->join('tsrs', 'list_laboratories.id', '=', 'tsrs.laboratory_type')
        ->join('tsr_payments', 'tsrs.id', '=', 'tsr_payments.tsr_id')
        ->whereIn('tsrs.status_id',[3,4])
        ->where('tsrs.laboratory_id',$this->laboratory)
        ->groupBy('list_laboratories.id', 'list_laboratories.name')
        ->orderBy('total',$sort);
        ($year) ? $query->whereYear('tsr_payments.paid_at', $year) : '';
        ($month) ? $query->whereMonth('tsr_payments.paid_at', $month) : '';
        $data = $query->get();
        return DefaultResource::collection($data);
    }

    public function samples($request){
        $lab_id = ($this->ids) ? array_column($this->ids, 'value') : null;
        $sort = ($request->sort) ? $request->sort : 'desc';
        $year = $request->year;
        $month = $request->month;

        foreach($lab_id as $id){
            $lab = ListLaboratory::where('id',$id)->first();
            $count = TsrSample::whereHas('tsr',function ($query) use ($year,$month,$id) {
                $query->where('laboratory_id',$this->laboratory)->where('laboratory_type',$id)->whereIn('status_id',[3,4]);
            })->count();
            $data[] = [
                'name' => $lab['name'],
                'count' => $count
            ];
        }
        usort($data, function($a, $b) {
            return $b['count'] <=> $a['count'];
        });
        
        return $data;
    }
}
