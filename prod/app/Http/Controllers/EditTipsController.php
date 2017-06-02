<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\division;
use App\answer;
use DB;
use App\lib\TipsManagementFunctions;
class EditTipsController extends Controller
{
    public function index(){
        $questions = question::orderBy('question_number','asc')->get();
        $divisions = division::orderBy('is_active','desc')->get();
        $answers = answer::all();
        return view('edittips/index',compact('questions','divisions','answers'));
    }
    
    public function create(){

    }
    
    public function store(Request $request){
        /*
        $questions = question::all();
        foreach($questions as $question){
            DB::table('questions')->where('question_id',$question->question_id)->update(['question_number' => $question->question_id ,'is_active' => 1]);    
        }
        */
       // dd($questions = question::all());
        
        //dd($questions = question::all());
        //dd($request);
        // request will need type and current question
        // sort request
        // add before / add after
        // move up / move down
        // modify / inactivate
        // send request to lib function
        // redirect to edit tips index page 
//        isset($request)
// commenting this section out that Travis was monkeying with so I can test my changes
// as this is making the compile fail
//        $question_number
        // search for question 1s id using question number
//        $question_one = DB::table('questions')->where('question_number',$question_number)->select('question_id')->get();
        // search for question 2s id using question number + 1 
//        $question_two = DB::table('questions')->where('question_number',($question_number + 1))->select('question_id')->get();
        // grab question_one id
//        $question_one_id =$question_one[0]->question_id;
        // grab queston_two id
//        $question_two_id = $question_two[0]->question_id; 
        // set question 1s number to number + 1 
//        DB::table('questions')->where('question_id',$question_one_id)->update(array('question_number' => ($question_number + 1)));
        // set question 2 number to number
//        DB::table('questions')->where('question_id',$question_two_id)->update(array('question_number' => $question_number));
//        
//        
//        $number 
//        foreach number after $number
//            number = 14
//       15  set ->where(number = number)->update(number)
//
/*
        $array =             
        $second = array_slice($array, 1, 1)
        $action = 
        */
        //dd(question::all());
        
        $request_array = array_slice($request->toArray(), 5, 1);
        $action = key($request_array);
        $question_number = $request_array[$action];
    
        if (isset($action)) {
            switch ($action) {
            case 'addbefore':
                TipsManagementFunctions::addbefore($question_number, $request->question_text, $request->question_type, $request->question_desc);
                break;
            case 'addafter':
                TipsManagementFunctions::addafter($question_number, $request->question_text, $request->question_type, $request->question_desc);
                break;
            case 'moveup':
                TipsManagementFunctions::moveup($question_number);
                break;
            case 'movedown':
                TipsManagementFunctions::movedown($question_number);
                break;
            case 'modify':
                TipsManagementFunctions::modify($question_number,$request->question_text);
                break;
            case 'inactivate':
                TipsManagementFunctions::inactivate($question_number);
                break;
            case 'activate':
                TipsManagementFunctions::activate($question_number);
                break;
            case 'editlist':
                TipsManagementFunctions::editlist($question_number);
                break;
            }
        }
       // dd($questions = question::all());
        return back();
        
    }
    
    
 }