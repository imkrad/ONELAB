<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TsrGroupsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tsr_groups')->delete();
        
        \DB::table('tsr_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'days' => 0,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 359,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:07:01',
            ),
            1 => 
            array (
                'id' => 2,
                'days' => 0,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 372,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:07:01',
            ),
            2 => 
            array (
                'id' => 3,
                'days' => 0,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:07:01',
            ),
            3 => 
            array (
                'id' => 4,
                'days' => 0,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 24,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:26:52',
            ),
            4 => 
            array (
                'id' => 5,
                'days' => 0,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 24,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:26:52',
            ),
            5 => 
            array (
                'id' => 6,
                'days' => 0,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 24,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-05-20',
                'created_at' => '2024-08-22 09:07:59',
                'updated_at' => '2024-08-28 13:26:52',
            ),
            6 => 
            array (
                'id' => 7,
                'days' => 30,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-06-19',
                'created_at' => '2024-08-22 09:21:10',
                'updated_at' => '2024-08-28 13:30:12',
            ),
            7 => 
            array (
                'id' => 8,
                'days' => 30,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-06-19',
                'created_at' => '2024-08-22 09:21:10',
                'updated_at' => '2024-08-28 13:30:12',
            ),
            8 => 
            array (
                'id' => 9,
                'days' => 30,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 24,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-06-19',
                'created_at' => '2024-08-22 09:21:10',
                'updated_at' => '2024-08-28 13:35:00',
            ),
            9 => 
            array (
                'id' => 10,
                'days' => 30,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 24,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-06-19',
                'created_at' => '2024-08-22 09:21:10',
                'updated_at' => '2024-08-28 13:35:00',
            ),
            10 => 
            array (
                'id' => 11,
                'days' => 30,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 24,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-06-19',
                'created_at' => '2024-08-22 09:21:10',
                'updated_at' => '2024-08-28 13:35:00',
            ),
            11 => 
            array (
                'id' => 12,
                'days' => 60,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-07-19',
                'created_at' => '2024-08-22 09:49:30',
                'updated_at' => '2024-08-28 13:45:56',
            ),
            12 => 
            array (
                'id' => 13,
                'days' => 60,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 24,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-07-19',
                'created_at' => '2024-08-22 09:49:30',
                'updated_at' => '2024-08-28 13:45:56',
            ),
            13 => 
            array (
                'id' => 14,
                'days' => 60,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 24,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-07-19',
                'created_at' => '2024-08-22 09:49:30',
                'updated_at' => '2024-08-28 13:41:12',
            ),
            14 => 
            array (
                'id' => 15,
                'days' => 60,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 24,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-07-19',
                'created_at' => '2024-08-22 09:49:30',
                'updated_at' => '2024-08-28 13:41:12',
            ),
            15 => 
            array (
                'id' => 16,
                'days' => 60,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 24,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-07-19',
                'created_at' => '2024-08-22 09:49:30',
                'updated_at' => '2024-08-28 13:41:12',
            ),
            16 => 
            array (
                'id' => 17,
                'days' => 90,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 24,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-08-18',
                'created_at' => '2024-08-22 10:09:11',
                'updated_at' => '2024-08-28 15:15:12',
            ),
            17 => 
            array (
                'id' => 18,
                'days' => 90,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 24,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-08-18',
                'created_at' => '2024-08-22 10:09:11',
                'updated_at' => '2024-08-28 15:15:12',
            ),
            18 => 
            array (
                'id' => 19,
                'days' => 90,
                'quantity' => 2,
                'fee' => '168.00',
                'total' => '336.00',
                'status_id' => 24,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-08-18',
                'created_at' => '2024-08-22 10:10:00',
                'updated_at' => '2024-08-28 15:22:54',
            ),
            19 => 
            array (
                'id' => 20,
                'days' => 90,
                'quantity' => 2,
                'fee' => '560.00',
                'total' => '1120.00',
                'status_id' => 24,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-08-18',
                'created_at' => '2024-08-22 10:10:00',
                'updated_at' => '2024-08-28 15:22:54',
            ),
            20 => 
            array (
                'id' => 21,
                'days' => 90,
                'quantity' => 2,
                'fee' => '325.00',
                'total' => '650.00',
                'status_id' => 24,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-08-18',
                'created_at' => '2024-08-22 10:10:00',
                'updated_at' => '2024-08-28 15:22:54',
            ),
            21 => 
            array (
                'id' => 22,
                'days' => 105,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-09-02',
                'created_at' => '2024-08-22 10:12:06',
                'updated_at' => '2024-08-22 10:12:06',
            ),
            22 => 
            array (
                'id' => 23,
                'days' => 105,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-09-02',
                'created_at' => '2024-08-22 10:12:06',
                'updated_at' => '2024-08-22 10:12:06',
            ),
            23 => 
            array (
                'id' => 24,
                'days' => 105,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-09-02',
                'created_at' => '2024-08-22 10:12:06',
                'updated_at' => '2024-08-22 10:12:06',
            ),
            24 => 
            array (
                'id' => 25,
                'days' => 105,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-09-02',
                'created_at' => '2024-08-22 10:12:06',
                'updated_at' => '2024-08-22 10:12:06',
            ),
            25 => 
            array (
                'id' => 26,
                'days' => 105,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-09-02',
                'created_at' => '2024-08-22 10:12:06',
                'updated_at' => '2024-08-22 10:12:06',
            ),
            26 => 
            array (
                'id' => 27,
                'days' => 120,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-09-17',
                'created_at' => '2024-08-22 10:15:09',
                'updated_at' => '2024-08-22 10:15:09',
            ),
            27 => 
            array (
                'id' => 28,
                'days' => 120,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-09-17',
                'created_at' => '2024-08-22 10:15:09',
                'updated_at' => '2024-08-22 10:15:09',
            ),
            28 => 
            array (
                'id' => 29,
                'days' => 120,
                'quantity' => 2,
                'fee' => '168.00',
                'total' => '336.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-09-17',
                'created_at' => '2024-08-22 10:15:09',
                'updated_at' => '2024-08-22 10:15:09',
            ),
            29 => 
            array (
                'id' => 30,
                'days' => 120,
                'quantity' => 2,
                'fee' => '560.00',
                'total' => '1120.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-09-17',
                'created_at' => '2024-08-22 10:15:09',
                'updated_at' => '2024-08-22 10:15:09',
            ),
            30 => 
            array (
                'id' => 31,
                'days' => 120,
                'quantity' => 2,
                'fee' => '325.00',
                'total' => '650.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-09-17',
                'created_at' => '2024-08-22 10:15:09',
                'updated_at' => '2024-08-22 10:15:09',
            ),
            31 => 
            array (
                'id' => 32,
                'days' => 135,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-10-02',
                'created_at' => '2024-08-22 10:18:20',
                'updated_at' => '2024-08-22 10:18:20',
            ),
            32 => 
            array (
                'id' => 33,
                'days' => 135,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-10-02',
                'created_at' => '2024-08-22 10:18:20',
                'updated_at' => '2024-08-22 10:18:20',
            ),
            33 => 
            array (
                'id' => 34,
                'days' => 135,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-10-02',
                'created_at' => '2024-08-22 10:18:20',
                'updated_at' => '2024-08-22 10:18:20',
            ),
            34 => 
            array (
                'id' => 35,
                'days' => 135,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-10-02',
                'created_at' => '2024-08-22 10:18:20',
                'updated_at' => '2024-08-22 10:18:20',
            ),
            35 => 
            array (
                'id' => 36,
                'days' => 135,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-10-02',
                'created_at' => '2024-08-22 10:18:20',
                'updated_at' => '2024-08-22 10:18:20',
            ),
            36 => 
            array (
                'id' => 37,
                'days' => 150,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-10-07',
                'created_at' => '2024-08-22 10:40:41',
                'updated_at' => '2024-08-22 10:40:41',
            ),
            37 => 
            array (
                'id' => 38,
                'days' => 150,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-10-07',
                'created_at' => '2024-08-22 10:40:41',
                'updated_at' => '2024-08-22 10:40:41',
            ),
            38 => 
            array (
                'id' => 39,
                'days' => 150,
                'quantity' => 2,
                'fee' => '168.00',
                'total' => '336.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-10-07',
                'created_at' => '2024-08-22 10:40:41',
                'updated_at' => '2024-08-22 10:40:41',
            ),
            39 => 
            array (
                'id' => 40,
                'days' => 150,
                'quantity' => 2,
                'fee' => '560.00',
                'total' => '1120.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-10-07',
                'created_at' => '2024-08-22 10:40:41',
                'updated_at' => '2024-08-22 10:40:41',
            ),
            40 => 
            array (
                'id' => 41,
                'days' => 150,
                'quantity' => 2,
                'fee' => '325.00',
                'total' => '650.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-10-07',
                'created_at' => '2024-08-22 10:40:41',
                'updated_at' => '2024-08-22 10:40:41',
            ),
            41 => 
            array (
                'id' => 42,
                'days' => 165,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-11-01',
                'created_at' => '2024-08-22 10:41:41',
                'updated_at' => '2024-08-22 10:41:41',
            ),
            42 => 
            array (
                'id' => 43,
                'days' => 165,
                'quantity' => 1,
                'fee' => '550.00',
                'total' => '550.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-11-01',
                'created_at' => '2024-08-22 10:41:41',
                'updated_at' => '2024-08-22 10:41:41',
            ),
            43 => 
            array (
                'id' => 44,
                'days' => 165,
                'quantity' => 1,
                'fee' => '168.00',
                'total' => '168.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-11-01',
                'created_at' => '2024-08-22 10:41:41',
                'updated_at' => '2024-08-22 10:41:41',
            ),
            44 => 
            array (
                'id' => 45,
                'days' => 165,
                'quantity' => 1,
                'fee' => '560.00',
                'total' => '560.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-11-01',
                'created_at' => '2024-08-22 10:41:41',
                'updated_at' => '2024-08-22 10:41:41',
            ),
            45 => 
            array (
                'id' => 46,
                'days' => 165,
                'quantity' => 1,
                'fee' => '325.00',
                'total' => '325.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-11-01',
                'created_at' => '2024-08-22 10:41:41',
                'updated_at' => '2024-08-22 10:41:41',
            ),
            46 => 
            array (
                'id' => 47,
                'days' => 180,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 366,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
            47 => 
            array (
                'id' => 48,
                'days' => 180,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 373,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
            48 => 
            array (
                'id' => 49,
                'days' => 180,
                'quantity' => 2,
                'fee' => '550.00',
                'total' => '1100.00',
                'status_id' => 23,
                'testservice_id' => 372,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
            49 => 
            array (
                'id' => 50,
                'days' => 180,
                'quantity' => 2,
                'fee' => '168.00',
                'total' => '336.00',
                'status_id' => 23,
                'testservice_id' => 141,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
            50 => 
            array (
                'id' => 51,
                'days' => 180,
                'quantity' => 2,
                'fee' => '560.00',
                'total' => '1120.00',
                'status_id' => 23,
                'testservice_id' => 7,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
            51 => 
            array (
                'id' => 52,
                'days' => 180,
                'quantity' => 2,
                'fee' => '325.00',
                'total' => '650.00',
                'status_id' => 23,
                'testservice_id' => 8,
                'tsr_id' => 91,
                'date' => '2024-11-16',
                'created_at' => '2024-08-22 10:43:00',
                'updated_at' => '2024-08-22 10:43:00',
            ),
        ));

        
    }
}