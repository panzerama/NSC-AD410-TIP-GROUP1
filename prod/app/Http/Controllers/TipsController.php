<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\tip;
use App\tips_questions;
use App\faculty;
use App\faculty_tip;
use DB;
class TipsController extends Controller
{

    public function index()
    {   
        
        // replace with auth id when implemented
        $faculty_id =3; // Do not change this!!


        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                        ->where('faculty.faculty_id','=',$faculty_id)->where('is_finished','=',0)->select('tips.tips_id')->get();
 
 
        if(!isset($tip_query[0])) {
            // create new tips entry 
             $tips_id = DB::table('tips')->insertGetId(array(
                   'is_finished' => 0,
                   'is_active' => 1,
                    ));
                   
            // create entry in linking table
            DB::table('faculty_tips')->insert(array('faculty_id' => $faculty_id,'tips_id' => $tips_id)); 
            
            // create questions template
            $create_questions = DB::table('questions')->where('is_active',1)->select('question_id')->get();

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
        $faculty_id = 3;
        
        // check if user has an active tip.
        $tip_query = DB::table('tips')->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
                                        ->where('faculty.faculty_id','=',$faculty_id)->where('is_finished','=',0)->select('tips.tips_id')->get();
  
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
