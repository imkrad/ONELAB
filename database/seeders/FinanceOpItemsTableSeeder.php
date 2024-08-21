<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceOpItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_op_items')->delete();
        
        \DB::table('finance_op_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '10750.00',
                'itemable_id' => 1,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 1,
                'created_at' => '2024-08-16 09:03:00',
                'updated_at' => '2024-08-16 09:03:00',
            ),
            1 => 
            array (
                'id' => 2,
                'amount' => '2200.00',
                'itemable_id' => 3,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 2,
                'created_at' => '2024-08-16 09:40:50',
                'updated_at' => '2024-08-16 09:40:50',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '1650.00',
                'itemable_id' => 21,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 3,
                'created_at' => '2024-08-17 17:26:49',
                'updated_at' => '2024-08-17 17:26:49',
            ),
            3 => 
            array (
                'id' => 4,
                'amount' => '600.00',
                'itemable_id' => 5,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 4,
                'created_at' => '2024-08-17 17:29:11',
                'updated_at' => '2024-08-17 17:29:11',
            ),
            4 => 
            array (
                'id' => 5,
                'amount' => '500.00',
                'itemable_id' => 23,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 5,
                'created_at' => '2024-08-17 17:30:26',
                'updated_at' => '2024-08-17 17:30:26',
            ),
            5 => 
            array (
                'id' => 6,
                'amount' => '2400.00',
                'itemable_id' => 26,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 6,
                'created_at' => '2024-08-17 17:31:31',
                'updated_at' => '2024-08-17 17:31:31',
            ),
            6 => 
            array (
                'id' => 7,
                'amount' => '2400.00',
                'itemable_id' => 27,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 7,
                'created_at' => '2024-08-17 17:32:28',
                'updated_at' => '2024-08-17 17:32:28',
            ),
            7 => 
            array (
                'id' => 8,
                'amount' => '1000.00',
                'itemable_id' => 4,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 8,
                'created_at' => '2024-08-17 17:34:50',
                'updated_at' => '2024-08-17 17:34:50',
            ),
            8 => 
            array (
                'id' => 9,
                'amount' => '1000.00',
                'itemable_id' => 34,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 9,
                'created_at' => '2024-08-17 17:35:36',
                'updated_at' => '2024-08-17 17:35:36',
            ),
            9 => 
            array (
                'id' => 10,
                'amount' => '2000.00',
                'itemable_id' => 35,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 10,
                'created_at' => '2024-08-17 17:35:53',
                'updated_at' => '2024-08-17 17:35:53',
            ),
            10 => 
            array (
                'id' => 11,
                'amount' => '3100.00',
                'itemable_id' => 36,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 11,
                'created_at' => '2024-08-17 17:36:19',
                'updated_at' => '2024-08-17 17:36:19',
            ),
            11 => 
            array (
                'id' => 12,
                'amount' => '850.00',
                'itemable_id' => 37,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 12,
                'created_at' => '2024-08-17 17:37:08',
                'updated_at' => '2024-08-17 17:37:08',
            ),
            12 => 
            array (
                'id' => 13,
                'amount' => '9300.00',
                'itemable_id' => 39,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 13,
                'created_at' => '2024-08-17 17:38:22',
                'updated_at' => '2024-08-17 17:38:22',
            ),
            13 => 
            array (
                'id' => 14,
                'amount' => '21420.00',
                'itemable_id' => 49,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 14,
                'created_at' => '2024-08-17 17:38:43',
                'updated_at' => '2024-08-17 17:38:43',
            ),
            14 => 
            array (
                'id' => 15,
                'amount' => '2100.00',
                'itemable_id' => 43,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 15,
                'created_at' => '2024-08-17 17:39:02',
                'updated_at' => '2024-08-17 17:39:02',
            ),
            15 => 
            array (
                'id' => 16,
                'amount' => '2500.00',
                'itemable_id' => 48,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 16,
                'created_at' => '2024-08-17 17:39:20',
                'updated_at' => '2024-08-17 17:39:20',
            ),
            16 => 
            array (
                'id' => 17,
                'amount' => '17600.00',
                'itemable_id' => 51,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 17,
                'created_at' => '2024-08-17 17:39:41',
                'updated_at' => '2024-08-17 17:39:41',
            ),
            17 => 
            array (
                'id' => 18,
                'amount' => '3300.00',
                'itemable_id' => 50,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 17,
                'created_at' => '2024-08-17 17:39:41',
                'updated_at' => '2024-08-17 17:39:41',
            ),
            18 => 
            array (
                'id' => 19,
                'amount' => '6000.00',
                'itemable_id' => 45,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 18,
                'created_at' => '2024-08-17 17:40:13',
                'updated_at' => '2024-08-17 17:40:13',
            ),
            19 => 
            array (
                'id' => 20,
                'amount' => '1550.00',
                'itemable_id' => 53,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 19,
                'created_at' => '2024-08-17 17:40:40',
                'updated_at' => '2024-08-17 17:40:40',
            ),
            20 => 
            array (
                'id' => 21,
                'amount' => '6550.00',
                'itemable_id' => 42,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 20,
                'created_at' => '2024-08-17 17:41:23',
                'updated_at' => '2024-08-17 17:41:23',
            ),
            21 => 
            array (
                'id' => 22,
                'amount' => '550.00',
                'itemable_id' => 41,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 20,
                'created_at' => '2024-08-17 17:41:23',
                'updated_at' => '2024-08-17 17:41:23',
            ),
            22 => 
            array (
                'id' => 23,
                'amount' => '4000.00',
                'itemable_id' => 54,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 21,
                'created_at' => '2024-08-17 17:41:39',
                'updated_at' => '2024-08-17 17:41:39',
            ),
            23 => 
            array (
                'id' => 24,
                'amount' => '6920.00',
                'itemable_id' => 56,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 22,
                'created_at' => '2024-08-17 17:41:57',
                'updated_at' => '2024-08-17 17:41:57',
            ),
            24 => 
            array (
                'id' => 25,
                'amount' => '1000.00',
                'itemable_id' => 55,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 22,
                'created_at' => '2024-08-17 17:41:57',
                'updated_at' => '2024-08-17 17:41:57',
            ),
            25 => 
            array (
                'id' => 26,
                'amount' => '500.00',
                'itemable_id' => 57,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 23,
                'created_at' => '2024-08-17 17:43:10',
                'updated_at' => '2024-08-17 17:43:10',
            ),
            26 => 
            array (
                'id' => 27,
                'amount' => '1550.00',
                'itemable_id' => 58,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 24,
                'created_at' => '2024-08-17 17:43:26',
                'updated_at' => '2024-08-17 17:43:26',
            ),
            27 => 
            array (
                'id' => 28,
                'amount' => '800.00',
                'itemable_id' => 62,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 25,
                'created_at' => '2024-08-17 17:43:38',
                'updated_at' => '2024-08-17 17:43:38',
            ),
            28 => 
            array (
                'id' => 29,
                'amount' => '8612.00',
                'itemable_id' => 38,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 26,
                'created_at' => '2024-08-17 17:43:53',
                'updated_at' => '2024-08-17 17:43:53',
            ),
            29 => 
            array (
                'id' => 30,
                'amount' => '1550.00',
                'itemable_id' => 64,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 27,
                'created_at' => '2024-08-17 17:44:19',
                'updated_at' => '2024-08-17 17:44:19',
            ),
            30 => 
            array (
                'id' => 31,
                'amount' => '1550.00',
                'itemable_id' => 65,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 28,
                'created_at' => '2024-08-17 17:44:36',
                'updated_at' => '2024-08-17 17:44:36',
            ),
            31 => 
            array (
                'id' => 32,
                'amount' => '4650.00',
                'itemable_id' => 66,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 29,
                'created_at' => '2024-08-17 17:44:55',
                'updated_at' => '2024-08-17 17:44:55',
            ),
            32 => 
            array (
                'id' => 33,
                'amount' => '4200.00',
                'itemable_id' => 69,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 30,
                'created_at' => '2024-08-17 17:45:16',
                'updated_at' => '2024-08-17 17:45:16',
            ),
            33 => 
            array (
                'id' => 34,
                'amount' => '3750.00',
                'itemable_id' => 68,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 30,
                'created_at' => '2024-08-17 17:45:16',
                'updated_at' => '2024-08-17 17:45:16',
            ),
            34 => 
            array (
                'id' => 35,
                'amount' => '500.00',
                'itemable_id' => 70,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 31,
                'created_at' => '2024-08-17 17:45:33',
                'updated_at' => '2024-08-17 17:45:33',
            ),
            35 => 
            array (
                'id' => 36,
                'amount' => '1750.00',
                'itemable_id' => 63,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 32,
                'created_at' => '2024-08-17 17:45:47',
                'updated_at' => '2024-08-17 17:45:47',
            ),
            36 => 
            array (
                'id' => 37,
                'amount' => '900.00',
                'itemable_id' => 71,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 33,
                'created_at' => '2024-08-17 17:46:48',
                'updated_at' => '2024-08-17 17:46:48',
            ),
            37 => 
            array (
                'id' => 38,
                'amount' => '1550.00',
                'itemable_id' => 72,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 34,
                'created_at' => '2024-08-17 17:47:05',
                'updated_at' => '2024-08-17 17:47:05',
            ),
            38 => 
            array (
                'id' => 39,
                'amount' => '6920.00',
                'itemable_id' => 73,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 35,
                'created_at' => '2024-08-17 17:47:22',
                'updated_at' => '2024-08-17 17:47:22',
            ),
            39 => 
            array (
                'id' => 40,
                'amount' => '1500.00',
                'itemable_id' => 74,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 36,
                'created_at' => '2024-08-17 17:47:37',
                'updated_at' => '2024-08-17 17:47:37',
            ),
            40 => 
            array (
                'id' => 41,
                'amount' => '1550.00',
                'itemable_id' => 67,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 37,
                'created_at' => '2024-08-17 17:47:52',
                'updated_at' => '2024-08-17 17:47:52',
            ),
            41 => 
            array (
                'id' => 42,
                'amount' => '1550.00',
                'itemable_id' => 77,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 38,
                'created_at' => '2024-08-17 17:48:12',
                'updated_at' => '2024-08-17 17:48:12',
            ),
            42 => 
            array (
                'id' => 43,
                'amount' => '1550.00',
                'itemable_id' => 75,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 39,
                'created_at' => '2024-08-17 17:48:31',
                'updated_at' => '2024-08-17 17:48:31',
            ),
            43 => 
            array (
                'id' => 44,
                'amount' => '1550.00',
                'itemable_id' => 76,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 40,
                'created_at' => '2024-08-17 17:48:42',
                'updated_at' => '2024-08-17 17:48:42',
            ),
            44 => 
            array (
                'id' => 45,
                'amount' => '550.00',
                'itemable_id' => 78,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 41,
                'created_at' => '2024-08-17 17:49:01',
                'updated_at' => '2024-08-17 17:49:01',
            ),
            45 => 
            array (
                'id' => 46,
                'amount' => '500.00',
                'itemable_id' => 81,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 42,
                'created_at' => '2024-08-17 17:49:16',
                'updated_at' => '2024-08-17 17:49:16',
            ),
            46 => 
            array (
                'id' => 47,
                'amount' => '950.00',
                'itemable_id' => 1,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 43,
                'created_at' => '2024-08-19 08:47:56',
                'updated_at' => '2024-08-19 08:47:56',
            ),
            47 => 
            array (
                'id' => 48,
                'amount' => '464.00',
                'itemable_id' => 2,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 44,
                'created_at' => '2024-08-19 08:50:43',
                'updated_at' => '2024-08-19 08:50:43',
            ),
            48 => 
            array (
                'id' => 49,
                'amount' => '69445.00',
                'itemable_id' => 3,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 45,
                'created_at' => '2024-08-19 08:53:11',
                'updated_at' => '2024-08-19 08:53:11',
            ),
            49 => 
            array (
                'id' => 50,
                'amount' => '8400.00',
                'itemable_id' => 82,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 46,
                'created_at' => '2024-08-19 15:29:39',
                'updated_at' => '2024-08-19 15:29:39',
            ),
            50 => 
            array (
                'id' => 51,
                'amount' => '500.00',
                'itemable_id' => 84,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 47,
                'created_at' => '2024-08-19 15:30:17',
                'updated_at' => '2024-08-19 15:30:17',
            ),
            51 => 
            array (
                'id' => 52,
                'amount' => '10850.00',
                'itemable_id' => 85,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 48,
                'created_at' => '2024-08-19 15:30:45',
                'updated_at' => '2024-08-19 15:30:45',
            ),
            52 => 
            array (
                'id' => 53,
                'amount' => '550.00',
                'itemable_id' => 86,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 49,
                'created_at' => '2024-08-19 15:53:41',
                'updated_at' => '2024-08-19 15:53:41',
            ),
            53 => 
            array (
                'id' => 54,
                'amount' => '550.00',
                'itemable_id' => 87,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 50,
                'created_at' => '2024-08-19 15:54:13',
                'updated_at' => '2024-08-19 15:54:13',
            ),
            54 => 
            array (
                'id' => 55,
                'amount' => '900.00',
                'itemable_id' => 88,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 51,
                'created_at' => '2024-08-19 15:54:33',
                'updated_at' => '2024-08-19 15:54:33',
            ),
            55 => 
            array (
                'id' => 66,
                'amount' => '4867500.00',
                'itemable_id' => 15,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 64,
                'created_at' => '2024-08-19 16:24:43',
                'updated_at' => '2024-08-19 16:24:43',
            ),
        ));

        
    }
}