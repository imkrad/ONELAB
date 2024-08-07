<?php

namespace App\Services\Finance;

use App\Models\Tsr;
use App\Models\TsrPayment;
use App\Models\TsrPaymentDeduction;
use App\Models\Wallet;
use App\Models\ListDropdown;
use App\Models\FinanceOp;
use App\Models\FinanceItem;
use App\Models\FinanceName;
use App\Models\FinanceDeposit;
use App\Models\FinanceOpitem;
use App\Models\FinanceReceipt;
use App\Models\FinanceOrseries;
use App\Models\FinanceReceiptDetail;
use App\Http\Resources\DefaultResource;

class SaveClass
{
    public function op($request){
        $payment_id = $request->payment_id;
        $collection_id = $request->collection_id;
        $data = FinanceOp::create(array_merge($request->all(), [
            'code' => $this->generateCode(), 
            'created_by' => \Auth::user()->id, 
            'status_id' => 6,
            'laboratory_id' => \Auth::user()->userrole->laboratory_id
        ]));
        $id = $data->id;
        if($data){
            $items = $request->selected;
            foreach($items as $item){
                $tsr = Tsr::findOrFail($item['id']);
                $opitem = $tsr->itemable()->create([
                    'amount' => $item['payment']['total'],
                    'op_id' => $id
                ]);
                if($opitem){
                    $payment = TsrPayment::findOrFail($item['id']);
                    $payment->collection_id = $collection_id;
                    $payment->payment_id = $payment_id;
                    $payment->save();
                }
            }
        }
        $op = FinanceOp::findOrFail($data->id);

        return [
            'data' => $op,
            'message' => 'Op creation was successful!', 
            'info' => "You've successfully created the new op."
        ];
    }

    public function wallet($request){
        $id = $request->id;
        $tsr_id = $request->tsr_id;
        $wallet_id = $request->wallet_id;
        $total = trim(str_replace(',','',$request->total),'₱');
        $wallet = Wallet::where('id',$wallet_id)->first();
        if($wallet){
            $available = trim(str_replace(',','',$wallet->available),'₱');
            $avail = ($available >= $total) ? $available - $total : 0;
            $wallet->available = $avail;
            if($wallet->save()){
                $code = date('Ymdgis');
                $data = Tsr::where('id',$tsr_id)->first();
                $data->transaction()->create([
                    'code' => $code,
                    'amount' => $total,
                    'balance' => trim(str_replace(',','',$wallet->available),'₱'),
                    'is_credit' => 0,
                    'wallet_id' => $wallet->id
                ]);

                if($data){
                    if($available > $total){
                        $payment = TsrPayment::where('id',$id)->update([
                            'is_paid' => 1,
                            'payment_id' => 21, //wallet payment mode
                            'status_id' => 7,
                            'collection_id' => 25, //analysis/calibration collection fee
                            'or_number' => $code,
                            'paid_at' => now()
                        ]);

                        if($payment){
                            $tsr = Tsr::where('id',$tsr_id)->first();
                            $tsr->status_id = 3;
                            $tsr->save();
                        }
                    }else{
                        $deduction = TsrPaymentDeduction::create([
                            'code' => $code,
                            'amount' => $available,
                            'payment_id' => $id,
                            'wallet_id' => $wallet_id,
                            'user_id' => \Auth::user()->id
                        ]);
                        if($deduction){
                            $p = TsrPayment::where('id',$id)->first();
                            $p->has_deduction = 1;
                            $p->total = trim(str_replace(',','',$p->total),'₱') - $available;
                            $p->save();
                        }
                    }
                }
            }
        }
        return [
            'data' => $data,
            'message' => 'Wallet transaction was successful!', 
            'info' => "You've successfully used the wallet."
        ];
    }

