<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceNamesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_names')->delete();
        
        \DB::table('finance_names')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'DOST-SEI',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-02 17:53:38',
                'updated_at' => '2024-08-02 17:53:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'DOST-PCIEERD',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-02 17:55:25',
                'updated_at' => '2024-08-02 17:55:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'DOST-PCHRD',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-02 17:56:41',
                'updated_at' => '2024-08-02 17:56:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'DOST-TAPI',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-02 17:57:06',
                'updated_at' => '2024-08-02 17:57:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'DOST-CAR',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-02 17:57:12',
                'updated_at' => '2024-08-02 17:57:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Martin A. Wee',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:01:25',
                'updated_at' => '2024-08-02 18:01:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Rosemarie S. Salazar',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:01:45',
                'updated_at' => '2024-08-02 18:01:45',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ricardo J. Apolinario III',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:02:30',
                'updated_at' => '2024-08-02 18:02:30',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Thelma E. Diego',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:03:06',
                'updated_at' => '2024-08-02 18:03:06',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Jali J. Badiola',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:03:24',
                'updated_at' => '2024-08-02 18:03:24',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Shaira Jean S. Villacin',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:04:03',
                'updated_at' => '2024-08-02 18:04:03',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Ronnel B. Gundoy',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:04:14',
                'updated_at' => '2024-08-02 18:04:14',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Loise Ray G. Leona',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:05:12',
                'updated_at' => '2024-08-02 18:05:12',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Ruben M. Lim jr.',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:05:30',
                'updated_at' => '2024-08-02 18:05:30',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Benzar T. Kasan',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:06:41',
                'updated_at' => '2024-08-02 18:06:41',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Roger Dave F. Gramatica',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:07:14',
                'updated_at' => '2024-08-02 18:07:14',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Merly D. Alivio',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:07:56',
                'updated_at' => '2024-08-02 18:07:56',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Cleypart G. Braca',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:08:24',
                'updated_at' => '2024-08-02 18:08:24',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Jennifer A. Pidor',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:08:33',
                'updated_at' => '2024-08-02 18:08:33',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Albertson T. Patenio',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:08:59',
                'updated_at' => '2024-08-02 18:08:59',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Jezel P. Appari',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-02 18:09:29',
                'updated_at' => '2024-08-02 18:09:29',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Marielle R. Atilano',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-17 18:01:59',
                'updated_at' => '2024-08-17 18:01:59',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Engr\'s Steel Industry',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-19 08:52:18',
                'updated_at' => '2024-08-19 08:52:18',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'John Mayo M. Enriquez',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-31 14:27:51',
                'updated_at' => '2024-08-31 14:27:51',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Jocelyn D. Partosa',
                'is_individual' => 1,
                'is_active' => 1,
                'created_at' => '2024-08-31 14:28:05',
                'updated_at' => '2024-08-31 14:28:05',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Nuevo Zamboanga College Inc.',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 14:31:39',
                'updated_at' => '2024-08-31 14:31:39',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bread Maker Bakery',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:08:24',
                'updated_at' => '2024-08-31 15:08:24',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'ZC BTS Marketing',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:09:00',
                'updated_at' => '2024-08-31 15:09:00',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Steel Colors Metal Products - Phase II',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:09:22',
                'updated_at' => '2024-08-31 15:09:22',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'FGT Trading',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:09:36',
                'updated_at' => '2024-08-31 15:09:36',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Printline and Stationery Supply',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:09:57',
                'updated_at' => '2024-08-31 15:09:57',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'EJT Food Products by Evelyn',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:10:13',
                'updated_at' => '2024-08-31 15:10:13',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Rogelio Rice Milling',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:10:24',
                'updated_at' => '2024-08-31 15:10:24',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Rendon Rice Mill',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:10:38',
                'updated_at' => '2024-08-31 15:10:38',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Fernandez Rice Mill',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:10:50',
                'updated_at' => '2024-08-31 15:10:50',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'JR Tamula Rice Mill',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:11:50',
                'updated_at' => '2024-08-31 15:11:50',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'J-Jireh Ice Plant & Cold Storage',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:12:07',
                'updated_at' => '2024-08-31 15:12:07',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'LE Aninao Snack Haus',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:12:34',
                'updated_at' => '2024-08-31 15:12:34',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'W&A Montales Rice Trading',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:12:50',
                'updated_at' => '2024-08-31 15:12:50',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Kthree Food Products',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:13:47',
                'updated_at' => '2024-08-31 15:13:47',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Bon Corpuz Trucking Services',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:14:01',
                'updated_at' => '2024-08-31 15:14:01',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'San Jose Ice Production Supply',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:14:17',
                'updated_at' => '2024-08-31 15:14:17',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Dong\'s Animal Feeds Production',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:14:30',
                'updated_at' => '2024-08-31 15:14:30',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Triple\'s Poultry Farm',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:14:45',
                'updated_at' => '2024-08-31 15:14:45',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Joshjeed Palay Seed Farming',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:15:03',
                'updated_at' => '2024-08-31 15:15:03',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Adiong Store',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:15:16',
                'updated_at' => '2024-08-31 15:15:16',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'NSB Machine Shop',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:15:25',
                'updated_at' => '2024-08-31 15:15:25',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'JForce Printing Services',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:15:37',
                'updated_at' => '2024-08-31 15:15:37',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Laguerta Food Products',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:15:48',
                'updated_at' => '2024-08-31 15:15:48',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Maxie Digital Printing Services',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:16:02',
                'updated_at' => '2024-08-31 15:16:02',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Myka Rice Mill',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:16:19',
                'updated_at' => '2024-08-31 15:16:19',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Duque Computer Grafix and Print Hauz',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:16:44',
                'updated_at' => '2024-08-31 15:16:44',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Francis IV Enterprises',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:17:03',
                'updated_at' => '2024-08-31 15:17:03',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Jacincel Catering Services',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:17:28',
                'updated_at' => '2024-08-31 15:17:28',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Balay ni SRB',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:17:40',
                'updated_at' => '2024-08-31 15:17:40',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Balili Motor Parts',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:17:55',
                'updated_at' => '2024-08-31 15:17:55',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Nanay\'s Bakeshop',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:18:03',
                'updated_at' => '2024-08-31 15:18:03',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Ramona Bakeshop',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:18:18',
                'updated_at' => '2024-08-31 15:18:18',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Romie Studio',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:18:37',
                'updated_at' => '2024-08-31 15:18:37',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Triple J Rice Mill',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:18:48',
                'updated_at' => '2024-08-31 15:18:48',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Top Jun\'s Original Trading',
                'is_individual' => 0,
                'is_active' => 1,
                'created_at' => '2024-08-31 15:19:05',
                'updated_at' => '2024-08-31 15:19:05',
            ),
        ));

        
    }
}