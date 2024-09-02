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
            1 => 
            array (
                'id' => 2,
                'total' => '550.00',
                'available' => '0.00',
                'deduction' => '0.00',
                'customer_id' => 130,
                'created_at' => '2024-08-16 08:50:36',
                'updated_at' => '2024-08-31 14:56:59',
            ),
            2 => 
            array (
                'id' => 3,
                'total' => '2250.00',
                'available' => '0.00',
                'deduction' => '0.00',
                'customer_id' => 26,
                'created_at' => '2024-08-16 08:50:36',
                'updated_at' => '2024-08-31 10:36:15',
            ),
        ));

        
    }
}