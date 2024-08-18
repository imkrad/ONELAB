<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceReceiptDetailsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_receipt_details')->delete();
        
        \DB::table('finance_receipt_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '10750.00',
                'bank' => 'MBTC',
                'number' => '2601813779',
                'is_cheque' => 0,
                'receipt_id' => 2,
                'date_at' => '2024-07-22',
                'created_at' => '2024-08-16 09:10:25',
                'updated_at' => '2024-08-16 09:10:25',
            ),
        ));

        
    }
}