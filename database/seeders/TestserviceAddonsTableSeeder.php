<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestserviceAddonsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testservice_addons')->delete();
        
        \DB::table('testservice_addons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fee' => '3000.00',
                'name' => 'On-site Calibration',
                'description' => 'More than 50 km radius from the laboratory',
                'typeable_id' => 3,
                'typeable_type' => 'App\\Models\\ListLaboratory',
                'laboratory_id' => 14,
                'is_additional' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-14 10:41:18',
                'updated_at' => '2024-08-14 10:41:18',
            ),
            1 => 
            array (
                'id' => 2,
                'fee' => '2000.00',
                'name' => 'On-site Calibration',
                'description' => 'Within 50 km radius from the laboratory',
                'typeable_id' => 3,
                'typeable_type' => 'App\\Models\\ListLaboratory',
                'laboratory_id' => 14,
                'is_additional' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:10:18',
                'updated_at' => '2024-08-14 11:10:18',
            ),
            2 => 
            array (
                'id' => 3,
                'fee' => '20.00',
                'name' => 'Additional fee for every tonne thereafter in excess of 1 tonne',
                'description' => 'n/a',
                'typeable_id' => 300,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 10:41:18',
                'updated_at' => '2024-08-14 10:41:18',
            ),
            3 => 
            array (
                'id' => 4,
                'fee' => '500.00',
                'name' => 'Additional fee per test point',
                'description' => 'n/a',
                'typeable_id' => 347,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:10:18',
                'updated_at' => '2024-08-14 11:10:18',
            ),
            4 => 
            array (
                'id' => 5,
                'fee' => '1750.00',
            'name' => 'Additional fee per channel (5 test points)',
                'description' => 'n/a',
                'typeable_id' => 347,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:11:26',
                'updated_at' => '2024-08-14 11:11:26',
            ),
            5 => 
            array (
                'id' => 6,
                'fee' => '500.00',
                'name' => 'Additional fee per test point',
                'description' => 'n/a',
                'typeable_id' => 294,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:20:30',
                'updated_at' => '2024-08-14 11:20:30',
            ),
            6 => 
            array (
                'id' => 7,
                'fee' => '650.00',
                'name' => 'Additional fee per test point',
                'description' => 'n/a',
                'typeable_id' => 293,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:20:48',
                'updated_at' => '2024-08-14 11:20:48',
            ),
            7 => 
            array (
                'id' => 8,
                'fee' => '500.00',
                'name' => 'Additional fee per test point',
                'description' => 'n/a',
                'typeable_id' => 353,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:31:41',
                'updated_at' => '2024-08-14 11:31:41',
            ),
            8 => 
            array (
                'id' => 9,
                'fee' => '350.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 352,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:33:48',
                'updated_at' => '2024-08-14 11:33:48',
            ),
            9 => 
            array (
                'id' => 10,
                'fee' => '350.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 303,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:34:05',
                'updated_at' => '2024-08-14 11:34:05',
            ),
            10 => 
            array (
                'id' => 11,
                'fee' => '350.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 290,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:34:52',
                'updated_at' => '2024-08-14 11:34:52',
            ),
            11 => 
            array (
                'id' => 12,
                'fee' => '300.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 291,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:35:04',
                'updated_at' => '2024-08-14 11:35:04',
            ),
            12 => 
            array (
                'id' => 13,
                'fee' => '750.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 296,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:35:56',
                'updated_at' => '2024-08-14 11:35:56',
            ),
            13 => 
            array (
                'id' => 14,
                'fee' => '900.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 295,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:36:10',
                'updated_at' => '2024-08-14 11:36:10',
            ),
            14 => 
            array (
                'id' => 15,
                'fee' => '650.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 350,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:37:13',
                'updated_at' => '2024-08-14 11:37:13',
            ),
            15 => 
            array (
                'id' => 16,
                'fee' => '550.00',
                'name' => 'Additional fee per succeeding range',
                'description' => 'n/a',
                'typeable_id' => 351,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:37:31',
                'updated_at' => '2024-08-14 11:37:31',
            ),
            16 => 
            array (
                'id' => 17,
                'fee' => '70.00',
                'name' => 'Additional fee per meter',
                'description' => 'n/a',
                'typeable_id' => 324,
                'typeable_type' => 'App\\Models\\Testservice',
                'laboratory_id' => 14,
                'is_additional' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-14 11:42:22',
                'updated_at' => '2024-08-14 11:42:22',
            ),
        ));

        
    }
}