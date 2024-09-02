<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TsrChildrenTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tsr_children')->truncate();
        
        \DB::table('tsr_children')->insert(array (
            0 => 
            array (
                'id' => 13,
                'parent_id' => 91,
                'child_id' => 105,
                'created_at' => '2024-08-28 13:07:01',
                'updated_at' => '2024-08-28 13:07:01',
            ),
            1 => 
            array (
                'id' => 14,
                'parent_id' => 91,
                'child_id' => 107,
                'created_at' => '2024-08-28 13:26:52',
                'updated_at' => '2024-08-28 13:26:52',
            ),
            2 => 
            array (
                'id' => 15,
                'parent_id' => 91,
                'child_id' => 108,
                'created_at' => '2024-08-28 13:30:12',
                'updated_at' => '2024-08-28 13:30:12',
            ),
            3 => 
            array (
                'id' => 16,
                'parent_id' => 91,
                'child_id' => 109,
                'created_at' => '2024-08-28 13:35:00',
                'updated_at' => '2024-08-28 13:35:00',
            ),
            4 => 
            array (
                'id' => 17,
                'parent_id' => 91,
                'child_id' => 110,
                'created_at' => '2024-08-28 13:41:12',
                'updated_at' => '2024-08-28 13:41:12',
            ),
            5 => 
            array (
                'id' => 18,
                'parent_id' => 91,
                'child_id' => 111,
                'created_at' => '2024-08-28 13:45:56',
                'updated_at' => '2024-08-28 13:45:56',
            ),
            6 => 
            array (
                'id' => 19,
                'parent_id' => 91,
                'child_id' => 112,
                'created_at' => '2024-08-28 15:15:12',
                'updated_at' => '2024-08-28 15:15:12',
            ),
            7 => 
            array (
                'id' => 20,
                'parent_id' => 91,
                'child_id' => 114,
                'created_at' => '2024-08-28 15:22:54',
                'updated_at' => '2024-08-28 15:22:54',
            ),
            8 => 
            array (
                'id' => 21,
                'parent_id' => 91,
                'child_id' => 169,
                'created_at' => '2024-09-02 15:02:14',
                'updated_at' => '2024-09-02 15:02:14',
            ),
            9 => 
            array (
                'id' => 22,
                'parent_id' => 91,
                'child_id' => 170,
                'created_at' => '2024-09-02 15:04:31',
                'updated_at' => '2024-09-02 15:04:31',
            ),
        ));

        
    }
}