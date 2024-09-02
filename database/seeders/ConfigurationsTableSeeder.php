<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'acronym' => 'DOST-IX',
                'name' => 'Department of Science and Technology - IX',
                'laboratories' => '[{"name": "Chemical Laboratory", "value": 1, "tsr_count": "389", "report_count": "847", "sample_count": "989"}, {"name": "Microbiological Laboratory", "value": 2, "tsr_count": "336", "report_count": "928", "sample_count": "926"}, {"name": "Metrology Laboratory", "value": 3, "tsr_count": "426", "report_count": "732", "sample_count": "1513"}]',
                'samplecode_year' => 0,
                'tsr_count' => NULL,
                'sample_count' => NULL,
                'laboratory_id' => 14,
                'created_at' => '2024-08-19 08:42:14',
                'updated_at' => '2024-08-19 08:42:14',
            ),
        ));

        
    }
}