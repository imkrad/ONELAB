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
            1 => 
            array (
                'id' => 2,
                'amount' => '550.00',
                'code' => '20240830101629',
                'wallet_id' => 2,
                'payment_id' => 126,
                'user_id' => 2,
                'created_at' => '2024-08-30 10:16:29',
                'updated_at' => '2024-08-30 10:16:29',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '2250.00',
                'code' => '20240831103615',
                'wallet_id' => 3,
                'payment_id' => 147,
                'user_id' => 2,
                'created_at' => '2024-08-31 10:36:15',
                'updated_at' => '2024-08-31 10:36:15',
            ),
        ));

        
    }
}