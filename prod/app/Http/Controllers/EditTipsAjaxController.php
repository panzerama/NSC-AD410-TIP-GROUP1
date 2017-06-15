<?php

namespace App\Http\Controllers;
use DB;
use App\answer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class EditTipsAjaxController extends Controller
{
    
    public function index($id){
        $answers = answer::where('question_id',$id)->get();
        return $answers;
    }
    
    public function show($id){
        $answers = answer::withoutGlobalScopes()->where('question_id',$id)->where('is_active',false)->get();
        return $answers;
    }
    
    public function store(Request $request){
        $question_id = request('question_id');
        $answer_text = request('answer_text');
        
        DB::table('answers')->insert(['question_id' => $question_id,
                                      'answer_text' => $answer_text,
                                      'is_active'   => true]);
    }    
    
    
    
    public function update(Request $request){
       
        $question_id = request('question_id');
        $answer_id = request('answer_id');
        $answer_text = request('answer_text');

        DB::table('answers')->where('answer_id',$answer_id)->update(['answer_text' => $answer_text]);
       
    }
    
    public function destroy(Request $request){
        $question_id = request('question_id');
        $answer_id = request('answer_id');
        DB::table('answers')->where('answer_id',$answer_id)->where('question_id',$question_id)->update(['is_active' => false]);
    }
}