    public function receipt($request){
        $result = \DB::transaction(function () use ($request){
            \DB::beginTransaction();
            $data = FinanceReceipt::create(array_merge($request->all(), [
                'number' => $request->orseries['next'],
                'orseries_id' => $request->orseries['value'],  
                'op_id' => $request->selected['id'],
                'payor_id' => $request->selected['customer_id'],
                'created_by' => \Auth::user()->id,
                'laboratory_id' => \Auth::user()->userrole->laboratory_id
            ]));
            if($data){
                $items = $request->selected['items'];
                $op = FinanceOp::where('id',$request->selected['id'])->first();
                $op->status_id = 7;
                if($op->save()){
                    foreach($items as $item){
                        $id = $item['itemable_id'];
                        $payment = TsrPayment::where('tsr_id',$id)->first();
                        $payment->or_number = $request->orseries['next'];
                        $payment->is_paid = 1;
                        $payment->paid_at = now();
                        $payment->status_id = 7;
                        if($payment->save()){
                            $tsr = Tsr::where('id',$id)->first();
                            $tsr->status_id = 3;
                            $tsr->save();
                        }
                    }

                    $or = FinanceOrseries::where('id',$request->orseries['value'])->first();
                    if($or->next == $or->end){
                        $or->is_active = 0;
                    }else{
                        $next = $or->next+1;
                        $or->next = $next;
                    }

                    if($or->save()){
                        if($request->type === 'Cheque' || $request->type === 'Online Transfer' || $request->type === 'Bank Deposit'){
                            $cheque = new FinanceReceiptDetail;
                            $cheque->number = $request->details_number;
                            $cheque->amount = $request->details_amount;
                            $cheque->bank = $request->details_bank;
                            $cheque->date_at = $request->details_date_at;
                            $cheque->is_cheque = ($request->type === 'Bank Deposit') ? $request->details_is_cheque : false;
                            $cheque->receipt_id = $data->id;
                            if($cheque->save()){
                                $amount = trim(str_replace(',','',$request->cheque_amount),'₱');
                                $total = trim(str_replace(',','',$request->total),'₱');
                                
                                if($amount > $total){
                                    $total = $amount - $total;
                                    $customer_id = $request->selected['customer_id'];

                                    $wallet = Wallet::where('customer_id',$customer_id)->first();
                                    if($wallet){
                                        $wallet->total = $wallet->total + $total;
                                        $wallet->available = trim(str_replace(',','',$wallet->available),'₱') + $total;
                                        if($wallet->save()){
                                            $data->transaction()->create([
                                                'code' => date('Ymdgia'),
                                                'amount' => $total,
                                                'balance' => trim(str_replace(',','',$wallet->available),'₱'),
                                                'is_credit' => 1,
                                                'wallet_id' => $wallet->id
                                            ]);
                                            \DB::commit();  
                                        }else{
                                            $data = 'error';
                                            \DB::rollback();
                                        }
                                    }else{
                                        $wallet = new Wallet;
                                        $wallet->total = $total;
                                        $wallet->available = $total;
                                        $wallet->customer_id = $customer_id;
                                        if($wallet->save()){
                                            $data->transaction()->create([
                                                'code' => date('Ymdgis'),
                                                'amount' => $total,
                                                'balance' => $total,
                                                'is_credit' => 1,
                                                'wallet_id' => $wallet->id
                                            ]);
                                            \DB::commit();  
                                        }else{
                                            $data = 'error';
                                            \DB::rollback();
                                        }
                                    }
                                }else{
                                    \DB::commit();  
                                }
                            }else{
                                $data = 'error';
                                \DB::rollback();
                            }
                        }else{
                            \DB::commit();  
                        }
                    }else{
                        \DB::rollback();
                    }
                }else{
                    $data = 'error';
                    \DB::rollback();
                }
            }

            return ['data' => $data];
        });

        return [
            'data' => $result['data'],
            'message' => 'Receipt creation was successful!', 
            'info' => "You've successfully created the new receipt."
        ];
    }

