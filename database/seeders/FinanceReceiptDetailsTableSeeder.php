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
        

        \DB::table('finance_receipt_details')->truncate();
        
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
            1 => 
            array (
                'id' => 2,
                'amount' => '6000.00',
                'bank' => 'MBTC',
                'number' => '0304863433',
                'is_cheque' => 0,
                'receipt_id' => 22,
                'date_at' => '2024-08-08',
                'created_at' => '2024-08-19 08:56:40',
                'updated_at' => '2024-08-19 08:56:40',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '7100.00',
                'bank' => 'LBP',
                'number' => '2928777',
                'is_cheque' => 0,
                'receipt_id' => 24,
                'date_at' => '2024-08-02',
                'created_at' => '2024-08-19 08:58:35',
                'updated_at' => '2024-08-19 08:58:35',
            ),
            3 => 
            array (
                'id' => 4,
                'amount' => '7950.00',
                'bank' => 'BDO',
                'number' => '392907',
                'is_cheque' => 0,
                'receipt_id' => 34,
                'date_at' => '2024-08-12',
                'created_at' => '2024-08-19 09:01:59',
                'updated_at' => '2024-08-19 09:01:59',
            ),
            4 => 
            array (
                'id' => 7,
                'amount' => '4867500.00',
                'bank' => 'LBP/ADA',
                'number' => '2024081832',
                'is_cheque' => 0,
                'receipt_id' => 55,
                'date_at' => '2024-08-07',
                'created_at' => '2024-08-19 16:24:43',
                'updated_at' => '2024-08-19 16:24:43',
            ),
        ));

        
    }
}