<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert answers test data
        DB::table('answers')->insert(array(
            // id 1
            array(
                'question_id' => 1,
                'answer_text' => '',
                'is_active' => true
            ),
            // id 2
            array(
                'question_id' => 2,
                'answer_text' => '',
                'is_active' => true
            ),
            // id 3
            array(
                'question_id' => 3,
                'answer_text' => 'Facts, theories, perspectives, and methodologies within and across disciplines',
                'is_active' => true
            ),
            // id 4
            array(
                'question_id' => 4,
                'answer_text' => 'Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)',
                'is_active' => true
            ),
            ),
            // id 5
            array(
                'question_id' => 5,
                'answer_text' => '',
                'is_active' => true
            ),
            // id 6
            array(
                'question_id' => 6,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            // id 7
            array(
                'question_id' => 7,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 8
            array(
                'question_id' => 8,
                'answer_text' => 'Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)',
                'is_active' => true
            ),
            
            // id 9
            array(
                'question_id' => 9,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 10
            array(
                'question_id' => 10,
                'answer_text' => 'Gave you an idea for additional changes to this course',
                'is_active' => true
            ),
            
            // id 11
            array(
                'question_id' => 11,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 12
            array(
                'question_id' => 12,
                'answer_text' => 'Share my TIP answers',
                'is_active' => true
            
        ));
    }
}
