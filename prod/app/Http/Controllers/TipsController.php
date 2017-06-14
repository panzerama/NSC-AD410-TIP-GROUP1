<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\tip;
use App\tips_questions;
use App\faculty;
use App\faculty_tip;
use App\division;
use DB;
class TipsController extends Controller
{

    public function index()
    {   
        // dd(DB::table('faculty')->get());
        // dd(DB::table('faculty_tips')->get());
        // dd(DB::table('tips'->get());
        // first check db to see if divisions table has these collumns 
        // very important need these division in order for save to work correctly
        // if these division are not in the db insert them ONCE and then comment it out
        // dd(DB::table('divisions')->get());
        // DB::table('divisions')->insert(array(
        //     // for index view
        //     array(
        //         'division_name' => 'Arts, Humanities, and Social Sciences',
        //         'abbr' => 'AHSS',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Business Engineering and Information Technology',
        //         'abbr' => 'BEIT',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Business and Transitional Studies',
        //         'abbr' => 'BTS',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Health and Humanities',
        //         'abbr' => 'HHS',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Library',
        //         'abbr' => 'LIB',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Math and Science',
        //         'abbr' => 'M&S',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Work Force Instruction',
        //         'abbr' => 'WFI',
        //         'is_active' => true
        //     )
        // ));
        $faculty_id =1; // Change this to a faculty id that has only one tip two unfinished tips will mess up query
        // keep the same faculty id thorughout the whole controller

        
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
                                      ->where('is_author', '=', 1)
                                      ->select('tips.tips_id')->get();
 
 
        if(!isset($tip_query[0])) {
            // create new tips entry 
             $tips_id = DB::table('tips')->insertGetId(array(
                            'is_finished' => 0,
                            'is_active' => 1,
                        ));
                   
            // create entry in linking table
            // insert is author when in db
            DB::table('faculty_tips')->insert(array('faculty_id' => $faculty_id,'tips_id' => $tips_id, 'is_author' => 1)); 
            
            // create questions template
            $create_questions = DB::table('questions')
                                    ->where('is_active',1)
                                    ->select('question_id')->get();

            // create tips_questions using parsed question info.
            foreach($create_questions as $question) {
                    tips_questions::create([
                        'tips_id' => $tips_id,
                        'question_id' => $question->question_id,
                       ]);
            }           
        } 
        else {
             $tips_id = $tip_query[0]->tips_id; 
        }

        $questions = question::whereHas('tips_questions', function ($query) use ($tips_id) {
                        $query->where('tips_id', '=', $tips_id);
                                })->get();
        // retrieve all existing answers for active tip                        
        $existing_answers = tips_questions::where('tips_id', '=', $tips_id)->get(); 
        // retrieve all faculty names
        $faculty_names = DB::table('faculty')->select('faculty_name')->get();
        // get answer to first question, if not empty string hide the first question
        $question_one = DB::table('tips_questions')
                        ->where('tips_id',$tips_id)
                        ->where('question_id', 1)->get();
        return view('tips/index',compact('questions','existing_answers', 'faculty_names','question_one')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // replace with auth id when implemented
        $faculty_id = 1;
        
        // check if user has an active tip.
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
                                      ->where('is_author', '=', 1)
                                      ->select('tips.tips_id')->get();
  
        if(!isset($tip_query[0])) {
            // if no tip exists redirect to tips index.
            return redirect('/tip/');
        } 
        else {
            $tips_id = $tip_query[0]->tips_id; 
        }

        // retrieve all questions for active tip
        $questions = question::whereHas('tips_questions', function ($query) use ($tips_id){
                        $query->where('tips_id', '=', $tips_id);})->get();
        // retrieve all existing answers for active tip                        
        $existing_answers = tips_questions::where('tips_id', '=', $tips_id)->get();
        
        return view('tips/create', compact('questions','existing_answers')); // Returns view for tips/create.blade.php
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // test id do not change will replace once auth is authenticated
        $faculty_id = 1;
        // query to find current tip
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
                                      ->select('tips.tips_id')->get();
                                      
        // set tip id to be first number in array
        $tips_id = $tip_query[0]->tips_id;
        
           // find the tip questions
        $tips_question = question::whereHas('tips_questions', function ($query) use ($tips_id){
                            $query->where('tips_id', '=', $tips_id);})->get();

        // if request is continue update tips_question table and store required information into tips table
        if($request->has('continue')){
            // dd(DB::table('faculty')->get());
            // validate 1-6 is a must because validation on tip/questions page for 1-6
            // is nullable
            $this->validate($request,[
                '0'     => 'nullable',
                '1'     => 'required',
                '2'     => 'required',
                '3'     => 'required|max:10',
                '4'     => 'required|max:10',
                '5'     => 'required',
                '6'     => 'required|integer'
                ]);
            
        // update answers in tips_questions according to tip id 
        // only questions within the index page will be updated
        // keep count for requesting question from $request data
        $count = 1; 
        foreach($tips_question as $question) {
                
                // request the answer user has given by requesting the id of the question
                $faculty_answer = request($count);
                // update the first six answers in tips_questions
                if($count < 7){
                tips_questions::where('tips_id', $tips_id )->where('question_id', $question->question_id)
                                                          ->update(['question_answer' => $faculty_answer]);
                }
            $count++;
        }
        // request individual json to update tips table
        $individual_or_group = request(1);
        $division_name = request(2);
        $course_prefix = request(3);
        $course_number = request(4);
        $quarter = request(5);
        $year = intval(request(6));
        // get division id based on abbreviation
        $division_id = DB::table('divisions')->select('division_id')
                                             ->where('abbr', $division_name)->get();
        
        // if tip is indiviual update tips table with values user submit from index and set is_group to 0
        if($individual_or_group == "Individual"){
            DB::table('tips')->where('tips_id', $tips_id)
                             ->update(['division_id' => $division_id[0]->division_id,
                                       'course_name' => $course_prefix,
                                       'course_number' => $course_number,
                                       'quarter' => $quarter,
                                       'year' => $year,
                                       'is_group' => 0]);
            
        }
        // still update tips but change is group to true and update faculty tips for each staff members
        else if($individual_or_group == "Group"){
            $members = request('tip-members');
            if(!empty($members[0])){
                foreach ($members as $faculty) {
                    // get member name
                    // get id based on name
                    // check to see if faculty exist
                    // if not redirect back with flash message
                    // if faculty exist check to see if faculty has tip
                    // if not insert faculty and tip id into faculty_tips
                    $faculty = trim($faculty);
                    $faculty_array = DB::table('faculty')->select('faculty_id')
                                                         ->where('faculty_name', $faculty)->get();
                    // if $faculty id is not set redirect back with error
                    if(count($faculty_array) < 1){
                        \Session::flash('message', "one or more faculties does not exist");
                        return redirect('/tip/');
                        
                    }
                    
                    else{
                    $faculty_id = $faculty_array[0]->faculty_id;
                    $faculty_tip_query = DB::table('faculty_tips')->where('faculty_id', $faculty_id)
                                                                  ->where('tips_id',$tips_id)->get();
                    
                    if(!isset($faculty_tip_query[0])){
                        // insert is_author when implemented
                        DB::table('faculty_tips')->insert(array('faculty_id' => $faculty_id,'tips_id' => $tips_id, 'is_author' => 0));
                    }
                    }
                }
            }
            // update tips with is_group set to true
           DB::table('tips')->where('tips_id', $tips_id)
                            ->update(['division_id' => $division_id[0]->division_id,
                                      'course_name' => $course_prefix,
                                      'course_number' => $course_number,
                                      'quarter' => $quarter,
                                      'year' => $year,
                                      'is_group' => 1]);
        }
         return redirect('/tip/questions');
        }
        else if($request->has('save')){
        $count = 1;
        // update answers according to tip id 
        // only questions within the create page will be updated
        foreach($tips_question as $question) {
                if($count > 6){
                    $faculty_answer = request($count);
                    
                    tips_questions::where('tips_id', $tips_id )
                                    ->where('question_id',$question->question_id)
                                    ->update(['question_answer' => $faculty_answer]);
                }
                $count++;
        }
         return redirect('/tip/questions');
        }
        else if($request->has('submit')){
            // validate all fields
            // keep first seven nullable
            // change validation based on questions
            $this->validate($request, [
            '1'     => 'nullable',
            '2'     => 'nullable',
            '3'     => 'nullable',
            '4'     => 'nullable',
            '5'     => 'nullable',
            '6'     => 'nullable',
            '7'     => 'nullable',
            '8'     => 'required|max:2000',
            '9'     => 'required|max:2000',
            '10'    => 'required',
            '11'    => 'required',
            '12'    => 'required|max:2000',
            '13'    => 'required',
            '14'    => 'required|max:2000',
            '15'    => 'required',
            '16'    => 'required|max:2000',
            '17'    => 'required',
            '18'    => 'required|max:2000',
            '19'    => 'required'
        ]);
        // insert into db and switch flag to is finished
        $count = 1;
        foreach($tips_question as $question) {
            if($count > 6){
        $faculty_answer = request($count);
        tips_questions::where('tips_id', $tips_id )
                        ->where('question_id', $question->question_id)
                        ->update(['question_answer' => $faculty_answer]);
        }
         $count++;
        }
         tip::where('tips_id', $tips_id)
            ->update(['is_finished' => 1]);
         return redirect('/tip/previous')->with('status', 'tip submmitted');  
        }
    }


}
