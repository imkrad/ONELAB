<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TargetsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('targets')->delete();
        
        \DB::table('targets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'year' => '2024',
                'data' => '[]',
                'is_completed' => 0,
                'laboratory_id' => 14,
                'created_at' => '2024-08-07 08:45:21',
                'updated_at' => '2024-08-07 08:45:21',
            ),
        ));

        
    }
}