    public function receipt_nonlab($request){
        $result = \DB::transaction(function () use ($request){
            \DB::beginTransaction();
            $op = FinanceOp::create(array_merge($request->all(), [
                'code' => $this->generateCode(),
                'total' => 0,
                'status_id' => 7,
                'created_by' => \Auth::user()->id,
                'laboratory_id' => \Auth::user()->userrole->laboratory_id
            ]));
            if($op){
                $items = $request->items;
                $total = 0;
                foreach($items as $item){
                    $i = FinanceItem::create([
                        'name' => $item['name'],
                        'amount' => $item['amount']
                    ]);
                    if($i){
                        $i->itemable()->create([
                            'amount' => $item['amount'],
                            'op_id' => $op->id
                        ]);
                    }
                    $total = $total +  trim(str_replace(',','',$item['amount']),'₱');
                }
                $op->total = $total;
                $op->save();

                $receipt = FinanceReceipt::create(array_merge($request->all(), [
                    'number' => $request->orseries['next'],
                    'orseries_id' => $request->orseries['value'],  
                    'op_id' => $op->id,
                    'payor_id' => $request->customer_id,
                    'deposit_id' => $request->deposit_id,
                    'created_by' => \Auth::user()->id,
                    'laboratory_id' => \Auth::user()->userrole->laboratory_id
                ]));
                if($receipt){
                    $or = FinanceOrseries::where('id',$request->orseries['value'])->first();
                    if($or->next == $or->end){
                        $or->is_active = 0;
                    }else{
                        $next = $or->next+1;
                        $or->next = $next;
                    }

                    if($or->save()){
                        if($request->type === 'Cheque' || $request->type === 'Online Transfer' || $request->type === 'Bank Deposit'){
                            $details = new FinanceReceiptDetail;
                            $details->number = $request->details_number;
                            $details->amount = $request->details_amount;
                            $details->bank = $request->details_bank;
                            $details->date_at = $request->details_date_at;
                            $details->is_cheque = ($request->type === 'Bank Deposit') ? $request->details_is_cheque : false;
                            $details->receipt_id = $receipt->id;
                            $details->save();
                        }else{
                            \DB::commit();  
                        }
                    }
                }else{
                    $data = 'error';
                    \DB::rollback();
                }
                
            }
            return ['data' => $op];
        });

        return [
            'data' => $result['data'],
            'message' => 'Receipt creation was successful!', 
            'info' => "You've successfully created the new receipt."
        ];
    }

    public function collection($request){
        $data = ListDropdown::create($request->all());
           
        return [
            'data' => new DefaultResource($data),
            'message' => 'Collection type creation was successful!', 
            'info' => "You've successfully created a collection type."
        ];
    }

    public function name($request){
        $data = FinanceName::create($request->all());
           
        return [
            'data' => new DefaultResource($data),
            'message' => 'Name creation was successful!', 
            'info' => "You've successfully created a name."
        ];
    }

    public function orseries($request){
        $data = FinanceOrseries::create(array_merge($request->all(),[
            'user_id' => \Auth::user()->id,
            'is_active' => 1,
            'laboratory_id' => \Auth::user()->userrole->laboratory_id
        ]));
           
        return [
            'data' => new DefaultResource($data),
            'message' => 'Orseries creation was successful!', 
            'info' => "You've successfully created a orseries."
        ];
    }

    public function deposit($request){
        $data = FinanceDeposit::create(array_merge($request->all(),[
            'start' => $request->start['value'],
            'end' => $request->end['value'],
            'created_by' => \Auth::user()->id,
            'laboratory_id' => \Auth::user()->userrole->laboratory_id
        ]));
        if($data){
            $receipts = FinanceReceipt::whereBetween('number',[$request->start['value'],$request->end['value']])->update(['is_deposited' => 1]);
        }
           
        return [
            'data' => new DefaultResource($data),
            'message' => 'Deposit creation was successful!', 
            'info' => "You've successfully created a deposit."
        ];
    }

    private function generateCode(){
        $year = date('Y'); 
        $c = FinanceOp::whereYear('created_at',$year)->count();
        $code = date('Y').date('m').'-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
