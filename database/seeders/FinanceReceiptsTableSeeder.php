<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceReceiptsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_receipts')->delete();
        
        \DB::table('finance_receipts')->insert(array (
            0 => 
            array (
                'id' => 2,
                'number' => '86989',
                'is_deposit' => 0,
                'op_id' => 1,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-16 09:10:25',
                'updated_at' => '2024-08-16 09:10:25',
            ),
            1 => 
            array (
                'id' => 3,
                'number' => '86982',
                'is_deposit' => 0,
                'op_id' => 2,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:53:04',
                'updated_at' => '2024-08-17 17:53:04',
            ),
            2 => 
            array (
                'id' => 4,
                'number' => '86984',
                'is_deposit' => 0,
                'op_id' => 3,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:54:05',
                'updated_at' => '2024-08-17 17:54:05',
            ),
            3 => 
            array (
                'id' => 5,
                'number' => '86985',
                'is_deposit' => 0,
                'op_id' => 4,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:54:39',
                'updated_at' => '2024-08-17 17:54:39',
            ),
            4 => 
            array (
                'id' => 6,
                'number' => '86986',
                'is_deposit' => 0,
                'op_id' => 5,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:54:53',
                'updated_at' => '2024-08-17 17:54:53',
            ),
            5 => 
            array (
                'id' => 7,
                'number' => '86987',
                'is_deposit' => 0,
                'op_id' => 6,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:55:06',
                'updated_at' => '2024-08-17 17:55:06',
            ),
            6 => 
            array (
                'id' => 8,
                'number' => '86988',
                'is_deposit' => 0,
                'op_id' => 7,
                'orseries_id' => 1,
                'deposit_id' => 26,
                'created_by' => 3,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:55:28',
                'updated_at' => '2024-08-17 17:55:28',
            ),
        ));

        
    }
}