<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'administrator',
                'email' => 'kradjumli@gmail.com',
                'password' => '$2y$12$l0.86vFUv..DnHE/Q05utuRW8En10gIik4Ao86foce/tJ2BRYMN6y',
                'role' => 'Administrator',
                'is_active' => 1,
                'is_new' => 0,
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'email_verified_at' => '2024-05-15 08:46:33',
                'password_changed_at' => NULL,
                'two_factor_confirmed_at' => NULL,
                'created_at' => '2024-07-30 08:19:03',
                'updated_at' => '2024-07-30 08:19:03',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'jpf',
                'email' => 'joefryfernando@gmail.com',
                'password' => '$2y$12$7Kb98EW15mOscac6S15HjejBzYvQ2wTghNfxVCWWesLb21kIXQni.',
                'role' => 'Staff',
                'is_active' => 1,
                'is_new' => 0,
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'email_verified_at' => '2024-05-15 08:46:33',
                'password_changed_at' => NULL,
                'two_factor_confirmed_at' => NULL,
                'created_at' => '2024-07-30 11:04:54',
                'updated_at' => '2024-07-30 11:04:57',
            ),
        ));

        
    }
}