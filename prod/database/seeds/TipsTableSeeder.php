<?php

use Illuminate\Database\Seeder;

class TipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Database
        DB::table('tips')->insert(array(
            array(
                'division_id' => 1,
                'course_name' => 'Web Development Practicum',
                'course_number' => 'AD410',
                'quarter' => 'SPRING',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 2
            array(
                'division_id' => 1,
                'course_name' => 'Mobile Development',
                'course_number' => 'AD340',
                'quarter' => 'SPRING',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 3
            array(
                'division_id' => 1,
                'course_name' => 'Discrete Mathematics',
                'course_number' => 'AD315',
                'quarter' => 'SPRING',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 4
            // WINTER courses with AD 350 and AD 320 being unfinished 'is_finished set to false'
            array(
                'division_id' => 1,
                'course_name' => 'Data Structure and Algorithms',
                'course_number' => 'AD325',
                'quarter' => 'WINTER',
                'year' => 2018,
                'is_finished' => false,
                'is_active' => true,
                'is_group' => true
            ),
            // id 5
            array(
                'division_id' => 1,
                'course_name' => 'Relational Database Technology',
                'course_number' => 'AD350',
                'quarter' => 'WINTER',
                'year' => 2017,
                'is_finished' => false,
                'is_active' => true,
                'is_group' => true
            ),
            // id 6
            array(
                'division_id' => 1,
                'course_name' => 'Web Application Development',
                'course_number' => 'AD320',
                'quarter' => 'WINTER',
                'year' => 2017,
                'is_finished' => false,
                'is_active' => true,
                'is_group' => true
                
            ),
            // id 7
            // FALL courses with all finised and all active set to true
            array(
                'division_id' => 1,
                'course_name' => 'Component Software',
                'course_number' => 'AD300',
                'quarter' => 'FALL',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 8
            array(
                'division_id' => 1,
                'course_name' => 'Software Lifecycle',
                'course_number' => 'AD310',
                'quarter' => 'FALL',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 9
            // CS courses with Division Id set to 2 and is_finished of CS110 set to false
            // CS142 is_active is set to false
            array(
                'division_id' => 2,
                'course_name' => 'Programming with Java II',
                'course_number' => 'CS143',
                'quarter' => 'FALL',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => true,
                'is_group' => true
            ),
            // id 10
            array(
                'division_id' => 2,
                'course_name' => 'Programming with Java I',
                'course_number' => 'CS142',
                'quarter' => 'WINTER',
                'year' => 2017,
                'is_finished' => true,
                'is_active' => false,
                'is_group' => true
            ),
            // id 11
            array(
                'division_id' => 2,
                'course_name' => 'Intro To Programming',
                'course_number' => 'CS110',
                'quarter' => 'FALL',
                'year' => 2017,
                'is_finished' => false,
                'is_active' => true,
                'is_group' => true
        )));
    }
}
