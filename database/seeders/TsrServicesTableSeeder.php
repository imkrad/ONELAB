<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TsrServicesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tsr_services')->delete();
        
        \DB::table('tsr_services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fee' => '500.00',
                'total' => '500.00',
                'quantity' => 1,
                'service_id' => 6,
                'typeable_id' => 310,
                'typeable_type' => 'App\\Models\\TsrAnalysis',
                'is_additional' => 1,
                'created_at' => '2024-08-17 10:16:16',
                'updated_at' => '2024-08-17 10:16:16',
            ),
            1 => 
            array (
                'id' => 2,
                'fee' => '500.00',
                'total' => '1000.00',
                'quantity' => 2,
                'service_id' => 6,
                'typeable_id' => 312,
                'typeable_type' => 'App\\Models\\TsrAnalysis',
                'is_additional' => 1,
                'created_at' => '2024-08-17 14:00:44',
                'updated_at' => '2024-08-17 14:00:44',
            ),
            2 => 
            array (
                'id' => 3,
                'fee' => '500.00',
                'total' => '1000.00',
                'quantity' => 2,
                'service_id' => 6,
                'typeable_id' => 314,
                'typeable_type' => 'App\\Models\\TsrAnalysis',
                'is_additional' => 1,
                'created_at' => '2024-08-17 14:01:16',
                'updated_at' => '2024-08-17 14:01:16',
            ),
            3 => 
            array (
                'id' => 4,
                'fee' => '2000.00',
                'total' => '4000.00',
                'quantity' => 2,
                'service_id' => 2,
                'typeable_id' => 184,
                'typeable_type' => 'App\\Models\\Tsr',
                'is_additional' => 0,
                'created_at' => '2024-09-04 08:41:18',
                'updated_at' => '2024-09-04 08:41:18',
            ),
        ));

        
    }
}