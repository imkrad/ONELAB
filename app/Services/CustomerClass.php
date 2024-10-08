<?php

namespace App\Services;

use Hashids\Hashids;
use App\Models\Wallet;
use App\Models\Tsr;
use App\Models\TsrPayment;
use App\Models\Customer;
use App\Models\CustomerName;
use App\Models\CustomerConforme;
use App\Models\Laboratory;
use App\Models\Configuration;
use App\Http\Resources\Laboratory\CustomerResource;

class CustomerClass
{
    public $laboratory, $configuration;

    public function __construct()
    {
        $this->laboratory = (\Auth::user()->userrole) ? \Auth::user()->userrole->laboratory_id : null;
        $this->configuration = Configuration::with('laboratory.address')->where('laboratory_id',$this->laboratory)->first();
    }

    public function lists($request){
        $data = CustomerResource::collection(
            Customer::query()
            ->with('customer_name:id,name','classification:id,name','industry:id,name')
            ->with('address.region:code,name,region','address.province:code,name','address.municipality:code,name','address.barangay:code,name')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhereHas('customer_name',function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->where('laboratory_id',$this->laboratory)
            ->orderBy('created_at','desc')
            ->paginate($request->count)
        );
        return $data;
    }

    public function view($id){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($id);

        $data = new CustomerResource(
            Customer::query()
            ->with('wallet.transactions.receipt')
            ->with('customer_name:id,name','classification:id,name','industry:id,name')
            ->with('address.region:code,name,region','address.province:code,name','address.municipality:code,name','address.barangay:code,name')
            ->where('id',$id)->first()
        );
        return $data;
    }

    public function counts($request){
        $id = $request->id;
        $wallet = Wallet::where('customer_id',$id)->value('available');
        $tsrs = Tsr::whereIn('status_id',[2,3,4])->where('customer_id',$request->id)->count();
        $total = TsrPayment::where('is_paid',1)->where('status_id',7)
        ->whereHas('tsr',function ($query) use ($id){
            $query->where('customer_id',$id);
        })->sum('total');
        $array = [
            ['counts' => $tsrs, 'name' => 'Total Request', 'icon' => 'ri-list-check-2', 'color' => 'success'],
            ['counts' => '₱'.number_format($total,2,'.',','),'name' => 'Total Spending', 'icon' => 'ri-hand-coin-fill', 'color' => 'info'],
            ['counts' => ($wallet) ? $wallet : '₱0.00','name' => 'My Wallet', 'icon' => 'ri-wallet-3-fill', 'color' => 'primary'],
        ];
        return $array;
    }

    public function save($request){
        if($request->customer['value'] === $request->customer['name']){
            $name = new CustomerName;
            $name->name = $request->customer['value'];
            $name->has_branches = $request->has_branches;
            if($name->save()){
                $request['name_id'] = $name->id;
            }
        }else{
            $request['name_id'] = $request->customer['value'];
        }
        $code = $this->generateCode();
        $customer = Customer::create(array_merge($request->all(),['code' => $code,'laboratory_id' => $this->laboratory,'user_id' => \Auth::user()->id]));
        $customer->address()->create($request->except(['name','is_main','email','industry_id','classification_id','contact_no','name_id','customer','has_branches','type']));
        $customer->contact()->create($request->all());

        return [
            'data' => $customer,
            'message' => 'Customer creation was successful!', 
            'info' => "You've successfully created the new customer."
        ];
    }

    public function conforme($request){
        $data = CustomerConforme::create($request->all());
        $customer = CustomerConforme::findOrFail($data->id);
        $conforme = [
            'value' => $customer->id,
            'name' => $customer->name,
            'contact_no' => $customer->contact_no
        ];
        return [
            'data' => $conforme,
            'message' => 'Conforme creation was successful!', 
            'info' => "You've successfully created the new conforme."
        ];
    }

    public function update($request){
        $data = Customer::findOrFail($request->id);
        $data->updateIfDirty($request->only('industry_id','classification_id'));
        $data->contact->updateIfDirty($request->only('email','contact_no'));
        $data->address->updateIfDirty($request->only('province_code','municipality_code','barangay_code','address'));
        return [
            'data' => $data,
            'message' => 'Customer was updated!', 
            'info' => "You've successfully created the new customer."
        ];
    }

    public function search($request){
        $keyword = $request->keyword;
        $data = CustomerName::where('name', 'LIKE', "%{$keyword}%")->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'has_branches' => $item->has_branches
            ];
        });
        return $data;
    }

    public function pick($request){
        $keyword = $request->keyword;
        $id = $request->id;
        $data = Customer::with('conformes')->with('customer_name')
        ->where(function($query) use ($keyword,$id) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->where('id','!=',$id)
                ->orWhereHas('customer_name', function ($query) use ($keyword,$id) {
                    $query->where('name', 'LIKE', "%$keyword%")->whereHas('customer', function ($query) use ($id) {
                        $query->where('id','!=',$id);
                    });
                });
        })
        ->get()->map(function ($item) {
            $name = ($item->customer_name->has_branches) ? ($item->is_main) ? $item->customer_name->name :  $item->customer_name->name.' - '.$item->name : $item->customer_name->name;
            return [
                'value' => $item->id,
                'name' => $name,
                'conformes' => $item->conformes->map(function ($i) {
                    return [
                        'value' => $i->id,
                        'name' => $i->name,
                        'contact_no' => $i->contact_no
                    ];
                })
            ];
        });
        if($keyword){
            return $data;
        }else{
            return [];
        }
    }

    public function region(){
        return $this->configuration->laboratory->address->region_code;
    }

    private function generateCode(){
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $c = Customer::where('laboratory_id',$this->laboratory)->count();
        $code = $lab->code.'-'.'CSTMR-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
