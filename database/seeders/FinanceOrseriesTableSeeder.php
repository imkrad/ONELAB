<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceOrseriesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_orseries')->delete();
        
        \DB::table('finance_orseries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jali GF 2021',
                'start' => '84001',
                'next' => '86990',
                'end' => '87027',
                'is_active' => 1,
                'user_id' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-16 09:04:23',
                'updated_at' => '2024-08-17 18:02:49',
            ),
        ));

        
    }
}