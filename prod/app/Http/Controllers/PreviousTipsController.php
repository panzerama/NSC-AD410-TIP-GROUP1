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

class PreviousTipsController extends Controller
{
    public function index(){
        // get faculty id
        // join faculty tips, tips, and tips question
        // get tip id by faculty id
        // for each tip id grab quarter, year, amount of questions answer, timestamp,
        // compact it all in view along with $submitted
        $faculty_id = 9;
        $tip_information = [];
        // join tips and faculty tips to get number of tips submitted by user 
        $faculty_tips = DB::table('faculty_tips')->join('tips', 'faculty_tips.tips_id', '=', 'tips.tips_id')
                                              ->where('faculty_tips.faculty_id', '=', $faculty_id)->get();
        // get all tip questions and answer from faculty and get a count of completed answer
        $faculty_tips_questions = DB::table('faculty_tips')->select('faculty_id', 'faculty_tips.tips_id', DB::raw('COUNT(tips_questions.question_answer) as question_answered'))
                                                          ->join('tips_questions', 'faculty_tips.tips_id', '=', 'tips_questions.tips_id')
                                                          ->where('faculty_tips.faculty_id', '=', $faculty_id)
                                                          ->groupBy('tips_questions.tips_id')->get();
        
        // store information into an array of objects
        for($i = 0; $i < count($faculty_tips); $i++){
            if($faculty_tips[$i]->is_finished == 1){
            $tip_information[$i] = (object) array(
                                                  'tips_id' => $faculty_tips[$i]->tips_id,
                                                  'quarter' => $faculty_tips[$i]->quarter, 
                                                  'year' => $faculty_tips[$i]->year,
                                                  'question_answered' =>$faculty_tips_questions[$i]->question_answered,
                                                  'completed' => $faculty_tips[$i]->updated_at);
            }
            elseif($faculty_tips[$i]->is_finished == 0){
            $tip_information[$i] = (object) array(
                                                  'tips_id' => $faculty_tips[$i]->tips_id,
                                                  'quarter' => $faculty_tips[$i]->quarter, 
                                                  'year' => $faculty_tips[$i]->year,
                                                  'question_answered' =>$faculty_tips_questions[$i]->question_answered,
                                                  'completed' => 'in progress');
            }
        }
        
            return view('previoustips/index')->with('tip_information', $tip_information);
        }
        
    public function show($id){
        // will get not only answer text but also question id
        
        $previous_tips_query = DB::table('tips_questions')->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
                                                           ->where('tips_questions.tips_id', $id)->get();
        // dd($previous_tips_query);
        return view('previoustips/show', compact('previous_tips_query'));
        // ->with('previous_tips_query',$previous_tips_query);
    }
}
