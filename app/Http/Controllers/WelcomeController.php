<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Tsr;
use App\Models\User;
use App\Models\Configuration;
use App\Models\ListDropdown;
use App\Models\Laboratory;
use App\Models\TsrSample;
use App\Models\TsrAnalysis;
use App\Models\EulimsProduct;
use Illuminate\Http\Request;
use App\Http\Resources\TsrResource;
use App\Http\Resources\SampleResource;
use App\Services\Laboratory\DropdownClass;
use App\Http\Requests\UserRequest;
use App\Traits\HandlesTransaction;
use App\Http\Requests\InstallRequest;
use App\Http\Resources\VerificationResource;
use App\Http\Resources\ItemsResource;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownClass $dropdown){
        $this->dropdown = $dropdown;
    }

    public function items(){
        $data = EulimsProduct::with('entries.withdrawals.detail','entries.supplier')->where('discontinued',0)->where('producttype_id',1)->get();
        $items = ItemsResource::collection($data);
        return $items;
        foreach($items as $itemm){
            $itemArray = $itemm->toArray(request());
            $item = InventoryItem::create([
                'code' => 'R9-INV-'.str_pad((InventoryItem::count()+1), 5, '0', STR_PAD_LEFT),
                'old_code' => $itemArray['code'],
                'name' => ucwords(strtolower($itemArray['name'])),
                'unit_id' => $itemArray['unit_id'],
                'img' => 'avatar.jpg',
                'laboratory_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            if($item){
                foreach($itemArray['entries']->toArray(request()) as $entry){
                    $entries = $item->stocks()->create([
                        'code' => date('Ymdhis')+InventoryStock::count()+1,
                        'quantity' => $entry['quantity'],
                        'number' => ($entry['number']) ? ($entry['number'] == '') ? null : $entry['number'] : null,
                        'onhand' => $entry['onhand'],
                        'price' => $entry['price'],
                        'unit' => $entry['unit'],
                        'unit_id' => $itemArray['unit_id'],
                        'supplier' => $entry['supplier'],
                        'expired_at' => ($entry['expired_at']) ? $entry['expired_at'] : null,
                        'bought_at' => ($entry['created_at']) ? $entry['created_at'] : null,
                        'user_id' => 1
                    ]);

                    if($entry['onhand'] > 0){
                        $item->is_active = 1;
                        $item->save();
                    }

                    if($entries){
                        if(count($entry['withdrawals']->toArray(request())) > 0){
                            foreach($entry['withdrawals']->toArray(request()) as $withdrawal){
                                $with = $entries->withdrawals()->create([
                                    'quantity' => $withdrawal['quantity'],
                                    'created_at' => $withdrawal['created_at'], 
                                    'user_id' => 1
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }

    public function landing(){
        if(!\Auth::check()){
            return inertia('Auth/Login',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratories(),
                    'types' => $this->dropdown->laboratory_all(),
                    'roles' => $this->dropdown->roles(),
                ]
            ]);
        }else{
            return inertia('Modules/Laboratory/Dashboard/Index',[
                'laboratories' => $this->dropdown->laboratory_types(),
            ]);
        }
    }

    public function index(){
        if(\Auth::check()){
            return inertia('Modules/Laboratory/Dashboard/Index',[
                'laboratories' => $this->dropdown->laboratory_types(),
            ]);
        }else{
            return inertia('Auth/Login');
        }
    }

    public function installation(){
        $laboratory_id = \Auth::user()->userrole->laboratory_id;
        $member = Laboratory::with('member')->where('id',$laboratory_id)->first();
        if(\Auth::user()->is_active){
            return inertia('Auth/Installation',[
                'member' => $member,
                'laboratories'=> $this->dropdown->laboratory_all(),
            ]);
        }
    }

    public function install(InstallRequest $request){
        $data = Configuration::create(array_merge($request->all(),['laboratories' => json_encode($request->laboratories)]));
        if($data){
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    public function activation(){
        if(\Auth::user()->is_active){
            return redirect()->intended(route('dashboard', absolute: false));
        }else{
            return inertia('Auth/Activation');
        }
    }

    public function activate(Request $request){
        $id = \Auth::user()->id;
        $data = User::findOrFail($id);
        $data->is_active = 1;
        if($data->save()){
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    public function verification($code){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $tsr = Tsr::query()->where('id',$id)
        ->with('received:id','received.profile:id,firstname,lastname,user_id')
        ->with('laboratory:id,name','purpose:id,name','status:id,name,color,others')
        ->with('customer:id,name_id,name,is_main','customer.customer_name:id,name,has_branches','customer.address:address,addressable_id,region_code,province_code,municipality_code,barangay_code','customer.address.region:code,name,region','customer.address.province:code,name','customer.address.municipality:code,name','customer.address.barangay:code,name')
        ->with('conforme:id,name,contact_no')
        ->with('payment:tsr_id,id,total,subtotal,discount,or_number,is_paid,paid_at,status_id,discount_id,collection_id,payment_id','payment.status:id,name,color,others','payment.collection:id,name','payment.type:id,name','payment.discounted:id,name,value')
        ->first();

        $samples = TsrSample::query()->where('tsr_id',$id)
            ->with('analyses.status','analyses.testservice.method.method','analyses.testservice.testname','analyses.sample')
            ->orderBy('created_at','ASC')
            ->get();

        $analyses = TsrAnalysis::query()->with('testservice.method.method','testservice.testname','sample')
        ->whereHas('sample',function ($query) use ($id) {
            $query->whereHas('tsr',function ($query) use ($id) {
                $query->where('id',$id);
            });
        })
        ->orderBy('created_at','ASC')
        ->get();

        $groupedData = [];
        foreach ($analyses as $row) {
            $sampleCode = $row['sample']['code'];
            $sampleName = $row['sample']['name'];
            $testName = $row['testservice']['testname']['name'];
            $testMethod = $row['testservice']['method']['method']['name'];
            
            $key = $sampleCode . "_" . $testName . "_" . $testMethod;
            
            if (!isset($groupedData[$key])) {
                $groupedData[$key] = [
                    "samplecode" => $sampleCode,
                    "samplename" => $sampleName,
                    "testname" => $testName,
                    "method" => $testMethod,
                    "count" => 0,
                    "fee" => $row['fee']
                ];
            }
            $groupedData[$key]["count"] += 1;
        }
        $analyses = array_values($groupedData);

        return inertia('Modules/Laboratory/Public/Verification',[
            'tsr' => new VerificationResource($tsr),
            'samples' => SampleResource::collection($samples),
            'analyses' => $analyses
        ]);
    }

    public function register(UserRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            $user = User::create(array_merge($request->all(), ['password' => bcrypt('123456789'),'is_new' => 1, 'role' => 'Staff','avatar' =>'avatar.jpg']));
            $user->profile()->create($request->all());
            $user->userrole()->create($request->all());

            \Auth::login($user);
        });
        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function new(Request $request){
        // $response = Http::get('https://api.ipify.org?format=json');
    
        // if ($response->successful()) {
        //     $ipAddress = $response->json()['ip'];
        //     return $ipAddress;
        // }
    
        // return 'Unable to get public IP';
        // dd($request->ip());
        return inertia('Auth/New');
        // $url = 'https://api.dost9.ph/sms/messages';

        // $recipient = '09171531652';
        // $title = 'Notification';
        // $message = 'This is a test message.';
        
        // $response = Http::post($url, [
        //     'hash' => 's', 
        //     'sender' => 'a', 
        //     'recipient' => $recipient,
        //     'title' => $title,
        //     'message' => $message,
        //     'via' => 'v', 
        //     'module' => 'm', 
        //     'action' => 'a'
        // ]);
    
        // return $response->json();
    }


}
