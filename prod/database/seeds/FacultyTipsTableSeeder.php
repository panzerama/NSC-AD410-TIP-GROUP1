<?php

use Illuminate\Database\Seeder;

class FacultyTipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //faculty_id in 1234
        //tips_id in 1-11
        DB::table('faculty_tips')->insert(array(
            array(
                'faculty_id' => 2,
                'tips_id' => 1,
            ),
            array(
                'faculty_id' => 3,
                'tips_id' => 2,
            ),
            array(
                'faculty_id' => 4,
                'tips_id' => 3,
            ),
            array(
                'faculty_id' => 1,
                'tips_id' => 4,
            ),
            array(
                'faculty_id' => 2,
                'tips_id' => 5,
            ),
            array(
                'faculty_id' => 3,
                'tips_id' => 6,
            ),
            array(
                'faculty_id' => 4,
                'tips_id' => 7,
            ),
            array(
                'faculty_id' => 1,
                'tips_id' => 8,
            ),
            array(
                'faculty_id' => 2,
                'tips_id' => 9,
            ),
            array(
                'faculty_id' => 3,
                'tips_id' => 10,
            ),
            array(
                'faculty_id' => 4,
                'tips_id' => 11,
            ),
        ));
    }
}
