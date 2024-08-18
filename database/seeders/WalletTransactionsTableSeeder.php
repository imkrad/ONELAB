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
        ));

        
    }
}