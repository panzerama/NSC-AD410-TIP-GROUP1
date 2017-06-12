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
        DB::table('answers')->insert(array(
            // for index view
            array(
                'question_id' => 1,
                'answer_text' => 'Individual',
                'is_active' => true
            ),
            array(
                'question_id' => 1,
                'answer_text' => 'Group',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'AHSS',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'BEIT',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'BTS',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'HHS',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'LIB',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'M&S',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'WFI',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Fall',
                'is_active' => true
            ),
            //
            array(
                'question_id' => 5,
                'answer_text' => 'Winter',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Spring',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Summer',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2017',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2018',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2019',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2020',
                'is_active' => true
            ),
            // for create view
            array(
                'question_id' => 9,
                'answer_text' => 'Facts, theories, perspectives, and methodologies within and across disciplines',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Critical thinking and problem solving',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Communication and self-expression',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Quantitative reasoning',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Information literacy',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Technological proficiency',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Collaboration: group and team work',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Civic engagement: local, global, and environmental',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Intercultural knowledge and competence',
                'is_active' => true
            ),
                        array(
                'question_id' => 9,
                'answer_text' => 'Ethical awareness and personal integrity',
                'is_active' => true
            ),
                        array(
                'question_id' => 9,
                'answer_text' => 'Lifelong learning and personal well-being',
                'is_active' => true
            ),
                        array(
                'question_id' => 9,
                'answer_text' => 'Synthesis and application of knowledge, skills, and responsibilities to new settings and problems',
                'is_active' => true
            ),
            
// id 4
            array(
                'question_id' => 10,
                'answer_text' => 'Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc.',
                'is_active' => true
            ),
            // id 5
            array(
                'question_id' => 11,
                'answer_text' => '',
                'is_active' => true
            ),
            // id 6
            array(
                'question_id' => 12,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Reapportioned time & effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            // id 7
            array(
                'question_id' => 13,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 8
            array(
                'question_id' => 14,
                'answer_text' => 'Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc.',
                'is_active' => true
            ),
            // id 9
            array(
                'question_id' => 15,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 10
            array(
                'question_id' => 16,
                'answer_text' => 'Gave you an idea for additional changes to this course',
                'is_active' => true
            ),
            array(
                'question_id' => 16,
                'answer_text' => 'Gave you an idea for changes to another course',
                'is_active' => true
            ),
            array(
                'question_id' => 16,
                'answer_text' => 'Suggested a topic for discussion with colleagues in your program/discipline',
                'is_active' => true
            ),
            array(
                'question_id' => 16,
                'answer_text' => 'Suggested a topic that an interdisciplinary group of faculty could productively examine',
                'is_active' => true
            ),
            array(
                'question_id' => 16,
                'answer_text' => 'Prompted consideration of a sabbatical for more in-depth study',
                'is_active' => true
            ),
            array(
                'question_id' => 16,
                'answer_text' => 'Uncovered a topic for a faculty retreat',
                'is_active' => true
            ),
            
            // id 11
            array(
                'question_id' => 17,
                'answer_text' => '',
                'is_active' => true
            ),
            
            // id 12
            array(
                'question_id' => 18,
                'answer_text' => 'Share my TIP answers',
                'is_active' => true
            
            ),
            array(
                'question_id' => 18,
                'answer_text' => 'Do not share my TIP (only shared with the committee)',
                'is_active' => true
            ),
            array(
                'question_id' => 18,
                'answer_text' => 'Share anonymously (let me know what information is redacted)',
                'is_active' => true
            )
        ));
    }
}
