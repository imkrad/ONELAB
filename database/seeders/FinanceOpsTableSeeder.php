<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceOpsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_ops')->delete();
        
        \DB::table('finance_ops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '2024-08-0778',
                'total' => '10750.00',
                'status_id' => 7,
                'collection_id' => 25,
                'payment_id' => 18,
                'payorable_id' => 93,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-16 09:03:00',
                'updated_at' => '2024-08-16 09:10:25',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '2024-08-0770',
                'total' => '2200.00',
                'status_id' => 7,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 48,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-16 09:40:50',
                'updated_at' => '2024-08-17 17:53:04',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '2024-08-0773',
                'total' => '1650.00',
                'status_id' => 7,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 99,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:26:49',
                'updated_at' => '2024-08-17 17:54:05',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '2024-08-0774',
                'total' => '600.00',
                'status_id' => 7,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 95,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:29:11',
                'updated_at' => '2024-08-17 17:54:39',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '2024-08-0775',
                'total' => '500.00',
                'status_id' => 7,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 100,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:30:26',
                'updated_at' => '2024-08-17 17:54:53',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '     
2024-08-0776',
                'total' => '2400.00',
                'status_id' => 7,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 98,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:31:31',
                'updated_at' => '2024-08-17 17:55:06',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => '     
2024-08-0777',
                'total' => '2400.00',
                'status_id' => 7,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 97,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:32:28',
                'updated_at' => '2024-08-17 17:55:28',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => '2024-08-0779',
                'total' => '1000.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 94,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:34:50',
                'updated_at' => '2024-08-17 17:34:50',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => '2024-08-0780',
                'total' => '1000.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 101,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:35:36',
                'updated_at' => '2024-08-17 17:35:36',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => '2024-08-0781',
                'total' => '2000.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 29,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:35:53',
                'updated_at' => '2024-08-17 17:35:53',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => '2024-08-0782',
                'total' => '3100.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 49,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:36:19',
                'updated_at' => '2024-08-17 17:36:19',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => '2024-08-0783',
                'total' => '850.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 102,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:37:08',
                'updated_at' => '2024-08-17 17:37:08',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => '2024-08-0784',
                'total' => '9300.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 124,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:38:22',
                'updated_at' => '2024-08-17 17:38:22',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => '2024-08-0785',
                'total' => '21420.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 104,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:38:43',
                'updated_at' => '2024-08-17 17:38:43',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => '2024-08-0786',
                'total' => '2100.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 126,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:39:02',
                'updated_at' => '2024-08-17 17:39:02',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => '2024-08-0787',
                'total' => '2500.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 43,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:39:20',
                'updated_at' => '2024-08-17 17:39:20',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => '2024-08-0788',
                'total' => '20900.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 105,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:39:41',
                'updated_at' => '2024-08-17 17:39:41',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => '2024-08-0789',
                'total' => '6000.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 18,
                'payorable_id' => 26,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:40:13',
                'updated_at' => '2024-08-17 17:40:13',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => '2024-08-0790',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 107,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:40:40',
                'updated_at' => '2024-08-17 17:40:40',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => '2024-08-0791',
                'total' => '7100.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 18,
                'payorable_id' => 125,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:41:23',
                'updated_at' => '2024-08-17 17:41:23',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => '2024-08-0792',
                'total' => '4000.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 108,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:41:39',
                'updated_at' => '2024-08-17 17:41:39',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => '2024-08-0793',
                'total' => '7920.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 52,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:41:57',
                'updated_at' => '2024-08-17 17:41:57',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => '2024-08-0794',
                'total' => '500.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 109,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:43:10',
                'updated_at' => '2024-08-17 17:43:10',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => '2024-08-0795',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 110,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:43:26',
                'updated_at' => '2024-08-17 17:43:26',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => '2024-08-0796',
                'total' => '800.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 65,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:43:38',
                'updated_at' => '2024-08-17 17:43:38',
            ),
            25 => 
            array (
                'id' => 26,
                'code' => '2024-08-0797',
                'total' => '8612.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 103,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:43:53',
                'updated_at' => '2024-08-17 17:43:53',
            ),
            26 => 
            array (
                'id' => 27,
                'code' => '2024-08-0798',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 112,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:44:19',
                'updated_at' => '2024-08-17 17:44:19',
            ),
            27 => 
            array (
                'id' => 28,
                'code' => '2024-08-0799',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 113,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:44:36',
                'updated_at' => '2024-08-17 17:44:36',
            ),
            28 => 
            array (
                'id' => 29,
                'code' => '2024-08-0800',
                'total' => '4650.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 114,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:44:55',
                'updated_at' => '2024-08-17 17:44:55',
            ),
            29 => 
            array (
                'id' => 30,
                'code' => '2024-08-0801',
                'total' => '7950.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 18,
                'payorable_id' => 3,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:45:16',
                'updated_at' => '2024-08-17 17:45:16',
            ),
            30 => 
            array (
                'id' => 31,
                'code' => '2024-08-0802',
                'total' => '500.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 116,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:45:33',
                'updated_at' => '2024-08-17 17:45:33',
            ),
            31 => 
            array (
                'id' => 32,
                'code' => '2024-08-0803',
                'total' => '1750.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 111,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:45:47',
                'updated_at' => '2024-08-17 17:45:47',
            ),
            32 => 
            array (
                'id' => 33,
                'code' => '2024-08-0804',
                'total' => '900.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 117,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:46:48',
                'updated_at' => '2024-08-17 17:46:48',
            ),
            33 => 
            array (
                'id' => 34,
                'code' => '2024-08-0805',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 118,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:47:05',
                'updated_at' => '2024-08-17 17:47:05',
            ),
            34 => 
            array (
                'id' => 35,
                'code' => '2024-08-0806',
                'total' => '6920.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 99,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:47:22',
                'updated_at' => '2024-08-17 17:47:22',
            ),
            35 => 
            array (
                'id' => 36,
                'code' => '2024-08-0807',
                'total' => '1500.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 37,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:47:37',
                'updated_at' => '2024-08-17 17:47:37',
            ),
            36 => 
            array (
                'id' => 37,
                'code' => '2024-08-0808',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 115,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:47:52',
                'updated_at' => '2024-08-17 17:47:52',
            ),
            37 => 
            array (
                'id' => 38,
                'code' => '2024-08-0809',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 121,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:48:12',
                'updated_at' => '2024-08-17 17:48:12',
            ),
            38 => 
            array (
                'id' => 39,
                'code' => '2024-08-0810',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 119,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:48:31',
                'updated_at' => '2024-08-17 17:48:31',
            ),
            39 => 
            array (
                'id' => 40,
                'code' => '2024-08-0811',
                'total' => '1550.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 120,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:48:42',
                'updated_at' => '2024-08-17 17:48:42',
            ),
            40 => 
            array (
                'id' => 41,
                'code' => '2024-08-0812',
                'total' => '550.00',
                'status_id' => 6,
                'collection_id' => 25,
                'payment_id' => 17,
                'payorable_id' => 35,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:49:01',
                'updated_at' => '2024-08-17 17:49:01',
            ),
            41 => 
            array (
                'id' => 42,
                'code' => '2024-08-0813',
                'total' => '500.00',
                'status_id' => 6,
                'collection_id' => 24,
                'payment_id' => 17,
                'payorable_id' => 123,
                'payorable_type' => 'App\Models\Customer',
                'created_by' => 4,
                'laboratory_id' => 14,
                'created_at' => '2024-08-17 17:49:16',
                'updated_at' => '2024-08-17 17:49:16',
            ),
        ));

        
    }
}