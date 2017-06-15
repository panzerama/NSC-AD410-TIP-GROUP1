<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\division;
use App\answer;
use App\tips_questions;
use DB;
use App\lib\TipsManagementFunctions;
class EditTipsController extends Controller
{
    // Creates view and assigns question list for Edit Tips page.  
    public function index(){
        $questions = question::orderBy('question_number','asc')->get();
        
        return view('edittips/index',compact('questions'));
    }
    
    public function show(){

    }
    
    public function store(Request $request){
    // Splits request array to get question and action types. Converts Question Type to DB names. Uses action
    // type to route the request to the Function Library. Question_number is either the number or the id depending
    // on the function. 
    
        if($request->input('activate') == null && $request->input('inactivate') == null){
        $request_array = array_slice($request->toArray(), 6, 1);
        $type = $request->q_type;
        switch($type){
            case 'text_box':
                $type = "TEXT";
                break;
            case 'drop_down_list':
                $type = "DROPDOWN";
                break;
            case 'check_box':
                $type = "CHECKBOX";
                break;
            case "radio_button":
                $type = "RADIO";
                break;
        }
        $action = key($request_array);
        $question_number = $request_array[$action];
        } elseif($request->input('inactivate') == null){
            $action = 'activate';
            $question_number = $request->input('activate');
        } else {
            $action = 'inactivate';
            $question_number = $request->input('inactivate');            
        }  
        if (isset($action)) {
            switch ($action) {
            case 'addbefore':
                TipsManagementFunctions::addbefore($question_number, $request->question_text, $type, $request->question_desc, $request->a_d);
                break;
            case 'addafter':
                TipsManagementFunctions::addafter($question_number, $request->question_text, $type, $request->question_desc, $request->a_d);
                break;
            case 'moveup':
                if($question_number == 1){
                    break;
                } else {
                TipsManagementFunctions::moveup($question_number);
                }
                break;
            case 'movedown':
                TipsManagementFunctions::movedown($question_number);
                break;
            case 'modify':
                TipsManagementFunctions::modify($question_number,$request->question_text,$request->question_desc);
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
     
        return back();
        
    }
    
    
 }