<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletTransactionsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallet_transactions')->delete();
        
        \DB::table('wallet_transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '2024081690029',
                'amount' => '11250.00',
                'balance' => '0.00',
                'is_credit' => 0,
                'transacable_id' => 1,
                'transacable_type' => 'App\\Models\\Tsr',
                'wallet_id' => 1,
                'created_at' => '2024-08-16 09:00:29',
                'updated_at' => '2024-08-16 09:00:29',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '20240830101629',
                'amount' => '550.00',
                'balance' => '0.00',
                'is_credit' => 0,
                'transacable_id' => 132,
                'transacable_type' => 'App\\Models\\Tsr',
                'wallet_id' => 2,
                'created_at' => '2024-08-30 10:16:29',
                'updated_at' => '2024-08-30 10:16:29',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '20240831103615',
                'amount' => '13200.00',
                'balance' => '0.00',
                'is_credit' => 0,
                'transacable_id' => 153,
                'transacable_type' => 'App\\Models\\Tsr',
                'wallet_id' => 3,
                'created_at' => '2024-08-31 10:36:15',
                'updated_at' => '2024-08-31 10:36:15',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '20240831256pm',
                'amount' => '550.00',
                'balance' => '550.00',
                'is_credit' => 1,
                'transacable_id' => 80,
                'transacable_type' => 'App\\Models\\FinanceReceipt',
                'wallet_id' => 2,
                'created_at' => '2024-08-21 14:56:59',
                'updated_at' => '2024-08-31 14:56:59',
            ),
        ));

        
    }
}