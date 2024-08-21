<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_items')->truncate();
        
        \DB::table('finance_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '950.00',
                'name' => 'Refund of Excess CA Travel',
                'created_at' => '2024-08-19 08:47:56',
                'updated_at' => '2024-08-19 08:47:56',
            ),
            1 => 
            array (
                'id' => 2,
                'amount' => '464.00',
                'name' => 'Refund of Excess CA',
                'created_at' => '2024-08-19 08:50:43',
                'updated_at' => '2024-08-19 08:50:43',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '69445.00',
                'name' => 'For the month of July 2024',
                'created_at' => '2024-08-19 08:53:11',
                'updated_at' => '2024-08-19 08:53:11',
            ),
            3 => 
            array (
                'id' => 15,
                'amount' => '4867500.00',
                'name' => 'Stipend and allowances for the Scholars',
                'created_at' => '2024-08-19 16:24:43',
                'updated_at' => '2024-08-19 16:24:43',
            ),
        ));

        
    }
}