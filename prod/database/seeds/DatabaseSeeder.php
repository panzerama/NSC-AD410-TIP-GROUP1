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
        
        
        //generate tips_questions
        //generate answers
        
        
        
        //tips
        $this->call(QuestionSeeder::class);
    }
}
    