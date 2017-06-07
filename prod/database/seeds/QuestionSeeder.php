<?php

use App\question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert questions test data
        DB::table('questions')->insert(array(
            // id 1
            array(
                'question_number' => 1,
                'question_text' => 'Is this an individual or group TIP?',
                'question_type' => 'RADIO',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 2
            array(
                'question_number' => 2,
                'question_text' => 'Division',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 3
            array(
                'question_number' => 3,
                'question_text' => 'Enter Course Prefix',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 4
            array(
                'question_number' => 4,
                'question_text' => 'Enter Course Number',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 5
            array(
                'question_number' => 5,
                'question_text' => 'Select Quarter',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 6
            array(
                'question_number' => 6,
                'question_text' => 'Select Year',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 7
            array(
                'question_number' => 7,
                'question_text' => 'What is the problem or lesson that you identified 
                and will be discussing in this TIP? No topic is too big or too small. 
                All are welcomed!',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 8
            array(
                'question_number' => 8,
                'question_text' => 'What is the course-level objective that this 
                TIP best addresses?',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 9
            array(
                'question_number' => 9,
                'question_text' => 'Which of the college-wide Essential Learning 
                Outcomes
                 does your TIP most closely address?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 10
            array(
                'question_number' => 10,
                'question_text' => 'Which of the following best describes the evidence 
                you found for the problem?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 11
            array(
                'question_number' => 11,
                'question_text' => 'Please describe more specifically how you found 
                the problem. For example, "Based on discussion posts, 
                I realized that more than half of the class did not understand 
                the prompt and was not demonstrating the kind of comprehension I was looking for.',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 12
            array(
                'question_number' => 12,
                'question_text' => 'Please select the change that best fits what you 
                did to try to address the problem.',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 13
            array(
                'question_number' => 13,
                'question_text' => 'Specifically, what did you do to address the 
                problem? For example, "I broke the prompt down into two separate 
                discussions so that it was clearer what the students should think 
                about and write about in their posts.',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 14
            array(
                'question_number' => 14,
                'question_text' => 'Please select the evidence that best fits how
                you assessed the impact of the change you made.',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 15
            array(
                'question_number' => 15,
                'question_text' => 'Please describe more fully how you assessed 
                the impact of the change you made. For example, "After I broke the 
                prompt into two discussions, more students were able to write about 
                the ideas thoroughly. This time it was about 75% of students. 
                I might want to refine the prompts even further, but this was a good change."',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 16
            array(
                'question_number' => 16,
                'question_text' => 'What new opportunities did you consider as a result 
                of identifying this problem and making this change?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 17
            array(
                'question_number' => 17,
                'question_text' => 'What else would you like to share about the 
                teaching improvement process you engaged in this quarter?',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 18
            array(
                'question_number' => 18,
                'question_text' => 'TIP data will be shared de-identified and in 
                aggregate. TIPs are NOT an evaluation of your teaching. It is useful 
                to campus-wide assessment and professional development to use specifics of individual TIPs.',
                'question_type' => 'RADIO',
                'is_active' => true,
                'question_desc' => null
            )
            
        ));
    }
}
