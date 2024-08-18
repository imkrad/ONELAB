<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallets')->delete();
        
        \DB::table('wallets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'total' => '500.00',
                'available' => '0.00',
                'deduction' => '0.00',
                'customer_id' => 93,
                'created_at' => '2024-08-16 08:50:36',
                'updated_at' => '2024-08-16 09:00:29',
            ),
        ));

        
    }
}