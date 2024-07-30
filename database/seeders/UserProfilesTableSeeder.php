<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_profiles')->delete();
        
        \DB::table('user_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'Ra-ouf',
                'lastname' => 'Jumli',
                'middlename' => 'Indanan',
                'suffix' => NULL,
                'gender' => 'Male',
                'mobile' => '09171531652',
                'avatar' => 'avatar.jpg',
                'user_id' => 1,
                'created_at' => '2024-07-30 08:19:03',
                'updated_at' => '2024-07-30 10:23:34',
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'Joefry',
                'lastname' => 'Fernando',
                'middlename' => 'P',
                'suffix' => NULL,
                'gender' => 'Male',
                'mobile' => '09153907133',
                'avatar' => 'avatar',
                'user_id' => 2,
                'created_at' => '2024-07-30 11:04:54',
                'updated_at' => '2024-07-30 11:04:54',
            ),
        ));

        
    }
}