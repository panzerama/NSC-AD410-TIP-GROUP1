<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeds the database tables in sequence, building links.
     * ModelFactor requres Carbon and Faker
     *
     * @return void
     */
    public function run()
    {
        //call the various factory methods
        //in the order User, faculty, division, tips, faculty_tips, questions
        //tips_questions, answers
        
        //generate 30 users
        factory(App\User::class, 30)->create();
        
        //divisions
        factory(App\division::class, 10)->create();
        
        //generate 30 faculty. faculty are randomly assigned to a department.
        //Coverage may not be equal.
        factory(App\faculty::class, 30)->create();
        
        //generate 50 tips. Tips are randomly assigned to divisions and randomly
        //set as finished (70%) or not (30%). Date created is randomly determined
        //in a range from one year ago to four months ago. The last updated date
        //is set randomly in a range from created_at to now.
        //Relies on library Carbon
        factory(App\tip::class, 50)->create();
        
        //Generating the faculty tips table would result in bad data. This loop
        //will ensure random but comprehensive, usable data
        $tips_collection = App\tip::all();
        
        foreach($tips_collection as $key => $record){
            
            $faculty_member = App\faculty::where('division_id', $record->division_id)
                                         ->inRandomOrder()
                                         ->first();
                                         
            DB::table('faculty_tips')->insert(
                ['faculty_id' =>    $faculty_member->faculty_id,
                 'tips_id' =>       $record->tips_id]);
        } 
        
        //Questions are static for now
        DB::table('questions')->insert(array(
            // id 1
            array(
                'question_number' => 1,
                'question_text' => 'What is the problem or lesson that you identified 
                and will be discussing in this TIP? No topic is too big or too small. 
                All are welcomed!',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 2
            array(
                'question_number' => 2,
                'question_text' => 'What is the course-level objective that this 
                TIP best addresses?',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 3
            array(
                'question_number' => 3,
                'question_text' => 'Which of the college-wide Essential Learning 
                Outcomes
                 does your TIP most closely address?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 4
            array(
                'question_number' => 4,
                'question_text' => 'Which of the following best describes the evidence 
                you found for the problem?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 5
            array(
                'question_number' => 5,
                'question_text' => 'Please describe more specifically how you found 
                the problem. For example, "Based on discussion posts, 
                I realized that more than half of the class did not understand 
                the prompt and was not demonstrating the kind of comprehension I was looking for.',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 6
            array(
                'question_number' => 6,
                'question_text' => 'Please select the change that best fits what you 
                did to try to address the problem.',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 7
            array(
                'question_number' => 7,
                'question_text' => 'Specifically, what did you do to address the 
                problem? For example, "I broke the prompt down into two separate 
                discussions so that it was clearer what the students should think 
                about and write about in their posts.',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 8
            array(
                'question_number' => 8,
                'question_text' => 'Please select the evidence that best fits how
                you assessed the impact of the change you made.',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 9
            array(
                'question_number' => 9,
                'question_text' => 'Please describe more fully how you assessed 
                the impact of the change you made. For example, "After I broke the 
                prompt into two discussions, more students were able to write about 
                the ideas thoroughly. This time it was about 75% of students. 
                I might want to refine the prompts even further, but this was a good change."',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 10
            array(
                'question_number' => 10,
                'question_text' => 'What new opportunities did you consider as a result 
                of identifying this problem and making this change?',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 11
            array(
                'question_number' => 11,
                'question_text' => 'What else would you like to share about the 
                teaching improvement process you engaged in this quarter?',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            
            // id 12
            array(
                'question_number' => 12,
                'question_text' => 'TIP data will be shared de-identified and in 
                aggregate. TIPs are NOT an evaluation of your teaching. It is useful 
                to campus-wide assessment and professional development to use specifics of individual TIPs.',
                'question_type' => 'RADIO',
                'is_active' => true,
                'question_desc' => null
            )
            
        ));
        
        //generate tips_questions. like faculty tips, this is not a table that
        //can be written randomly
        $questions_collection =     App\question::all();
        $tips_collection =          App\tip::all();
        
        foreach($questions_collection as $key => $question_record){
            foreach($tips_collection as $key => $tips_record){
                factory(App\tips_question::class)->create([
                    'tips_id' => $tips_record->tips_id,
                    'question_id' => $question_record->question_id
                     ]);
            }
        }
        
        //generate answers
        
        
        //tips
        $this->call(QuestionSeeder::class);
    }
}
    