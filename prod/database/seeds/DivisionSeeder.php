<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('divisions')->insert(array(
            // for index view
            array(
                'division_name' => 'Arts, Humanities, and Social Sciences',
                'abbr' => 'AHSS',
                'is_active' => true
            ),
            array(
                'division_name' => 'Business Engineering and Information Technology',
                'abbr' => 'BEIT',
                'is_active' => true
            ),
            array(
                'division_name' => 'Business and Transitional Studies',
                'abbr' => 'BTS',
                'is_active' => true
            ),
            array(
                'division_name' => 'Health and Humanities',
                'abbr' => 'HHS',
                'is_active' => true
            ),
            array(
                'division_name' => 'Library',
                'abbr' => 'LIB',
                'is_active' => true
            ),
            array(
                'division_name' => 'Math and Science',
                'abbr' => 'M&S',
                'is_active' => true
            ),
            array(
                'division_name' => 'Work Force Instruction',
                'abbr' => 'WFI',
                'is_active' => true
            )
        ));
    }
}