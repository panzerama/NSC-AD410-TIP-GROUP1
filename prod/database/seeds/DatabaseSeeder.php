<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(TipsTableSeeder::class);
        // $this->call(FacultyTipsTableSeeder::class);
        // $this->call(FacultyTableSeeder::class);
        
        //call the various factory methods
        //in the order User, faculty, division, tips, faculty_tips, questions
        //tips_questions, answers
        $this->call(QuestionSeeder::class);
    }
}
    