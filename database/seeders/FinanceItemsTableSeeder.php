<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_items')->delete();
        
        \DB::table('finance_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amount' => '950.00',
                'name' => 'Refund of Excess CA Travel',
                'created_at' => '2024-08-19 08:47:56',
                'updated_at' => '2024-08-19 08:47:56',
            ),
            1 => 
            array (
                'id' => 2,
                'amount' => '464.00',
                'name' => 'Refund of Excess CA',
                'created_at' => '2024-08-19 08:50:43',
                'updated_at' => '2024-08-19 08:50:43',
            ),
            2 => 
            array (
                'id' => 3,
                'amount' => '69445.00',
                'name' => 'For the month of July 2024',
                'created_at' => '2024-08-19 08:53:11',
                'updated_at' => '2024-08-19 08:53:11',
            ),
            3 => 
            array (
                'id' => 15,
                'amount' => '4867500.00',
                'name' => 'Stipend and allowances for the Scholars',
                'created_at' => '2024-08-19 16:24:43',
                'updated_at' => '2024-08-19 16:24:43',
            ),
            4 => 
            array (
                'id' => 16,
                'amount' => '1050.00',
                'name' => 'Aug. 16-17, 2024',
                'created_at' => '2024-08-31 14:28:38',
                'updated_at' => '2024-08-31 14:28:38',
            ),
            5 => 
            array (
                'id' => 17,
                'amount' => '1050.00',
                'name' => 'Aug. 16-17, 2024',
                'created_at' => '2024-08-31 14:29:00',
                'updated_at' => '2024-08-31 14:29:00',
            ),
            6 => 
            array (
                'id' => 18,
                'amount' => '1100.00',
                'name' => 'R9-022019-MIC-0096',
                'created_at' => '2024-08-31 14:32:45',
                'updated_at' => '2024-08-31 14:32:45',
            ),
            7 => 
            array (
                'id' => 19,
                'amount' => '17366.67',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 16:12:33',
                'updated_at' => '2024-08-31 16:12:33',
            ),
            8 => 
            array (
                'id' => 20,
                'amount' => '17366.67',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 16:12:33',
                'updated_at' => '2024-08-31 16:12:33',
            ),
            9 => 
            array (
                'id' => 21,
                'amount' => '9558.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 16:14:46',
                'updated_at' => '2024-08-31 16:14:46',
            ),
            10 => 
            array (
                'id' => 23,
                'amount' => '82778.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 16:17:18',
                'updated_at' => '2024-08-31 16:17:18',
            ),
            11 => 
            array (
                'id' => 31,
                'amount' => '78270.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:01:01',
                'updated_at' => '2024-08-31 17:01:01',
            ),
            12 => 
            array (
                'id' => 32,
                'amount' => '41666.67',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:02:23',
                'updated_at' => '2024-08-31 17:02:23',
            ),
            13 => 
            array (
                'id' => 33,
                'amount' => '13423.00',
                'name' => 'FOR THE MONTH OF JAN 2023',
                'created_at' => '2024-08-31 17:03:21',
                'updated_at' => '2024-08-31 17:03:21',
            ),
            14 => 
            array (
                'id' => 36,
                'amount' => '20833.00',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:05:36',
                'updated_at' => '2024-08-31 17:05:36',
            ),
            15 => 
            array (
                'id' => 37,
                'amount' => '20833.00',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 17:05:36',
                'updated_at' => '2024-08-31 17:05:36',
            ),
            16 => 
            array (
                'id' => 39,
                'amount' => '69445.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:11:00',
                'updated_at' => '2024-08-31 17:11:00',
            ),
            17 => 
            array (
                'id' => 40,
                'amount' => '30000.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:11:42',
                'updated_at' => '2024-08-31 17:11:42',
            ),
            18 => 
            array (
                'id' => 41,
                'amount' => '83334.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:12:35',
                'updated_at' => '2024-08-31 17:12:35',
            ),
            19 => 
            array (
                'id' => 43,
                'amount' => '79861.11',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:14:01',
                'updated_at' => '2024-08-31 17:14:01',
            ),
            20 => 
            array (
                'id' => 44,
                'amount' => '27381.67',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:15:34',
                'updated_at' => '2024-08-31 17:15:34',
            ),
            21 => 
            array (
                'id' => 45,
                'amount' => '38333.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:16:20',
                'updated_at' => '2024-08-31 17:16:20',
            ),
            22 => 
            array (
                'id' => 47,
                'amount' => '6944.44',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:17:38',
                'updated_at' => '2024-08-31 17:17:38',
            ),
            23 => 
            array (
                'id' => 51,
                'amount' => '42500.00',
                'name' => 'FOR THE MONTH OF APR 2024',
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            24 => 
            array (
                'id' => 52,
                'amount' => '42500.00',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            25 => 
            array (
                'id' => 53,
                'amount' => '42500.00',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 17:19:24',
                'updated_at' => '2024-08-31 17:19:24',
            ),
            26 => 
            array (
                'id' => 54,
                'amount' => '17777.78',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:23:31',
                'updated_at' => '2024-08-31 17:23:31',
            ),
            27 => 
            array (
                'id' => 55,
                'amount' => '17777.78',
                'name' => 'FOR THE MONTH OF JUNE 2024',
                'created_at' => '2024-08-31 17:23:31',
                'updated_at' => '2024-08-31 17:23:31',
            ),
            28 => 
            array (
                'id' => 56,
                'amount' => '61112.00',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:25:24',
                'updated_at' => '2024-08-31 17:25:24',
            ),
            29 => 
            array (
                'id' => 57,
                'amount' => '61112.00',
                'name' => 'FOR THE MONTH OF JUNE 2024',
                'created_at' => '2024-08-31 17:25:24',
                'updated_at' => '2024-08-31 17:25:24',
            ),
            30 => 
            array (
                'id' => 60,
                'amount' => '35833.33',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:27:31',
                'updated_at' => '2024-08-31 17:27:31',
            ),
            31 => 
            array (
                'id' => 61,
                'amount' => '35833.33',
                'name' => 'FOR THE MONTH OF JUNE 2024',
                'created_at' => '2024-08-31 17:27:31',
                'updated_at' => '2024-08-31 17:27:31',
            ),
            32 => 
            array (
                'id' => 62,
                'amount' => '35834.00',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 17:36:51',
                'updated_at' => '2024-08-31 17:36:51',
            ),
            33 => 
            array (
                'id' => 63,
                'amount' => '35834.00',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 17:36:51',
                'updated_at' => '2024-08-31 17:36:51',
            ),
            34 => 
            array (
                'id' => 64,
                'amount' => '43333.33',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 17:40:31',
                'updated_at' => '2024-08-31 17:40:31',
            ),
            35 => 
            array (
                'id' => 65,
                'amount' => '43333.33',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:40:31',
                'updated_at' => '2024-08-31 17:40:31',
            ),
            36 => 
            array (
                'id' => 66,
                'amount' => '100000.00',
                'name' => 'FOR THE MONTH OF JAN 2024',
                'created_at' => '2024-08-31 17:43:36',
                'updated_at' => '2024-08-31 17:43:36',
            ),
            37 => 
            array (
                'id' => 68,
                'amount' => '9065.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:45:53',
                'updated_at' => '2024-08-31 17:45:53',
            ),
            38 => 
            array (
                'id' => 69,
                'amount' => '27777.00',
                'name' => 'FOR THE MONTH OF JUN 2024',
                'created_at' => '2024-08-31 17:46:44',
                'updated_at' => '2024-08-31 17:46:44',
            ),
            39 => 
            array (
                'id' => 70,
                'amount' => '9691.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:47:37',
                'updated_at' => '2024-08-31 17:47:37',
            ),
            40 => 
            array (
                'id' => 71,
                'amount' => '12639.00',
                'name' => 'FOR THE MONTH OF JAN 2024',
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            41 => 
            array (
                'id' => 72,
                'amount' => '12639.00',
                'name' => 'FOR THE MONTH OF FEB 2024',
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            42 => 
            array (
                'id' => 73,
                'amount' => '12639.00',
                'name' => 'FOR THE MONTH OF MAR 2024',
                'created_at' => '2024-08-31 17:49:06',
                'updated_at' => '2024-08-31 17:49:06',
            ),
            43 => 
            array (
                'id' => 74,
                'amount' => '26445.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:51:13',
                'updated_at' => '2024-08-31 17:51:13',
            ),
            44 => 
            array (
                'id' => 75,
                'amount' => '38889.00',
                'name' => 'FOR THE MONTH OF MAY 2023',
                'created_at' => '2024-08-31 17:53:00',
                'updated_at' => '2024-08-31 17:53:00',
            ),
            45 => 
            array (
                'id' => 76,
                'amount' => '38889.00',
                'name' => 'FOR THE MONTH OF JUN 2023',
                'created_at' => '2024-08-31 17:53:00',
                'updated_at' => '2024-08-31 17:53:00',
            ),
            46 => 
            array (
                'id' => 77,
                'amount' => '14390.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:55:05',
                'updated_at' => '2024-08-31 17:55:05',
            ),
            47 => 
            array (
                'id' => 79,
                'amount' => '16080.00',
                'name' => 'FOR THE MONTH OF APR 2024',
                'created_at' => '2024-08-31 17:56:24',
                'updated_at' => '2024-08-31 17:56:24',
            ),
            48 => 
            array (
                'id' => 80,
                'amount' => '7139.00',
                'name' => 'FOR THE MONTH OF DEC 2023',
                'created_at' => '2024-08-31 17:57:11',
                'updated_at' => '2024-08-31 17:57:11',
            ),
            49 => 
            array (
                'id' => 81,
                'amount' => '16695.00',
                'name' => 'FOR THE MONTH OF DEC 2023',
                'created_at' => '2024-08-31 17:58:28',
                'updated_at' => '2024-08-31 17:58:28',
            ),
            50 => 
            array (
                'id' => 82,
                'amount' => '47445.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 17:59:15',
                'updated_at' => '2024-08-31 17:59:15',
            ),
            51 => 
            array (
                'id' => 84,
                'amount' => '16116.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 18:03:00',
                'updated_at' => '2024-08-31 18:03:00',
            ),
            52 => 
            array (
                'id' => 85,
                'amount' => '30834.00',
                'name' => 'FOR THE MONTH OF MAY 2024',
                'created_at' => '2024-08-31 18:03:44',
                'updated_at' => '2024-08-31 18:03:44',
            ),
            53 => 
            array (
                'id' => 86,
                'amount' => '15252.00',
                'name' => 'FOR THE MONTH OF JUL 2024',
                'created_at' => '2024-08-31 18:04:31',
                'updated_at' => '2024-08-31 18:04:31',
            ),
            54 => 
            array (
                'id' => 87,
                'amount' => '138890.00',
                'name' => 'For the Month of Aug 2024',
                'created_at' => '2024-08-31 18:14:00',
                'updated_at' => '2024-08-31 18:14:00',
            ),
            55 => 
            array (
                'id' => 88,
                'amount' => '9629.25',
                'name' => 'Refund of Excess CA',
                'created_at' => '2024-09-06 09:05:30',
                'updated_at' => '2024-09-06 09:05:30',
            ),
            56 => 
            array (
                'id' => 89,
                'amount' => '3700.00',
                'name' => 'Refund of Excess CA Travel',
                'created_at' => '2024-09-06 10:21:52',
                'updated_at' => '2024-09-06 10:21:52',
            ),
        ));

        
    }
}