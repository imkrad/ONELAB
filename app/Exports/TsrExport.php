<?php

namespace App\Exports;

use App\Models\Tsr;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TsrExport implements FromView
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
        ->with('samples:tsr_id,id,code,name','samples.analyses:id,sample_id,testservice_id','samples.analyses.testservice:id,testname_id','samples.analyses.testservice.testname:id,name')
        ->withWhereHas('payment', function ($query) {
            $query->select('tsr_id','or_number','total','subtotal','discount','paid_at','is_free');
        })
        ->whereIn('status_id',[3,4])
        ->whereMonth('created_at',$this->month)
        ->whereYear('created_at',$this->year)
        ->get();

        $groupedData = [];
        foreach ($lists as $row) {

            $address = ($row['customer']['address']['address'] != '' ||$row['customer']['address']['address'] != NULL) ? $row['customer']['address']['address'].', ' : '';
            if($row['customer']['address']['municipality']['name'] == 'Zamboanga City' || $row['customer']['address']['municipality']['name'] == 'Isabela City'){
                $a = '';
            }else if($row['customer']['address']['province']['name'] == 'Sulu'){
                $a = ', '.$row['customer']['address']['province']['name'];
            }else{
                $a = ', '.$row['customer']['address']['province']['name'];
            }
            $barangay = $row['customer']['address']['barangay']['name'];
            $municipality = $row['customer']['address']['municipality']['name'];
            $province = $row['customer']['address']['province']['name'];
    
            $complete_address = $address.$row['customer']['address']['barangay']['name'].', '.$row['customer']['address']['municipality']['name'].$a;


            $code = $row['code'];
            $customer = $row['customer']['customer_name']['name'];
            $address = $complete_address;

            foreach($row['samples'] as $index2=>$sample){
                $sample_code = $sample['code'];
                $sample_name = $sample['name'];

                foreach($sample['analyses'] as $index=>$analysis){
                    $testName = $analysis['testservice']['testname']['name'];
                    $key = $sample_code . "_" . $sample_name . "_" . $testName;
                    
                    if (!isset($groupedData[$key])) {
        
                        $groupedData[$key] = [
                            "code" => ($index == 0) ? $code : '-',
                            "customer" => ($index == 0) ? $customer : '-',
                            "address" => ($index == 0) ? $address : '-',
                            "samplecode" => ($index == 0) ? $sample_code : '-',
                            "samplename" => ($index == 0) ? $sample_name : '-',
                            "testname" => $testName,
                            "subtotal" => ($index == 0) ? (!$row['payment']['is_free']) ? $row['payment']['subtotal'] : '-' : '-',
                            "discount" =>  ($index == 0) ? (!$row['payment']['is_free']) ? $row['payment']['discount'] : '-' : '-',
                            "total" =>  ($index == 0) ? (!$row['payment']['is_free']) ? $row['payment']['total'] : '-' : '-',
                            "gratis" => ($index == 0) ? ($row['payment']['is_free']) ? $row['payment']['discount'] : '-' : '-',
                            "date" => ($index == 0) ? $row['payment']['paid_at'] : '-',
                        ];
                    }
                }
            }
        }
        $tsrs = array_values($groupedData);
        
        return view('exports.tsr', [
            'lists' => $tsrs
        ]);
    }

}
