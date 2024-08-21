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
        

        \DB::table('finance_names')->truncate();
        
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
        ));

        
    }
}