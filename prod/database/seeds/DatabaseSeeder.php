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
        //factory(App\division::class, 10)->create();
        $this->call(DivisionSeeder::class);
        
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
            Log::info('$record id: '. $record->tips_id);
            
            $faculty_member = App\faculty::where('division_id', $record->division_id)
                                         ->inRandomOrder()
                                         ->get()
                                         ->first();
            
            Log::info('$faculty_member ' . gettype($faculty_member));
            
            if($faculty_member === null){
                $faculty_member = App\faculty::inRandomOrder()->get()->first();
                $faculty_id = $faculty_member->faculty_id;
                $record->division_id = $faculty_member->division_id; 
            } else {
                $faculty_id = $faculty_member->faculty_id;
            }
                                         
            Log::info('$faculty_member id: '. $faculty_id);
                                         
            DB::table('faculty_tips')->insert(
                ['faculty_id' =>    $faculty_id,
                 'tips_id' =>       $record->tips_id]);
        } 
        
        //Questions are static for now
        $this->call(QuestionSeeder::class);
        
        //generate tips_questions. like faculty tips, this is not a table that
        //can be written randomly
        $questions_collection =     App\question::all();
        $tips_collection =          App\tip::all();
        
        foreach($questions_collection as $key => $question_record){
            foreach($tips_collection as $key => $tips_record){
                factory(App\tips_questions::class)->create([
                    'tips_id' => $tips_record->tips_id,
                    'question_id' => $question_record->question_id
                     ]);
            }
        }
        
        //generate answers
        $this->call(AnswerSeeder::class);
    }
}
    