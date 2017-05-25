<?php

use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('faculty')->insert(array(
            array(
                'division_id' => 1,
                'faculty_name' => 'John Stager',
                'email' => 'Zhou.Wu@seattlecolleges.edu',
                'is_admin' => false,
                'is_active' => true,
                'employee_type' => 'PARTTIME'
            ),
            array(
                'division_id' => 2,
                'faculty_name' => 'Paul Wu',
                'email' => 'Jane.Doe@seattlecolleges.edu',
                'is_admin' => true,
                'is_active' => true,
                'employee_type' => 'FULLTIME'
            ),
            array(
                'division_id' => 1,
                'faculty_name' => 'Paul Wu',
                'email' => 'John.Doe@seattlecolleges.edu',
                'is_admin' => true,
                'is_active' => true,
                'employee_type' => 'FULLTIME'
            ),
            array(
                'division_id' => 2,
                'faculty_name' => 'Paul Wu',
                'email' => 'Alex.Trebek@seattlecolleges.edu',
                'is_admin' => true,
                'is_active' => true,
                'employee_type' => 'FULLTIME'
            )
        ));
    }
}
