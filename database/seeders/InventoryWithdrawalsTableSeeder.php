<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventoryWithdrawalsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('inventory_withdrawals')->delete();
        
        \DB::table('inventory_withdrawals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'quantity' => 1,
                'stock_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            1 => 
            array (
                'id' => 2,
                'quantity' => 1,
                'stock_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            2 => 
            array (
                'id' => 3,
                'quantity' => 1,
                'stock_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            3 => 
            array (
                'id' => 4,
                'quantity' => 1,
                'stock_id' => 2,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            4 => 
            array (
                'id' => 5,
                'quantity' => 3,
                'stock_id' => 2,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            5 => 
            array (
                'id' => 6,
                'quantity' => 1,
                'stock_id' => 3,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            6 => 
            array (
                'id' => 7,
                'quantity' => 1,
                'stock_id' => 4,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            7 => 
            array (
                'id' => 8,
                'quantity' => 1,
                'stock_id' => 5,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            8 => 
            array (
                'id' => 9,
                'quantity' => 1,
                'stock_id' => 5,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            9 => 
            array (
                'id' => 10,
                'quantity' => 1,
                'stock_id' => 5,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            10 => 
            array (
                'id' => 11,
                'quantity' => 2,
                'stock_id' => 5,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            11 => 
            array (
                'id' => 12,
                'quantity' => 1,
                'stock_id' => 6,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            12 => 
            array (
                'id' => 13,
                'quantity' => 1,
                'stock_id' => 7,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            13 => 
            array (
                'id' => 14,
                'quantity' => 1,
                'stock_id' => 10,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            14 => 
            array (
                'id' => 15,
                'quantity' => 1,
                'stock_id' => 10,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            15 => 
            array (
                'id' => 16,
                'quantity' => 2,
                'stock_id' => 10,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            16 => 
            array (
                'id' => 17,
                'quantity' => 1,
                'stock_id' => 10,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            17 => 
            array (
                'id' => 18,
                'quantity' => 1,
                'stock_id' => 11,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            18 => 
            array (
                'id' => 19,
                'quantity' => 1,
                'stock_id' => 11,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            19 => 
            array (
                'id' => 20,
                'quantity' => 1,
                'stock_id' => 11,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            20 => 
            array (
                'id' => 21,
                'quantity' => 1,
                'stock_id' => 11,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            21 => 
            array (
                'id' => 22,
                'quantity' => 1,
                'stock_id' => 12,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            22 => 
            array (
                'id' => 23,
                'quantity' => 1,
                'stock_id' => 13,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            23 => 
            array (
                'id' => 24,
                'quantity' => 1,
                'stock_id' => 15,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            24 => 
            array (
                'id' => 25,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            25 => 
            array (
                'id' => 26,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            26 => 
            array (
                'id' => 27,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            27 => 
            array (
                'id' => 28,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            28 => 
            array (
                'id' => 29,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            29 => 
            array (
                'id' => 30,
                'quantity' => 1,
                'stock_id' => 17,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            30 => 
            array (
                'id' => 31,
                'quantity' => 1,
                'stock_id' => 18,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            31 => 
            array (
                'id' => 32,
                'quantity' => 1,
                'stock_id' => 18,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            32 => 
            array (
                'id' => 33,
                'quantity' => 4,
                'stock_id' => 18,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            33 => 
            array (
                'id' => 34,
                'quantity' => 1,
                'stock_id' => 18,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            34 => 
            array (
                'id' => 35,
                'quantity' => 1,
                'stock_id' => 18,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            35 => 
            array (
                'id' => 36,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            36 => 
            array (
                'id' => 37,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            37 => 
            array (
                'id' => 38,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            38 => 
            array (
                'id' => 39,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            39 => 
            array (
                'id' => 40,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            40 => 
            array (
                'id' => 41,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            41 => 
            array (
                'id' => 42,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            42 => 
            array (
                'id' => 43,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            43 => 
            array (
                'id' => 44,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            44 => 
            array (
                'id' => 45,
                'quantity' => 1,
                'stock_id' => 19,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            45 => 
            array (
                'id' => 46,
                'quantity' => 1,
                'stock_id' => 20,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            46 => 
            array (
                'id' => 47,
                'quantity' => 1,
                'stock_id' => 20,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            47 => 
            array (
                'id' => 48,
                'quantity' => 1,
                'stock_id' => 21,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:15',
                'updated_at' => '2024-07-24 11:27:15',
            ),
            48 => 
            array (
                'id' => 49,
                'quantity' => 1,
                'stock_id' => 22,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            49 => 
            array (
                'id' => 50,
                'quantity' => 1,
                'stock_id' => 23,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            50 => 
            array (
                'id' => 51,
                'quantity' => 1,
                'stock_id' => 23,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            51 => 
            array (
                'id' => 52,
                'quantity' => 1,
                'stock_id' => 23,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            52 => 
            array (
                'id' => 53,
                'quantity' => 1,
                'stock_id' => 24,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            53 => 
            array (
                'id' => 54,
                'quantity' => 7,
                'stock_id' => 30,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            54 => 
            array (
                'id' => 55,
                'quantity' => 1,
                'stock_id' => 30,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            55 => 
            array (
                'id' => 56,
                'quantity' => 1,
                'stock_id' => 31,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            56 => 
            array (
                'id' => 57,
                'quantity' => 1,
                'stock_id' => 31,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            57 => 
            array (
                'id' => 58,
                'quantity' => 1,
                'stock_id' => 31,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            58 => 
            array (
                'id' => 59,
                'quantity' => 1,
                'stock_id' => 31,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            59 => 
            array (
                'id' => 60,
                'quantity' => 1,
                'stock_id' => 32,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            60 => 
            array (
                'id' => 61,
                'quantity' => 1,
                'stock_id' => 32,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            61 => 
            array (
                'id' => 62,
                'quantity' => 1,
                'stock_id' => 33,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            62 => 
            array (
                'id' => 63,
                'quantity' => 1,
                'stock_id' => 33,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            63 => 
            array (
                'id' => 64,
                'quantity' => 1,
                'stock_id' => 33,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            64 => 
            array (
                'id' => 65,
                'quantity' => 1,
                'stock_id' => 33,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            65 => 
            array (
                'id' => 66,
                'quantity' => 1,
                'stock_id' => 34,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            66 => 
            array (
                'id' => 67,
                'quantity' => 1,
                'stock_id' => 34,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            67 => 
            array (
                'id' => 68,
                'quantity' => 1,
                'stock_id' => 35,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            68 => 
            array (
                'id' => 69,
                'quantity' => 1,
                'stock_id' => 35,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            69 => 
            array (
                'id' => 70,
                'quantity' => 1,
                'stock_id' => 37,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            70 => 
            array (
                'id' => 71,
                'quantity' => 1,
                'stock_id' => 37,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            71 => 
            array (
                'id' => 72,
                'quantity' => 1,
                'stock_id' => 37,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            72 => 
            array (
                'id' => 73,
                'quantity' => 1,
                'stock_id' => 38,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            73 => 
            array (
                'id' => 74,
                'quantity' => 1,
                'stock_id' => 38,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            74 => 
            array (
                'id' => 75,
                'quantity' => 1,
                'stock_id' => 41,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            75 => 
            array (
                'id' => 76,
                'quantity' => 5,
                'stock_id' => 41,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            76 => 
            array (
                'id' => 77,
                'quantity' => 1,
                'stock_id' => 41,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            77 => 
            array (
                'id' => 78,
                'quantity' => 1,
                'stock_id' => 41,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            78 => 
            array (
                'id' => 79,
                'quantity' => 1,
                'stock_id' => 41,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            79 => 
            array (
                'id' => 80,
                'quantity' => 2,
                'stock_id' => 42,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            80 => 
            array (
                'id' => 81,
                'quantity' => 1,
                'stock_id' => 42,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            81 => 
            array (
                'id' => 82,
                'quantity' => 1,
                'stock_id' => 43,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            82 => 
            array (
                'id' => 83,
                'quantity' => 1,
                'stock_id' => 43,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            83 => 
            array (
                'id' => 84,
                'quantity' => 1,
                'stock_id' => 43,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            84 => 
            array (
                'id' => 85,
                'quantity' => 1,
                'stock_id' => 43,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            85 => 
            array (
                'id' => 86,
                'quantity' => 1,
                'stock_id' => 44,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            86 => 
            array (
                'id' => 87,
                'quantity' => 1,
                'stock_id' => 45,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            87 => 
            array (
                'id' => 88,
                'quantity' => 1,
                'stock_id' => 45,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            88 => 
            array (
                'id' => 89,
                'quantity' => 1,
                'stock_id' => 47,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            89 => 
            array (
                'id' => 90,
                'quantity' => 1,
                'stock_id' => 47,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            90 => 
            array (
                'id' => 91,
                'quantity' => 2,
                'stock_id' => 47,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            91 => 
            array (
                'id' => 92,
                'quantity' => 1,
                'stock_id' => 47,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            92 => 
            array (
                'id' => 93,
                'quantity' => 1,
                'stock_id' => 48,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            93 => 
            array (
                'id' => 94,
                'quantity' => 1,
                'stock_id' => 48,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            94 => 
            array (
                'id' => 95,
                'quantity' => 1,
                'stock_id' => 48,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            95 => 
            array (
                'id' => 96,
                'quantity' => 1,
                'stock_id' => 49,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            96 => 
            array (
                'id' => 97,
                'quantity' => 1,
                'stock_id' => 49,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            97 => 
            array (
                'id' => 98,
                'quantity' => 1,
                'stock_id' => 49,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            98 => 
            array (
                'id' => 99,
                'quantity' => 1,
                'stock_id' => 50,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            99 => 
            array (
                'id' => 100,
                'quantity' => 1,
                'stock_id' => 50,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            100 => 
            array (
                'id' => 101,
                'quantity' => 1,
                'stock_id' => 50,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            101 => 
            array (
                'id' => 102,
                'quantity' => 1,
                'stock_id' => 51,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            102 => 
            array (
                'id' => 103,
                'quantity' => 1,
                'stock_id' => 51,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            103 => 
            array (
                'id' => 104,
                'quantity' => 1,
                'stock_id' => 52,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            104 => 
            array (
                'id' => 105,
                'quantity' => 1,
                'stock_id' => 53,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            105 => 
            array (
                'id' => 106,
                'quantity' => 1,
                'stock_id' => 54,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            106 => 
            array (
                'id' => 107,
                'quantity' => 1,
                'stock_id' => 54,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            107 => 
            array (
                'id' => 108,
                'quantity' => 3,
                'stock_id' => 54,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            108 => 
            array (
                'id' => 109,
                'quantity' => 1,
                'stock_id' => 55,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            109 => 
            array (
                'id' => 110,
                'quantity' => 1,
                'stock_id' => 55,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            110 => 
            array (
                'id' => 111,
                'quantity' => 1,
                'stock_id' => 56,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            111 => 
            array (
                'id' => 112,
                'quantity' => 1,
                'stock_id' => 57,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            112 => 
            array (
                'id' => 113,
                'quantity' => 3,
                'stock_id' => 57,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:16',
                'updated_at' => '2024-07-24 11:27:16',
            ),
            113 => 
            array (
                'id' => 114,
                'quantity' => 1,
                'stock_id' => 58,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            114 => 
            array (
                'id' => 115,
                'quantity' => 1,
                'stock_id' => 58,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            115 => 
            array (
                'id' => 116,
                'quantity' => 1,
                'stock_id' => 58,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            116 => 
            array (
                'id' => 117,
                'quantity' => 1,
                'stock_id' => 64,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            117 => 
            array (
                'id' => 118,
                'quantity' => 1,
                'stock_id' => 65,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            118 => 
            array (
                'id' => 119,
                'quantity' => 1,
                'stock_id' => 72,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            119 => 
            array (
                'id' => 120,
                'quantity' => 1,
                'stock_id' => 72,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            120 => 
            array (
                'id' => 121,
                'quantity' => 1,
                'stock_id' => 76,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            121 => 
            array (
                'id' => 122,
                'quantity' => 1,
                'stock_id' => 78,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            122 => 
            array (
                'id' => 123,
                'quantity' => 1,
                'stock_id' => 79,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            123 => 
            array (
                'id' => 124,
                'quantity' => 1,
                'stock_id' => 80,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            124 => 
            array (
                'id' => 125,
                'quantity' => 2,
                'stock_id' => 88,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            125 => 
            array (
                'id' => 126,
                'quantity' => 1,
                'stock_id' => 89,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            126 => 
            array (
                'id' => 127,
                'quantity' => 6,
                'stock_id' => 90,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            127 => 
            array (
                'id' => 128,
                'quantity' => 1,
                'stock_id' => 90,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            128 => 
            array (
                'id' => 129,
                'quantity' => 1,
                'stock_id' => 90,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            129 => 
            array (
                'id' => 130,
                'quantity' => 1,
                'stock_id' => 90,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            130 => 
            array (
                'id' => 131,
                'quantity' => 1,
                'stock_id' => 91,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            131 => 
            array (
                'id' => 132,
                'quantity' => 1,
                'stock_id' => 91,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            132 => 
            array (
                'id' => 133,
                'quantity' => 1,
                'stock_id' => 91,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            133 => 
            array (
                'id' => 134,
                'quantity' => 1,
                'stock_id' => 91,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            134 => 
            array (
                'id' => 135,
                'quantity' => 1,
                'stock_id' => 91,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            135 => 
            array (
                'id' => 136,
                'quantity' => 1,
                'stock_id' => 92,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            136 => 
            array (
                'id' => 137,
                'quantity' => 1,
                'stock_id' => 92,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            137 => 
            array (
                'id' => 138,
                'quantity' => 3,
                'stock_id' => 92,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            138 => 
            array (
                'id' => 139,
                'quantity' => 1,
                'stock_id' => 93,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            139 => 
            array (
                'id' => 140,
                'quantity' => 9,
                'stock_id' => 93,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            140 => 
            array (
                'id' => 141,
                'quantity' => 8,
                'stock_id' => 97,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            141 => 
            array (
                'id' => 142,
                'quantity' => 1,
                'stock_id' => 98,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            142 => 
            array (
                'id' => 143,
                'quantity' => 1,
                'stock_id' => 99,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            143 => 
            array (
                'id' => 144,
                'quantity' => 1,
                'stock_id' => 99,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            144 => 
            array (
                'id' => 145,
                'quantity' => 1,
                'stock_id' => 99,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            145 => 
            array (
                'id' => 146,
                'quantity' => 6,
                'stock_id' => 99,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            146 => 
            array (
                'id' => 147,
                'quantity' => 1,
                'stock_id' => 99,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            147 => 
            array (
                'id' => 148,
                'quantity' => 2,
                'stock_id' => 100,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:17',
                'updated_at' => '2024-07-24 11:27:17',
            ),
            148 => 
            array (
                'id' => 149,
                'quantity' => 4,
                'stock_id' => 106,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            149 => 
            array (
                'id' => 150,
                'quantity' => 1,
                'stock_id' => 106,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            150 => 
            array (
                'id' => 151,
                'quantity' => 1,
                'stock_id' => 107,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            151 => 
            array (
                'id' => 152,
                'quantity' => 3,
                'stock_id' => 107,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            152 => 
            array (
                'id' => 153,
                'quantity' => 3,
                'stock_id' => 108,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            153 => 
            array (
                'id' => 154,
                'quantity' => 1,
                'stock_id' => 111,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            154 => 
            array (
                'id' => 155,
                'quantity' => 1,
                'stock_id' => 114,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            155 => 
            array (
                'id' => 156,
                'quantity' => 1,
                'stock_id' => 119,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            156 => 
            array (
                'id' => 157,
                'quantity' => 1,
                'stock_id' => 120,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            157 => 
            array (
                'id' => 158,
                'quantity' => 1,
                'stock_id' => 120,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            158 => 
            array (
                'id' => 159,
                'quantity' => 1,
                'stock_id' => 121,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            159 => 
            array (
                'id' => 160,
                'quantity' => 1,
                'stock_id' => 121,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            160 => 
            array (
                'id' => 161,
                'quantity' => 1,
                'stock_id' => 123,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            161 => 
            array (
                'id' => 162,
                'quantity' => 1,
                'stock_id' => 125,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            162 => 
            array (
                'id' => 163,
                'quantity' => 1,
                'stock_id' => 125,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            163 => 
            array (
                'id' => 164,
                'quantity' => 3,
                'stock_id' => 125,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            164 => 
            array (
                'id' => 165,
                'quantity' => 1,
                'stock_id' => 126,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            165 => 
            array (
                'id' => 166,
                'quantity' => 1,
                'stock_id' => 126,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            166 => 
            array (
                'id' => 167,
                'quantity' => 3,
                'stock_id' => 126,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            167 => 
            array (
                'id' => 168,
                'quantity' => 3,
                'stock_id' => 127,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            168 => 
            array (
                'id' => 169,
                'quantity' => 1,
                'stock_id' => 128,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            169 => 
            array (
                'id' => 170,
                'quantity' => 1,
                'stock_id' => 130,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            170 => 
            array (
                'id' => 171,
                'quantity' => 4,
                'stock_id' => 130,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            171 => 
            array (
                'id' => 172,
                'quantity' => 5,
                'stock_id' => 130,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            172 => 
            array (
                'id' => 173,
                'quantity' => 1,
                'stock_id' => 131,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            173 => 
            array (
                'id' => 174,
                'quantity' => 2,
                'stock_id' => 133,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            174 => 
            array (
                'id' => 175,
                'quantity' => 1,
                'stock_id' => 134,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            175 => 
            array (
                'id' => 176,
                'quantity' => 1,
                'stock_id' => 134,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            176 => 
            array (
                'id' => 177,
                'quantity' => 2,
                'stock_id' => 135,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            177 => 
            array (
                'id' => 178,
                'quantity' => 7,
                'stock_id' => 136,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            178 => 
            array (
                'id' => 179,
                'quantity' => 7,
                'stock_id' => 137,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            179 => 
            array (
                'id' => 180,
                'quantity' => 1,
                'stock_id' => 140,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            180 => 
            array (
                'id' => 181,
                'quantity' => 1,
                'stock_id' => 141,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            181 => 
            array (
                'id' => 182,
                'quantity' => 1,
                'stock_id' => 141,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            182 => 
            array (
                'id' => 183,
                'quantity' => 1,
                'stock_id' => 141,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            183 => 
            array (
                'id' => 184,
                'quantity' => 1,
                'stock_id' => 142,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:18',
                'updated_at' => '2024-07-24 11:27:18',
            ),
            184 => 
            array (
                'id' => 185,
                'quantity' => 3,
                'stock_id' => 145,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            185 => 
            array (
                'id' => 186,
                'quantity' => 1,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            186 => 
            array (
                'id' => 187,
                'quantity' => 4,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            187 => 
            array (
                'id' => 188,
                'quantity' => 1,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            188 => 
            array (
                'id' => 189,
                'quantity' => 1,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            189 => 
            array (
                'id' => 190,
                'quantity' => 1,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            190 => 
            array (
                'id' => 191,
                'quantity' => 2,
                'stock_id' => 146,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            191 => 
            array (
                'id' => 192,
                'quantity' => 1,
                'stock_id' => 147,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            192 => 
            array (
                'id' => 193,
                'quantity' => 1,
                'stock_id' => 147,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            193 => 
            array (
                'id' => 194,
                'quantity' => 1,
                'stock_id' => 147,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            194 => 
            array (
                'id' => 195,
                'quantity' => 3,
                'stock_id' => 148,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            195 => 
            array (
                'id' => 196,
                'quantity' => 1,
                'stock_id' => 149,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            196 => 
            array (
                'id' => 197,
                'quantity' => 6,
                'stock_id' => 149,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            197 => 
            array (
                'id' => 198,
                'quantity' => 6,
                'stock_id' => 150,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            198 => 
            array (
                'id' => 199,
                'quantity' => 1,
                'stock_id' => 152,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            199 => 
            array (
                'id' => 200,
                'quantity' => 1,
                'stock_id' => 152,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            200 => 
            array (
                'id' => 201,
                'quantity' => 1,
                'stock_id' => 152,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            201 => 
            array (
                'id' => 202,
                'quantity' => 1,
                'stock_id' => 152,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            202 => 
            array (
                'id' => 203,
                'quantity' => 5,
                'stock_id' => 152,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            203 => 
            array (
                'id' => 204,
                'quantity' => 1,
                'stock_id' => 153,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            204 => 
            array (
                'id' => 205,
                'quantity' => 1,
                'stock_id' => 155,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            205 => 
            array (
                'id' => 206,
                'quantity' => 1,
                'stock_id' => 157,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            206 => 
            array (
                'id' => 207,
                'quantity' => 1,
                'stock_id' => 160,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            207 => 
            array (
                'id' => 208,
                'quantity' => 1,
                'stock_id' => 162,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            208 => 
            array (
                'id' => 209,
                'quantity' => 1,
                'stock_id' => 163,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            209 => 
            array (
                'id' => 210,
                'quantity' => 1,
                'stock_id' => 164,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            210 => 
            array (
                'id' => 211,
                'quantity' => 1,
                'stock_id' => 165,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            211 => 
            array (
                'id' => 212,
                'quantity' => 1,
                'stock_id' => 166,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            212 => 
            array (
                'id' => 213,
                'quantity' => 1,
                'stock_id' => 168,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            213 => 
            array (
                'id' => 214,
                'quantity' => 1,
                'stock_id' => 169,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            214 => 
            array (
                'id' => 215,
                'quantity' => 1,
                'stock_id' => 170,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            215 => 
            array (
                'id' => 216,
                'quantity' => 1,
                'stock_id' => 173,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            216 => 
            array (
                'id' => 217,
                'quantity' => 1,
                'stock_id' => 174,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            217 => 
            array (
                'id' => 218,
                'quantity' => 2,
                'stock_id' => 176,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            218 => 
            array (
                'id' => 219,
                'quantity' => 2,
                'stock_id' => 176,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            219 => 
            array (
                'id' => 220,
                'quantity' => 2,
                'stock_id' => 177,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            220 => 
            array (
                'id' => 221,
                'quantity' => 1,
                'stock_id' => 179,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            221 => 
            array (
                'id' => 222,
                'quantity' => 1,
                'stock_id' => 182,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            222 => 
            array (
                'id' => 223,
                'quantity' => 2,
                'stock_id' => 183,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            223 => 
            array (
                'id' => 224,
                'quantity' => 1,
                'stock_id' => 185,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            224 => 
            array (
                'id' => 225,
                'quantity' => 1,
                'stock_id' => 185,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            225 => 
            array (
                'id' => 226,
                'quantity' => 1,
                'stock_id' => 189,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            226 => 
            array (
                'id' => 227,
                'quantity' => 1,
                'stock_id' => 190,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            227 => 
            array (
                'id' => 228,
                'quantity' => 1,
                'stock_id' => 191,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:19',
                'updated_at' => '2024-07-24 11:27:19',
            ),
            228 => 
            array (
                'id' => 229,
                'quantity' => 1,
                'stock_id' => 192,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            229 => 
            array (
                'id' => 230,
                'quantity' => 1,
                'stock_id' => 193,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            230 => 
            array (
                'id' => 231,
                'quantity' => 2,
                'stock_id' => 195,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            231 => 
            array (
                'id' => 232,
                'quantity' => 1,
                'stock_id' => 195,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            232 => 
            array (
                'id' => 233,
                'quantity' => 1,
                'stock_id' => 195,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            233 => 
            array (
                'id' => 234,
                'quantity' => 1,
                'stock_id' => 196,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            234 => 
            array (
                'id' => 235,
                'quantity' => 1,
                'stock_id' => 196,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            235 => 
            array (
                'id' => 236,
                'quantity' => 5,
                'stock_id' => 197,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            236 => 
            array (
                'id' => 237,
                'quantity' => 1,
                'stock_id' => 200,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            237 => 
            array (
                'id' => 238,
                'quantity' => 1,
                'stock_id' => 200,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            238 => 
            array (
                'id' => 239,
                'quantity' => 1,
                'stock_id' => 201,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            239 => 
            array (
                'id' => 240,
                'quantity' => 1,
                'stock_id' => 202,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            240 => 
            array (
                'id' => 241,
                'quantity' => 1,
                'stock_id' => 202,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            241 => 
            array (
                'id' => 242,
                'quantity' => 1,
                'stock_id' => 203,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            242 => 
            array (
                'id' => 243,
                'quantity' => 4,
                'stock_id' => 203,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            243 => 
            array (
                'id' => 244,
                'quantity' => 1,
                'stock_id' => 206,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            244 => 
            array (
                'id' => 245,
                'quantity' => 1,
                'stock_id' => 206,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            245 => 
            array (
                'id' => 246,
                'quantity' => 1,
                'stock_id' => 207,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            246 => 
            array (
                'id' => 247,
                'quantity' => 2,
                'stock_id' => 213,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            247 => 
            array (
                'id' => 248,
                'quantity' => 1,
                'stock_id' => 213,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            248 => 
            array (
                'id' => 249,
                'quantity' => 1,
                'stock_id' => 213,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            249 => 
            array (
                'id' => 250,
                'quantity' => 2,
                'stock_id' => 213,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            250 => 
            array (
                'id' => 251,
                'quantity' => 2,
                'stock_id' => 214,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            251 => 
            array (
                'id' => 252,
                'quantity' => 1,
                'stock_id' => 214,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            252 => 
            array (
                'id' => 253,
                'quantity' => 2,
                'stock_id' => 214,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            253 => 
            array (
                'id' => 254,
                'quantity' => 1,
                'stock_id' => 214,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            254 => 
            array (
                'id' => 255,
                'quantity' => 1,
                'stock_id' => 215,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            255 => 
            array (
                'id' => 256,
                'quantity' => 1,
                'stock_id' => 215,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            256 => 
            array (
                'id' => 257,
                'quantity' => 4,
                'stock_id' => 215,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            257 => 
            array (
                'id' => 258,
                'quantity' => 1,
                'stock_id' => 216,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            258 => 
            array (
                'id' => 259,
                'quantity' => 3,
                'stock_id' => 216,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            259 => 
            array (
                'id' => 260,
                'quantity' => 5,
                'stock_id' => 217,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            260 => 
            array (
                'id' => 261,
                'quantity' => 1,
                'stock_id' => 217,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            261 => 
            array (
                'id' => 262,
                'quantity' => 1,
                'stock_id' => 218,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            262 => 
            array (
                'id' => 263,
                'quantity' => 5,
                'stock_id' => 218,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            263 => 
            array (
                'id' => 264,
                'quantity' => 2,
                'stock_id' => 220,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            264 => 
            array (
                'id' => 265,
                'quantity' => 1,
                'stock_id' => 221,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            265 => 
            array (
                'id' => 266,
                'quantity' => 1,
                'stock_id' => 221,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            266 => 
            array (
                'id' => 267,
                'quantity' => 1,
                'stock_id' => 228,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            267 => 
            array (
                'id' => 268,
                'quantity' => 1,
                'stock_id' => 229,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            268 => 
            array (
                'id' => 269,
                'quantity' => 1,
                'stock_id' => 230,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            269 => 
            array (
                'id' => 270,
                'quantity' => 1,
                'stock_id' => 231,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            270 => 
            array (
                'id' => 271,
                'quantity' => 1,
                'stock_id' => 232,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            271 => 
            array (
                'id' => 272,
                'quantity' => 1,
                'stock_id' => 235,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            272 => 
            array (
                'id' => 273,
                'quantity' => 1,
                'stock_id' => 236,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            273 => 
            array (
                'id' => 274,
                'quantity' => 1,
                'stock_id' => 237,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            274 => 
            array (
                'id' => 275,
                'quantity' => 1,
                'stock_id' => 238,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            275 => 
            array (
                'id' => 276,
                'quantity' => 1,
                'stock_id' => 239,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            276 => 
            array (
                'id' => 277,
                'quantity' => 1,
                'stock_id' => 246,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            277 => 
            array (
                'id' => 278,
                'quantity' => 2,
                'stock_id' => 246,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            278 => 
            array (
                'id' => 279,
                'quantity' => 1,
                'stock_id' => 246,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            279 => 
            array (
                'id' => 280,
                'quantity' => 1,
                'stock_id' => 247,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            280 => 
            array (
                'id' => 281,
                'quantity' => 1,
                'stock_id' => 247,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            281 => 
            array (
                'id' => 282,
                'quantity' => 6,
                'stock_id' => 248,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            282 => 
            array (
                'id' => 283,
                'quantity' => 1,
                'stock_id' => 249,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            283 => 
            array (
                'id' => 284,
                'quantity' => 4,
                'stock_id' => 249,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:20',
                'updated_at' => '2024-07-24 11:27:20',
            ),
            284 => 
            array (
                'id' => 285,
                'quantity' => 1,
                'stock_id' => 261,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            285 => 
            array (
                'id' => 286,
                'quantity' => 1,
                'stock_id' => 267,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            286 => 
            array (
                'id' => 287,
                'quantity' => 1,
                'stock_id' => 267,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            287 => 
            array (
                'id' => 288,
                'quantity' => 1,
                'stock_id' => 268,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            288 => 
            array (
                'id' => 289,
                'quantity' => 1,
                'stock_id' => 271,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            289 => 
            array (
                'id' => 290,
                'quantity' => 3,
                'stock_id' => 271,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            290 => 
            array (
                'id' => 291,
                'quantity' => 1,
                'stock_id' => 271,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            291 => 
            array (
                'id' => 292,
                'quantity' => 3,
                'stock_id' => 272,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            292 => 
            array (
                'id' => 293,
                'quantity' => 2,
                'stock_id' => 272,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            293 => 
            array (
                'id' => 294,
                'quantity' => 5,
                'stock_id' => 273,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            294 => 
            array (
                'id' => 295,
                'quantity' => 4,
                'stock_id' => 276,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            295 => 
            array (
                'id' => 296,
                'quantity' => 2,
                'stock_id' => 277,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            296 => 
            array (
                'id' => 297,
                'quantity' => 2,
                'stock_id' => 278,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            297 => 
            array (
                'id' => 298,
                'quantity' => 1,
                'stock_id' => 279,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            298 => 
            array (
                'id' => 299,
                'quantity' => 1,
                'stock_id' => 279,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            299 => 
            array (
                'id' => 300,
                'quantity' => 1,
                'stock_id' => 280,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            300 => 
            array (
                'id' => 301,
                'quantity' => 5,
                'stock_id' => 280,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            301 => 
            array (
                'id' => 302,
                'quantity' => 1,
                'stock_id' => 294,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            302 => 
            array (
                'id' => 303,
                'quantity' => 1,
                'stock_id' => 295,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            303 => 
            array (
                'id' => 304,
                'quantity' => 1,
                'stock_id' => 297,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            304 => 
            array (
                'id' => 305,
                'quantity' => 1,
                'stock_id' => 298,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            305 => 
            array (
                'id' => 306,
                'quantity' => 1,
                'stock_id' => 299,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            306 => 
            array (
                'id' => 307,
                'quantity' => 1,
                'stock_id' => 305,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:21',
                'updated_at' => '2024-07-24 11:27:21',
            ),
            307 => 
            array (
                'id' => 308,
                'quantity' => 1,
                'stock_id' => 324,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:22',
                'updated_at' => '2024-07-24 11:27:22',
            ),
            308 => 
            array (
                'id' => 309,
                'quantity' => 1,
                'stock_id' => 325,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:22',
                'updated_at' => '2024-07-24 11:27:22',
            ),
            309 => 
            array (
                'id' => 310,
                'quantity' => 1,
                'stock_id' => 325,
                'user_id' => 1,
                'created_at' => '2024-07-24 11:27:22',
                'updated_at' => '2024-07-24 11:27:22',
            ),
        ));

        
    }
}