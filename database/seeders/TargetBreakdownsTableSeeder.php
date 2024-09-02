<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TargetBreakdownsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('target_breakdowns')->delete();
        
        \DB::table('target_breakdowns')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Samples Received',
                'count' => 2020,
                'accom' => 103,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 1,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:32:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Samples Received',
                'count' => 1515,
                'accom' => 189,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 2,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:16:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Samples Received',
                'count' => 1515,
                'accom' => 159,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 3,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:16:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Services Conducted',
                'count' => 4292,
                'accom' => 421,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 1,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:32:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Services Conducted',
                'count' => 4293,
                'accom' => 301,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 2,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:16:24',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Services Conducted',
                'count' => 2020,
                'accom' => 190,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 3,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-09-02 16:16:35',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Customers Served',
                'count' => 707,
                'accom' => 31,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 1,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:51:29',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Customers Served',
                'count' => 707,
                'accom' => 21,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 2,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:51:29',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Customers Served',
                'count' => 606,
                'accom' => 25,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 0,
                'laboratory_type' => 3,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:51:29',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'New Customers Served',
                'count' => 222,
                'accom' => 0,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 1,
                'laboratory_type' => NULL,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:51:39',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Firms Served',
                'count' => 355,
                'accom' => 0,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 1,
                'laboratory_type' => NULL,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:51:46',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Actual Fees Collected',
                'count' => 2785000,
                'accom' => 69052,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 1,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:22',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Actual Fees Collected',
                'count' => 2785000,
                'accom' => 39050,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 2,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:22',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Actual Fees Collected',
                'count' => 1500000,
                'accom' => 50670,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 3,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:22',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Value of Assistance Rendered',
                'count' => 302000,
                'accom' => 3000,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 1,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:49',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Value of Assistance Rendered',
                'count' => 302000,
                'accom' => 4950,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 2,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:49',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Value of Assistance Rendered',
                'count' => 200000,
                'accom' => 53380,
                'is_set' => 1,
                'is_amount' => 1,
                'is_consolidated' => 0,
                'laboratory_type' => 3,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:52:49',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'New Services Offered',
                'count' => 5,
                'accom' => 0,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 1,
                'laboratory_type' => NULL,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:53:00',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Weaned Out Services',
                'count' => 2,
                'accom' => 0,
                'is_set' => 1,
                'is_amount' => 0,
                'is_consolidated' => 1,
                'laboratory_type' => NULL,
                'target_id' => 1,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:53:03',
            ),
        ));

        
    }
}