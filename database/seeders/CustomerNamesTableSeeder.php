<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerNamesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_names')->delete();
        
        \DB::table('customer_names')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Puting Manok Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 13:35:41',
                'updated_at' => '2024-07-30 13:35:41',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Crustacean Trading Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 13:48:15',
                'updated_at' => '2024-07-30 13:48:15',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'UPLB Foundation, Inc.',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 13:57:10',
                'updated_at' => '2024-07-30 13:57:10',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'City Health Office',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:02:23',
                'updated_at' => '2024-07-30 14:02:23',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Zamboanga City Medical Center',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:05:08',
                'updated_at' => '2024-07-30 14:05:08',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'DOSTIX',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:08:45',
                'updated_at' => '2024-07-30 14:08:45',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Ipil Doctors Hospital',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:12:39',
                'updated_at' => '2024-07-30 14:12:39',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'Southwest Asian Canning Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:24:37',
                'updated_at' => '2024-07-30 14:24:37',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'TC International Seafoods Provider, Inc.',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:27:56',
                'updated_at' => '2024-07-30 14:27:56',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'Dr. Henry M. De Villa Memorial Hospital',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:31:01',
                'updated_at' => '2024-07-30 14:31:01',
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'ML Manufacturing & Enterprises',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:55:55',
                'updated_at' => '2024-07-30 14:55:55',
            ),
            11 => 
            array (
                'id' => 15,
                'name' => 'LGU',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 14:58:27',
                'updated_at' => '2024-07-30 14:58:27',
            ),
            12 => 
            array (
                'id' => 16,
                'name' => 'Z.C. Victory Fishing Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:00:14',
                'updated_at' => '2024-07-30 15:00:14',
            ),
            13 => 
            array (
                'id' => 17,
                'name' => 'National Food Authority',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:02:14',
                'updated_at' => '2024-07-30 15:02:14',
            ),
            14 => 
            array (
                'id' => 18,
                'name' => 'ANZZ Pharmacy',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:03:40',
                'updated_at' => '2024-07-30 15:03:40',
            ),
            15 => 
            array (
                'id' => 19,
                'name' => 'ZC E & L Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:05:39',
                'updated_at' => '2024-07-30 15:05:39',
            ),
            16 => 
            array (
                'id' => 20,
                'name' => 'Southern Philippine Trucking',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:08:30',
                'updated_at' => '2024-07-30 15:08:30',
            ),
            17 => 
            array (
                'id' => 21,
                'name' => 'Usman D. Alfaro',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:11:24',
                'updated_at' => '2024-07-30 15:11:24',
            ),
            18 => 
            array (
                'id' => 22,
                'name' => 'Zambasulta Seaweeds Trading',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:13:55',
                'updated_at' => '2024-07-30 15:13:55',
            ),
            19 => 
            array (
                'id' => 23,
                'name' => 'Aquatic Food Manufacturing Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:16:22',
                'updated_at' => '2024-07-30 15:16:22',
            ),
            20 => 
            array (
                'id' => 24,
                'name' => 'Zamboanga Carrageenan Manufacturing Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:17:55',
                'updated_at' => '2024-07-30 15:17:55',
            ),
            21 => 
            array (
                'id' => 25,
                'name' => 'Four-M Gas Station',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:20:39',
                'updated_at' => '2024-07-30 15:20:39',
            ),
            22 => 
            array (
                'id' => 26,
                'name' => 'Permex Producer & Exporter Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:23:05',
                'updated_at' => '2024-07-30 15:23:05',
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'China Wuyi Co., Ltd',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:25:53',
                'updated_at' => '2024-07-30 15:25:53',
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'Zamboanga Maritime Training Center, Inc.',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:28:12',
                'updated_at' => '2024-07-30 15:28:12',
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'Agromar Enterprises',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:30:29',
                'updated_at' => '2024-07-30 15:30:29',
            ),
            26 => 
            array (
                'id' => 30,
                'name' => 'Pryce Gases Inc.',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:32:52',
                'updated_at' => '2024-07-30 15:32:52',
            ),
            27 => 
            array (
                'id' => 31,
                'name' => 'Petron Centenarian Gas Station',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:34:51',
                'updated_at' => '2024-07-30 15:34:51',
            ),
            28 => 
            array (
                'id' => 32,
                'name' => 'Commision on Audit',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:40:12',
                'updated_at' => '2024-07-30 15:40:12',
            ),
            29 => 
            array (
                'id' => 33,
                'name' => 'JGW Fuel',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:42:45',
                'updated_at' => '2024-07-30 15:42:45',
            ),
            30 => 
            array (
                'id' => 34,
                'name' => 'Philippine Carabao Center',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:46:18',
                'updated_at' => '2024-07-30 15:46:18',
            ),
            31 => 
            array (
                'id' => 35,
                'name' => 'Rockspring Water Refilling Station',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:47:49',
                'updated_at' => '2024-07-30 15:47:49',
            ),
            32 => 
            array (
                'id' => 36,
                'name' => 'Nahla Pharmacy',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:49:30',
                'updated_at' => '2024-07-30 15:49:30',
            ),
            33 => 
            array (
                'id' => 37,
                'name' => 'Bueno Pizza House Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:52:41',
                'updated_at' => '2024-07-30 15:52:41',
            ),
            34 => 
            array (
                'id' => 38,
                'name' => 'Fresh Pizza Food Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:55:53',
                'updated_at' => '2024-07-30 15:55:53',
            ),
            35 => 
            array (
                'id' => 39,
                'name' => 'Jecomy Gas Station',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 15:59:51',
                'updated_at' => '2024-07-30 15:59:51',
            ),
            36 => 
            array (
                'id' => 40,
                'name' => 'Three L and Sons Group of Companies',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:11:41',
                'updated_at' => '2024-07-30 16:11:41',
            ),
            37 => 
            array (
                'id' => 41,
                'name' => 'Health Center',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:13:23',
                'updated_at' => '2024-07-30 16:13:23',
            ),
            38 => 
            array (
                'id' => 42,
                'name' => 'Vicente T. Lao Construction',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:15:08',
                'updated_at' => '2024-07-30 16:15:08',
            ),
            39 => 
            array (
                'id' => 43,
                'name' => 'Lagitik Water Distribution Resources',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:16:59',
                'updated_at' => '2024-07-30 16:16:59',
            ),
            40 => 
            array (
                'id' => 44,
                'name' => 'Marcel Trading Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:20:12',
                'updated_at' => '2024-07-30 16:20:12',
            ),
            41 => 
            array (
                'id' => 45,
                'name' => 'Casa Canelar Pension',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:23:56',
                'updated_at' => '2024-07-30 16:23:56',
            ),
            42 => 
            array (
                'id' => 46,
                'name' => 'Zamboanga GNS Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:25:43',
                'updated_at' => '2024-07-30 16:25:43',
            ),
            43 => 
            array (
                'id' => 47,
                'name' => 'Super Royale Seafoods International Incorporated',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:27:32',
                'updated_at' => '2024-07-30 16:27:32',
            ),
            44 => 
            array (
                'id' => 48,
                'name' => 'Standard Measuring Instrument Calibration Services',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:29:49',
                'updated_at' => '2024-07-30 16:29:49',
            ),
            45 => 
            array (
                'id' => 49,
                'name' => 'Pick and Go',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:34:00',
                'updated_at' => '2024-07-30 16:34:00',
            ),
            46 => 
            array (
                'id' => 50,
                'name' => 'Isabela City Community Hospital, Inc.',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:35:34',
                'updated_at' => '2024-07-30 16:35:34',
            ),
            47 => 
            array (
                'id' => 51,
                'name' => 'AAJ Hauling Services',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:36:48',
                'updated_at' => '2024-07-30 16:36:48',
            ),
            48 => 
            array (
                'id' => 52,
                'name' => 'Jays Builder Marketing',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:39:02',
                'updated_at' => '2024-07-30 16:39:02',
            ),
            49 => 
            array (
                'id' => 53,
                'name' => 'LM Metro Hotel',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:40:28',
                'updated_at' => '2024-07-30 16:40:28',
            ),
            50 => 
            array (
                'id' => 54,
                'name' => 'Freemont Foods Corporation',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:41:53',
                'updated_at' => '2024-07-30 16:41:53',
            ),
            51 => 
            array (
                'id' => 55,
                'name' => 'Basilan Spring',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:43:08',
                'updated_at' => '2024-07-30 16:43:08',
            ),
            52 => 
            array (
                'id' => 56,
                'name' => 'JT Waters',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:44:17',
                'updated_at' => '2024-07-30 16:44:17',
            ),
            53 => 
            array (
                'id' => 57,
                'name' => 'Greatway Fish Meal Producer Corporation',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:47:53',
                'updated_at' => '2024-07-30 16:47:53',
            ),
            54 => 
            array (
                'id' => 58,
                'name' => 'SR-Swing Bottled Water Manufacturing',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:48:58',
                'updated_at' => '2024-07-30 16:48:58',
            ),
            55 => 
            array (
                'id' => 59,
                'name' => 'Bluefin Seafood Export Incorporated',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:50:15',
                'updated_at' => '2024-07-30 16:50:15',
            ),
            56 => 
            array (
                'id' => 60,
                'name' => 'Buhatan Nipa Food Production Workers Association',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:54:24',
                'updated_at' => '2024-07-30 16:54:24',
            ),
            57 => 
            array (
                'id' => 61,
                'name' => 'PAL Express',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:56:37',
                'updated_at' => '2024-07-30 16:56:37',
            ),
            58 => 
            array (
                'id' => 62,
                'name' => 'Titan Gasoline Station',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:58:37',
                'updated_at' => '2024-07-30 16:58:37',
            ),
            59 => 
            array (
                'id' => 63,
                'name' => 'Basri Seaweeds Trading',
                'has_branches' => 0,
                'is_active' => 1,
                'created_at' => '2024-07-30 16:59:47',
                'updated_at' => '2024-07-30 16:59:47',
            ),
            60 => 
            array (
                'id' => 64,
                'name' => 'Grandprix Gasoline Station',
                'has_branches' => 1,
                'is_active' => 1,
                'created_at' => '2024-07-30 17:01:11',
                'updated_at' => '2024-07-30 17:01:11',
            ),
        ));

        
    }
}