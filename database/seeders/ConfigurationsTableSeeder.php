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
        

        \DB::table('configurations')->truncate();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'acronym' => 'DOST-IX',
                'name' => 'Department of Science and Technology - IX',
                'laboratories' => '[{"name": "Chemical Laboratory", "value": 1, "tsr_count": "393", "report_count": "847", "sample_count": "993"}, {"name": "Microbiological Laboratory", "value": 2, "tsr_count": "339", "report_count": "928", "sample_count": "929"}, {"name": "Metrology Laboratory", "value": 3, "tsr_count": "426", "report_count": "732", "sample_count": "1513"}]',
                'samplecode_year' => 0,
                'tsr_count' => NULL,
                'sample_count' => NULL,
                'laboratory_id' => 14,
                'created_at' => '2024-08-14 13:49:43',
                'updated_at' => '2024-08-14 13:49:43',
            ),
        ));

        
    }
}