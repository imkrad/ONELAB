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
        

        \DB::table('finance_op_items')->truncate();
        
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
            56 => 
            array (
                'id' => 67,
                'amount' => '31792.00',
                'itemable_id' => 91,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 65,
                'created_at' => '2024-08-27 12:56:21',
                'updated_at' => '2024-08-27 12:56:21',
            ),
            57 => 
            array (
                'id' => 68,
                'amount' => '1550.00',
                'itemable_id' => 89,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 66,
                'created_at' => '2024-08-28 15:50:34',
                'updated_at' => '2024-08-28 15:50:34',
            ),
            58 => 
            array (
                'id' => 69,
                'amount' => '2000.00',
                'itemable_id' => 90,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 67,
                'created_at' => '2024-08-28 15:53:17',
                'updated_at' => '2024-08-28 15:53:17',
            ),
            59 => 
            array (
                'id' => 75,
                'amount' => '1550.00',
                'itemable_id' => 113,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 73,
                'created_at' => '2024-08-28 16:05:14',
                'updated_at' => '2024-08-28 16:05:14',
            ),
            60 => 
            array (
                'id' => 76,
                'amount' => '2100.00',
                'itemable_id' => 115,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 74,
                'created_at' => '2024-08-28 16:06:48',
                'updated_at' => '2024-08-28 16:06:48',
            ),
            61 => 
            array (
                'id' => 77,
                'amount' => '550.00',
                'itemable_id' => 116,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 75,
                'created_at' => '2024-08-28 16:07:54',
                'updated_at' => '2024-08-28 16:07:54',
            ),
            62 => 
            array (
                'id' => 78,
                'amount' => '2000.00',
                'itemable_id' => 117,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 76,
                'created_at' => '2024-08-28 16:08:51',
                'updated_at' => '2024-08-28 16:08:51',
            ),
            63 => 
            array (
                'id' => 79,
                'amount' => '2000.00',
                'itemable_id' => 118,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 77,
                'created_at' => '2024-08-31 13:49:21',
                'updated_at' => '2024-08-31 13:49:21',
            ),
            64 => 
            array (
                'id' => 80,
                'amount' => '1000.00',
                'itemable_id' => 121,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 78,
                'created_at' => '2024-08-31 13:50:29',
                'updated_at' => '2024-08-31 13:50:29',
            ),
            65 => 
            array (
                'id' => 81,
                'amount' => '1100.00',
                'itemable_id' => 120,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 78,
                'created_at' => '2024-08-31 13:50:29',
                'updated_at' => '2024-08-31 13:50:29',
            ),
            66 => 
            array (
                'id' => 82,
                'amount' => '5820.00',
                'itemable_id' => 119,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 78,
                'created_at' => '2024-08-31 13:50:29',
                'updated_at' => '2024-08-31 13:50:29',
            ),
            67 => 
            array (
                'id' => 83,
                'amount' => '5050.00',
                'itemable_id' => 123,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 79,
                'created_at' => '2024-08-31 13:58:58',
                'updated_at' => '2024-08-31 13:58:58',
            ),
            68 => 
            array (
                'id' => 84,
                'amount' => '2500.00',
                'itemable_id' => 124,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 80,
                'created_at' => '2024-08-31 14:00:54',
                'updated_at' => '2024-08-31 14:00:54',
            ),
            69 => 
            array (
                'id' => 85,
                'amount' => '500.00',
                'itemable_id' => 122,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 81,
                'created_at' => '2024-08-31 14:03:09',
                'updated_at' => '2024-08-31 14:03:09',
            ),
            70 => 
            array (
                'id' => 86,
                'amount' => '500.00',
                'itemable_id' => 126,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 82,
                'created_at' => '2024-08-31 14:03:40',
                'updated_at' => '2024-08-31 14:03:40',
            ),
            71 => 
            array (
                'id' => 87,
                'amount' => '500.00',
                'itemable_id' => 125,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 83,
                'created_at' => '2024-08-31 14:03:49',
                'updated_at' => '2024-08-31 14:03:49',
            ),
            72 => 
            array (
                'id' => 88,
                'amount' => '2850.00',
                'itemable_id' => 129,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 84,
                'created_at' => '2024-08-31 14:07:54',
                'updated_at' => '2024-08-31 14:07:54',
            ),
            73 => 
            array (
                'id' => 89,
                'amount' => '500.00',
                'itemable_id' => 128,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 84,
                'created_at' => '2024-08-31 14:07:54',
                'updated_at' => '2024-08-31 14:07:54',
            ),
            74 => 
            array (
                'id' => 90,
                'amount' => '550.00',
                'itemable_id' => 130,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 85,
                'created_at' => '2024-08-31 14:11:04',
                'updated_at' => '2024-08-31 14:11:04',
            ),
            75 => 
            array (
                'id' => 91,
                'amount' => '2500.00',
                'itemable_id' => 131,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 86,
                'created_at' => '2024-08-31 14:11:34',
                'updated_at' => '2024-08-31 14:11:34',
            ),
            76 => 
            array (
                'id' => 92,
                'amount' => '550.00',
                'itemable_id' => 138,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 87,
                'created_at' => '2024-08-31 14:12:26',
                'updated_at' => '2024-08-31 14:12:26',
            ),
            77 => 
            array (
                'id' => 93,
                'amount' => '700.00',
                'itemable_id' => 137,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 87,
                'created_at' => '2024-08-31 14:12:26',
                'updated_at' => '2024-08-31 14:12:26',
            ),
            78 => 
            array (
                'id' => 94,
                'amount' => '4750.00',
                'itemable_id' => 141,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 88,
                'created_at' => '2024-08-31 14:12:50',
                'updated_at' => '2024-08-31 14:12:50',
            ),
            79 => 
            array (
                'id' => 95,
                'amount' => '6920.00',
                'itemable_id' => 144,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 89,
                'created_at' => '2024-08-31 14:14:05',
                'updated_at' => '2024-08-31 14:14:05',
            ),
            80 => 
            array (
                'id' => 96,
                'amount' => '1550.00',
                'itemable_id' => 143,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 89,
                'created_at' => '2024-08-31 14:14:05',
                'updated_at' => '2024-08-31 14:14:05',
            ),
            81 => 
            array (
                'id' => 97,
                'amount' => '1650.00',
                'itemable_id' => 142,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 89,
                'created_at' => '2024-08-31 14:14:05',
                'updated_at' => '2024-08-31 14:14:05',
            ),
            82 => 
            array (
                'id' => 98,
                'amount' => '500.00',
                'itemable_id' => 145,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 90,
                'created_at' => '2024-08-31 14:14:28',
                'updated_at' => '2024-08-31 14:14:28',
            ),
            83 => 
            array (
                'id' => 99,
                'amount' => '1550.00',
                'itemable_id' => 146,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 91,
                'created_at' => '2024-08-31 14:15:41',
                'updated_at' => '2024-08-31 14:15:41',
            ),
            84 => 
            array (
                'id' => 100,
                'amount' => '17700.00',
                'itemable_id' => 147,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 92,
                'created_at' => '2024-08-31 14:16:43',
                'updated_at' => '2024-08-31 14:16:43',
            ),
            85 => 
            array (
                'id' => 101,
                'amount' => '5500.00',
                'itemable_id' => 149,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 93,
                'created_at' => '2024-08-31 14:17:06',
                'updated_at' => '2024-08-31 14:17:06',
            ),
            86 => 
            array (
                'id' => 102,
                'amount' => '2100.00',
                'itemable_id' => 150,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 94,
                'created_at' => '2024-08-31 14:18:06',
                'updated_at' => '2024-08-31 14:18:06',
            ),
            87 => 
            array (
                'id' => 103,
                'amount' => '2500.00',
                'itemable_id' => 156,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 95,
                'created_at' => '2024-08-31 14:18:49',
                'updated_at' => '2024-08-31 14:18:49',
            ),
            88 => 
            array (
                'id' => 104,
                'amount' => '550.00',
                'itemable_id' => 151,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 96,
                'created_at' => '2024-08-31 14:19:14',
                'updated_at' => '2024-08-31 14:19:14',
            ),
            89 => 
            array (
                'id' => 105,
                'amount' => '6272.00',
                'itemable_id' => 152,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 97,
                'created_at' => '2024-08-31 14:20:22',
                'updated_at' => '2024-08-31 14:20:22',
            ),
            90 => 
            array (
                'id' => 106,
                'amount' => '10950.00',
                'itemable_id' => 153,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 98,
                'created_at' => '2024-08-31 14:21:27',
                'updated_at' => '2024-08-31 14:21:27',
            ),
            91 => 
            array (
                'id' => 107,
                'amount' => '4000.00',
                'itemable_id' => 136,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 98,
                'created_at' => '2024-08-31 14:21:27',
                'updated_at' => '2024-08-31 14:21:27',
            ),
            92 => 
            array (
                'id' => 108,
                'amount' => '2650.00',
                'itemable_id' => 135,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 98,
                'created_at' => '2024-08-31 14:21:27',
                'updated_at' => '2024-08-31 14:21:27',
            ),
            93 => 
            array (
                'id' => 109,
                'amount' => '2200.00',
                'itemable_id' => 134,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 98,
                'created_at' => '2024-08-31 14:21:27',
                'updated_at' => '2024-08-31 14:21:27',
            ),
            94 => 
            array (
                'id' => 110,
                'amount' => '13940.00',
                'itemable_id' => 133,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 98,
                'created_at' => '2024-08-31 14:21:27',
                'updated_at' => '2024-08-31 14:21:27',
            ),
            95 => 
            array (
                'id' => 111,
                'amount' => '1550.00',
                'itemable_id' => 154,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 99,
                'created_at' => '2024-08-31 14:21:45',
                'updated_at' => '2024-08-31 14:21:45',
            ),
            96 => 
            array (
                'id' => 112,
                'amount' => '500.00',
                'itemable_id' => 157,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 100,
                'created_at' => '2024-08-31 14:22:09',
                'updated_at' => '2024-08-31 14:22:09',
            ),
            97 => 
            array (
                'id' => 113,
                'amount' => '2100.00',
                'itemable_id' => 158,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 101,
                'created_at' => '2024-08-31 14:22:58',
                'updated_at' => '2024-08-31 14:22:58',
            ),
            98 => 
            array (
                'id' => 114,
                'amount' => '2000.00',
                'itemable_id' => 159,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 102,
                'created_at' => '2024-08-31 14:23:50',
                'updated_at' => '2024-08-31 14:23:50',
            ),
            99 => 
            array (
                'id' => 115,
                'amount' => '500.00',
                'itemable_id' => 160,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 103,
                'created_at' => '2024-08-31 14:24:18',
                'updated_at' => '2024-08-31 14:24:18',
            ),
            100 => 
            array (
                'id' => 116,
                'amount' => '2500.00',
                'itemable_id' => 163,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 104,
                'created_at' => '2024-08-31 14:24:29',
                'updated_at' => '2024-08-31 14:24:29',
            ),
            101 => 
            array (
                'id' => 117,
                'amount' => '500.00',
                'itemable_id' => 161,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 105,
                'created_at' => '2024-08-31 14:24:46',
                'updated_at' => '2024-08-31 14:24:46',
            ),
            102 => 
            array (
                'id' => 118,
                'amount' => '850.00',
                'itemable_id' => 166,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 106,
                'created_at' => '2024-08-31 14:25:06',
                'updated_at' => '2024-08-31 14:25:06',
            ),
            103 => 
            array (
                'id' => 119,
                'amount' => '7750.00',
                'itemable_id' => 165,
                'itemable_type' => 'App\\Models\\Tsr',
                'op_id' => 106,
                'created_at' => '2024-08-31 14:25:06',
                'updated_at' => '2024-08-31 14:25:06',
            ),
            104 => 
            array (
                'id' => 120,
                'amount' => '1050.00',
                'itemable_id' => 16,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 107,
                'created_at' => '2024-08-31 14:28:38',
                'updated_at' => '2024-08-31 14:28:38',
            ),
            105 => 
            array (
                'id' => 121,
                'amount' => '1050.00',
                'itemable_id' => 17,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 108,
                'created_at' => '2024-08-31 14:29:00',
                'updated_at' => '2024-08-31 14:29:00',
            ),
            106 => 
            array (
                'id' => 122,
                'amount' => '1100.00',
                'itemable_id' => 18,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 109,
                'created_at' => '2024-08-31 14:32:45',
                'updated_at' => '2024-08-31 14:32:45',
            ),
            107 => 
            array (
                'id' => 124,
                'amount' => '17366.67',
                'itemable_id' => 19,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 111,
                'created_at' => '2024-08-31 16:12:33',
                'updated_at' => '2024-08-31 16:12:33',
            ),
            108 => 
            array (
                'id' => 125,
                'amount' => '17366.67',
                'itemable_id' => 20,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 111,
                'created_at' => '2024-08-31 16:12:33',
                'updated_at' => '2024-08-31 16:12:33',
            ),
            109 => 
            array (
                'id' => 126,
                'amount' => '9558.00',
                'itemable_id' => 21,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 112,
                'created_at' => '2024-08-31 16:14:46',
                'updated_at' => '2024-08-31 16:14:46',
            ),
            110 => 
            array (
                'id' => 128,
                'amount' => '82778.00',
                'itemable_id' => 23,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 114,
                'created_at' => '2024-08-31 16:17:18',
                'updated_at' => '2024-08-31 16:17:18',
            ),
            111 => 
            array (
                'id' => 136,
                'amount' => '78270.00',
                'itemable_id' => 31,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 122,
                'created_at' => '2024-08-31 17:01:01',
                'updated_at' => '2024-08-31 17:01:01',
            ),
            112 => 
            array (
                'id' => 137,
                'amount' => '41666.67',
                'itemable_id' => 32,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 123,
                'created_at' => '2024-08-31 17:02:23',
                'updated_at' => '2024-08-31 17:02:23',
            ),
            113 => 
            array (
                'id' => 138,
                'amount' => '13423.00',
                'itemable_id' => 33,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 124,
                'created_at' => '2024-08-31 17:03:21',
                'updated_at' => '2024-08-31 17:03:21',
            ),
            114 => 
            array (
                'id' => 141,
                'amount' => '20833.00',
                'itemable_id' => 36,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 126,
                'created_at' => '2024-08-31 17:05:36',
                'updated_at' => '2024-08-31 17:05:36',
            ),
            115 => 
            array (
                'id' => 142,
                'amount' => '20833.00',
                'itemable_id' => 37,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 126,
                'created_at' => '2024-08-31 17:05:36',
                'updated_at' => '2024-08-31 17:05:36',
            ),
            116 => 
            array (
                'id' => 144,
                'amount' => '69445.00',
                'itemable_id' => 39,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 128,
                'created_at' => '2024-08-31 17:11:00',
                'updated_at' => '2024-08-31 17:11:00',
            ),
            117 => 
            array (
                'id' => 145,
                'amount' => '30000.00',
                'itemable_id' => 40,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 129,
                'created_at' => '2024-08-31 17:11:42',
                'updated_at' => '2024-08-31 17:11:42',
            ),
            118 => 
            array (
                'id' => 146,
                'amount' => '83334.00',
                'itemable_id' => 41,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 130,
                'created_at' => '2024-08-31 17:12:35',
                'updated_at' => '2024-08-31 17:12:35',
            ),
            119 => 
            array (
                'id' => 148,
                'amount' => '79861.11',
                'itemable_id' => 43,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 132,
                'created_at' => '2024-08-31 17:14:01',
                'updated_at' => '2024-08-31 17:14:01',
            ),
            120 => 
            array (
                'id' => 149,
                'amount' => '27381.67',
                'itemable_id' => 44,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 133,
                'created_at' => '2024-08-31 17:15:34',
                'updated_at' => '2024-08-31 17:15:34',
            ),
            121 => 
            array (
                'id' => 150,
                'amount' => '38333.00',
                'itemable_id' => 45,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 134,
                'created_at' => '2024-08-31 17:16:20',
                'updated_at' => '2024-08-31 17:16:20',
            ),
            122 => 
            array (
                'id' => 152,
                'amount' => '6944.44',
                'itemable_id' => 47,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 136,
                'created_at' => '2024-08-31 17:17:38',
                'updated_at' => '2024-08-31 17:17:38',
            ),
            123 => 
            array (
                'id' => 156,
                'amount' => '42500.00',
                'itemable_id' => 51,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 138,
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            124 => 
            array (
                'id' => 157,
                'amount' => '42500.00',
                'itemable_id' => 52,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 138,
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            125 => 
            array (
                'id' => 158,
                'amount' => '42500.00',
                'itemable_id' => 53,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 138,
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            126 => 
            array (
                'id' => 159,
                'amount' => '17777.78',
                'itemable_id' => 54,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 139,
                'created_at' => '2024-08-31 17:23:31',
                'updated_at' => '2024-08-31 17:23:31',
            ),
            127 => 
            array (
                'id' => 160,
                'amount' => '17777.78',
                'itemable_id' => 55,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 139,
                'created_at' => '2024-08-31 17:23:31',
                'updated_at' => '2024-08-31 17:23:31',
            ),
            128 => 
            array (
                'id' => 161,
                'amount' => '61112.00',
                'itemable_id' => 56,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 140,
                'created_at' => '2024-08-31 17:25:24',
                'updated_at' => '2024-08-31 17:25:24',
            ),
            129 => 
            array (
                'id' => 162,
                'amount' => '61112.00',
                'itemable_id' => 57,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 140,
                'created_at' => '2024-08-31 17:25:24',
                'updated_at' => '2024-08-31 17:25:24',
            ),
            130 => 
            array (
                'id' => 165,
                'amount' => '35833.33',
                'itemable_id' => 60,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 142,
                'created_at' => '2024-08-31 17:27:31',
                'updated_at' => '2024-08-31 17:27:31',
            ),
            131 => 
            array (
                'id' => 166,
                'amount' => '35833.33',
                'itemable_id' => 61,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 142,
                'created_at' => '2024-08-31 17:27:31',
                'updated_at' => '2024-08-31 17:27:31',
            ),
            132 => 
            array (
                'id' => 167,
                'amount' => '35834.00',
                'itemable_id' => 62,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 143,
                'created_at' => '2024-08-31 17:36:51',
                'updated_at' => '2024-08-31 17:36:51',
            ),
            133 => 
            array (
                'id' => 168,
                'amount' => '35834.00',
                'itemable_id' => 63,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 143,
                'created_at' => '2024-08-31 17:36:51',
                'updated_at' => '2024-08-31 17:36:51',
            ),
            134 => 
            array (
                'id' => 169,
                'amount' => '43333.33',
                'itemable_id' => 64,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 144,
                'created_at' => '2024-08-31 17:40:31',
                'updated_at' => '2024-08-31 17:40:31',
            ),
            135 => 
            array (
                'id' => 170,
                'amount' => '43333.33',
                'itemable_id' => 65,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 144,
                'created_at' => '2024-08-31 17:40:31',
                'updated_at' => '2024-08-31 17:40:31',
            ),
            136 => 
            array (
                'id' => 171,
                'amount' => '100000.00',
                'itemable_id' => 66,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 145,
                'created_at' => '2024-08-31 17:43:36',
                'updated_at' => '2024-08-31 17:43:36',
            ),
            137 => 
            array (
                'id' => 173,
                'amount' => '9065.00',
                'itemable_id' => 68,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 147,
                'created_at' => '2024-08-31 17:45:53',
                'updated_at' => '2024-08-31 17:45:53',
            ),
            138 => 
            array (
                'id' => 174,
                'amount' => '27777.00',
                'itemable_id' => 69,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 148,
                'created_at' => '2024-08-31 17:46:44',
                'updated_at' => '2024-08-31 17:46:44',
            ),
            139 => 
            array (
                'id' => 175,
                'amount' => '9691.00',
                'itemable_id' => 70,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 149,
                'created_at' => '2024-08-31 17:47:37',
                'updated_at' => '2024-08-31 17:47:37',
            ),
            140 => 
            array (
                'id' => 176,
                'amount' => '12639.00',
                'itemable_id' => 71,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 150,
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            141 => 
            array (
                'id' => 177,
                'amount' => '12639.00',
                'itemable_id' => 72,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 150,
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            142 => 
            array (
                'id' => 178,
                'amount' => '12639.00',
                'itemable_id' => 73,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 150,
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            143 => 
            array (
                'id' => 179,
                'amount' => '26445.00',
                'itemable_id' => 74,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 151,
                'created_at' => '2024-08-31 17:51:13',
                'updated_at' => '2024-08-31 17:51:13',
            ),
            144 => 
            array (
                'id' => 180,
                'amount' => '38889.00',
                'itemable_id' => 75,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 152,
                'created_at' => '2024-08-31 17:53:00',
                'updated_at' => '2024-08-31 17:53:00',
            ),
            145 => 
            array (
                'id' => 181,
                'amount' => '38889.00',
                'itemable_id' => 76,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 152,
                'created_at' => '2024-08-31 17:53:00',
                'updated_at' => '2024-08-31 17:53:00',
            ),
            146 => 
            array (
                'id' => 182,
                'amount' => '14390.00',
                'itemable_id' => 77,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 153,
                'created_at' => '2024-08-31 17:55:05',
                'updated_at' => '2024-08-31 17:55:05',
            ),
            147 => 
            array (
                'id' => 184,
                'amount' => '16080.00',
                'itemable_id' => 79,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 155,
                'created_at' => '2024-08-31 17:56:24',
                'updated_at' => '2024-08-31 17:56:24',
            ),
            148 => 
            array (
                'id' => 185,
                'amount' => '7139.00',
                'itemable_id' => 80,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 156,
                'created_at' => '2024-08-31 17:57:11',
                'updated_at' => '2024-08-31 17:57:11',
            ),
            149 => 
            array (
                'id' => 186,
                'amount' => '16695.00',
                'itemable_id' => 81,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 157,
                'created_at' => '2024-08-31 17:58:28',
                'updated_at' => '2024-08-31 17:58:28',
            ),
            150 => 
            array (
                'id' => 187,
                'amount' => '47445.00',
                'itemable_id' => 82,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 158,
                'created_at' => '2024-08-31 17:59:15',
                'updated_at' => '2024-08-31 17:59:15',
            ),
            151 => 
            array (
                'id' => 189,
                'amount' => '16116.00',
                'itemable_id' => 84,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 160,
                'created_at' => '2024-08-31 18:03:00',
                'updated_at' => '2024-08-31 18:03:00',
            ),
            152 => 
            array (
                'id' => 190,
                'amount' => '30834.00',
                'itemable_id' => 85,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 161,
                'created_at' => '2024-08-31 18:03:44',
                'updated_at' => '2024-08-31 18:03:44',
            ),
            153 => 
            array (
                'id' => 191,
                'amount' => '15252.00',
                'itemable_id' => 86,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 162,
                'created_at' => '2024-08-31 18:04:31',
                'updated_at' => '2024-08-31 18:04:31',
            ),
            154 => 
            array (
                'id' => 192,
                'amount' => '138890.00',
                'itemable_id' => 87,
                'itemable_type' => 'App\\Models\\FinanceItem',
                'op_id' => 163,
                'created_at' => '2024-08-31 18:14:00',
                'updated_at' => '2024-08-31 18:14:00',
            ),
        ));

        
    }
}