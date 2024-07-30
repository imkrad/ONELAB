<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListLaboratoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_laboratories')->delete();
        
        \DB::table('list_laboratories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Chemical Laboratory',
                'short' => 'CHE',
                'color' => 'n/a',
                'is_active' => 1,
                'created_at' => '2024-07-30 11:05:19',
                'updated_at' => '2024-07-30 11:05:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Microbiological Laboratory',
                'short' => 'MIC',
                'color' => 'n/a',
                'is_active' => 1,
                'created_at' => '2024-07-30 11:05:19',
                'updated_at' => '2024-07-30 11:05:19',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Metrology Laboratory',
                'short' => 'MET',
                'color' => 'n/a',
                'is_active' => 1,
                'created_at' => '2024-07-30 11:05:19',
                'updated_at' => '2024-07-30 11:05:19',
            ),
        ));

        
    }
}