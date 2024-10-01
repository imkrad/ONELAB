<?php

namespace App\Exports;

use App\Models\Tsr;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TsrExport implements FromView
{
    protected $month,$year,$lab;

    function __construct($month,$year,$lab) {
        $this->month = $month;
        $this->year = $year;
        $this->lab = $lab;
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
        ->whereMonth('created_at',$this->month)
        ->whereYear('created_at',$this->year)
        ->where('laboratory_type',$this->lab)
        ->get();

        $groupedData = [];
        $prevCode = '';
        $prevCustomer = '';
        $prevAddress = '';

        foreach ($lists as $row) {

            $address = ($row['customer']['address']['address'] != '' || $row['customer']['address']['address'] != NULL) ? $row['customer']['address']['address'].', ' : '';
            if ($row['customer']['address']['municipality']['name'] == 'Zamboanga City' || $row['customer']['address']['municipality']['name'] == 'Isabela City') {
                $a = '';
            } else {
                $a = ', '.$row['customer']['address']['province']['name'];
            }

            $complete_address = $address.$row['customer']['address']['barangay']['name'].', '.$row['customer']['address']['municipality']['name'].$a;

            $code = $row['code'];
            $customer = $row['customer']['customer_name']['name'];
            $address = $complete_address;

            foreach ($row['samples'] as $sample) {
                $sample_code = $sample['code'];
                $sample_name = $sample['name'];

                foreach ($sample['analyses'] as $analysis) {
                    $testName = $analysis['testservice']['testname']['name'];
                    $key = $sample_code . "_" . $sample_name . "_" . $testName;

                    // Show customer, address, total, etc., only if the code is different from previous
                    $codeDisplay = ($code === $prevCode) ? '-' : $code;
                    $customerDisplay = ($code === $prevCode && $customer === $prevCustomer) ? '-' : $customer;
                    $addressDisplay = ($code === $prevCode && $address === $prevAddress) ? '-' : $address;

                    // Show subtotal, discount, total, and gratis only if the code is visible
                    $subtotalDisplay = ($codeDisplay !== '-') ? (!$row['payment']['is_free']) ? $row['payment']['subtotal'] : '-' : '-';
                    $discountDisplay = ($codeDisplay !== '-') ? (!$row['payment']['is_free']) ? $row['payment']['discount'] : '-' : '-';
                    $totalDisplay = ($codeDisplay !== '-') ? (!$row['payment']['is_free']) ? $row['payment']['total'] : '-' : '-';
                    $gratisDisplay = ($codeDisplay !== '-') ? ($row['payment']['is_free']) ? $row['payment']['discount'] : '-' : '-';

                    // Update previous values
                    $prevCode = $code;
                    $prevCustomer = $customer;
                    $prevAddress = $address;

                    if (!isset($groupedData[$key])) {
                        $groupedData[$key] = [
                            "code" => $codeDisplay,
                            "customer" => $customerDisplay,
                            "address" => $addressDisplay,
                            "samplecode" => $sample_code,
                            "samplename" => $sample_name,
                            "testname" => $testName,
                            "subtotal" => $subtotalDisplay,
                            "discount" => $discountDisplay,
                            "total" => $totalDisplay,
                            "gratis" => $gratisDisplay,
                            "date" => ($codeDisplay !== '-') ? $row['payment']['paid_at'] : '-',
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
