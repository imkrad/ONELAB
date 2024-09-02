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
                'code' => 'R9',
                'acronym' => 'DOST-IX',
                'name' => 'Department of Science and Technology - IX',
                'laboratories' => '[{"name": "Chemical Laboratory", "value": 1, "tsr_count": "389", "report_count": "847", "sample_count": "989"}, {"name": "Microbiological Laboratory", "value": 2, "tsr_count": "336", "report_count": "928", "sample_count": "928"}, {"name": "Metrology Laboratory", "value": 3, "tsr_count": "426", "report_count": "732", "sample_count": "1513"}]',
                'samplecode_year' => 0,
                'laboratory_id' => 14,
                'created_at' => '2024-09-02 11:26:42',
                'updated_at' => '2024-09-02 11:26:42',
            ),
        ));

        
    }
}