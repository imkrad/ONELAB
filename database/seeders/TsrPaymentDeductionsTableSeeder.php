<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TsrPaymentDeductionsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tsr_payment_deductions')->delete();
        
        \DB::table('tsr_payment_deductions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '500.00',
                'code' => '2024081690029',
                'wallet_id' => 1,
                'payment_id' => 1,
                'user_id' => 2,
                'created_at' => '2024-08-16 09:00:29',
                'updated_at' => '2024-08-16 09:00:29',
            ),
        ));

        
    }
}