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
        // dd(DB::table('faculty_tips')->get());
        // dd(DB::table('faculty_tips')->get());
        // DB::table('divisions')->insert(array(
        //     // for index view
        //     array(
        //         'division_name' => 'Accounting',
        //         'abbr' => 'ACCT',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'Adult Basic Education',
        //         'abbr' => 'ABE',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'American Ethnic and Race Relations',
        //         'abbr' => 'AME',
        //         'is_active' => true
        //     ),
        //     array(
        //         'division_name' => 'American Sign Language',
        //         'abbr' => 'ASL',
        //         'is_active' => true
        //     )
        // ));
        $faculty_id =9; // Do not change this!!

        
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
                                      ->select('tips.tips_id')->get();
 
 
        if(!isset($tip_query[0])) {
            // create new tips entry 
             $tips_id = DB::table('tips')->insertGetId(array(
                            'is_finished' => 0,
                            'is_active' => 1,
                        ));
                   
            // create entry in linking table
            DB::table('faculty_tips')->insert(array('faculty_id' => $faculty_id,'tips_id' => $tips_id)); 
            
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

        // retrieve all questions for active tip
        $questions = question::whereHas('tips_questions', function ($query) use ($tips_id) {
                        $query->where('tips_id', '=', $tips_id);
                                })->get();
        // retrieve all existing answers for active tip                        
        $existing_answers = tips_questions::where('tips_id', '=', $tips_id)->get();                        
        return view('tips/index',compact('questions','existing_answers')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // replace with auth id when implemented
        $faculty_id = 9;
        
        // check if user has an active tip.
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
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
        // dd(DB::table('divisions')->get());
        $faculty_id = 9;
        
        // query to find current tip
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
                                      ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                      ->where('faculty.faculty_id','=',$faculty_id)
                                      ->where('is_finished','=',0)
                                      ->select('tips.tips_id')->get();
                                      
        // set tip id to be first number in array
        $tips_id = $tip_query[0]->tips_id;
        
           // find the tip questions
        $tips_question = DB::table('tips_questions')->where('tips_id',$tips_id)
                                                   ->select('question_id')->get();

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
            foreach($tips_question as $question) {
                    // request the answer user has given by requesting the id of the question
                    $faculty_answer = request($question->question_id);
                    // update the first six answers in tips_questions
                    if($question->question_id < 7){
                    tips_questions::where('tips_id', $tips_id )->where('question_id', $question->question_id)
                                                              ->update(['question_answer' => $faculty_answer]);
                    }
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
            foreach ($members as $faculty) {
                // get member name
                // get id based on name
                // check to see if faculty has tip
                // if not insert faculty and tip id into faculty_tips
                // TODO validate faculty name make sure the name matches database
                $faculty = trim($faculty);
                $faculty_array = DB::table('faculty')->select('faculty_id')
                                                     ->where('faculty_name', $faculty)->get();
                $faculty_id = $faculty_array[0]->faculty_id;
                $faculty_tip_query = DB::table('faculty_tips')->where('faculty_id', $faculty_id)
                                                              ->where('tips_id',$tips_id)->get();
                
                if(!isset($faculty_tip_query[0])){
                    DB::table('faculty_tips')->insert(array('faculty_id' => $faculty_id,'tips_id' => $tips_id));
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
            
        // update answers according to tip id 
        // only questions within the create page will be updated
        foreach($tips_question as $question) {
                if($question->question_id > 6){
                    $faculty_answer = request($question->question_id);
                    
                    tips_questions::where('tips_id', $tips_id )
                                    ->where('question_id', $question->question_id)
                                    ->update(['question_answer' => $faculty_answer]);
                }
                
        }
         return redirect('/tip/questions');
        }
        else if($request->has('submit')){
            // validate all fields
            $this->validate($request, [
            '1'     => 'nullable',
            '2'     => 'nullable',
            '3'     => 'nullable',
            '4'     => 'nullable',
            '5'     => 'nullable',
            '6'     => 'nullable',
            '7'     => 'nullable',
            '8'     => 'required',
            '9'     => 'required',
            '10'    => 'required',
            '11'    => 'required',
            '12'    => 'required',
            '13'    => 'required',
            '14'    => 'required',
            '15'    => 'required',
            '16'    => 'required',
            '17'    => 'required',
            '18'    => 'required',
        ]);
        // insert into db and switch flag to is finished
        foreach($tips_question as $question) {
            if($question->question_id > 6){
        $faculty_answer = request($question->question_id);
        tips_questions::where('tips_id', $tips_id )
                        ->where('question_id', $question->question_id)
                        ->update(['question_answer' => $faculty_answer]);
        }
        tip::where('tips_id', $tips_id)
            ->update(['is_finished' => 1]);
         return redirect('/tip/previous')->with('status', 'tip submmitted');    
        }
        }

        //return view('/tips/index',compact('tip'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       dd($questions = question::where('is_active',1)->get());
        return view('tips/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        /*
        $is_finished = request('is_finished');
        $tip_id = request('tip_id');
        
        // get question ids for all active questions. 
        $questions = DB::table('questions')->where('is_active',1)->select('question_id')->get();
        foreach ($questions as $question) {
            tips_questions::create([
                'tip_id' => $tip_id,
                'question_id' => $question->question_id,
                'answer_text' => request($question->question_id)
            ]);    
        if($is_finished) {
            // set tips->is finished to true and redirect to dashboard?
        } else {
            // redirect to tips page. 
        }
        */
        
    }
    
    public function destroy($id)
    {
        //
    }
}
