<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceDepositsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_deposits')->delete();
        

        
    }
}