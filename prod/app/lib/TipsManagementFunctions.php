<?php 
namespace App\lib;
use DB;
class TipsManagementFunctions{
    
        
        public static function addbefore($question_number, $new_question, $question_type, $question_desc, $answers) {
           
          
            // grab all numbers greater than inactive number
            $questions = DB::table('questions')->where('question_number','>=', $question_number)->where('is_active',true)->orderBy('question_number')->select('question_id')->get();

            // renumber the remaining question numbers
            foreach($questions as $question) {
                DB::table('questions')->where('question_id',$question->question_id)->increment('question_number', 1);
            }
            // Create new question. 
            $new_id = DB::table('questions')->insertGetId(['question_number' => $question_number, 
                                            'question_text' => $new_question,
                                            'question_type' =>$question_type,
                                            'is_active' => true,
                                            'question_desc' => $question_desc ]);
        
            if(isset($answers)){
                foreach($answers as $answer){
                    if($answer != ""){
                    DB::table('answers')->insert(['question_id' => $new_id,
                                                'answer_text' => $answer,
                                                'is_active' => true]);
                    }    
                }
            }
        }
        
        
        public static function addafter($question_number, $new_question, $question_type, $question_desc, $answers) {
            // grab all numbers greater than inactive number
            $questions = DB::table('questions')->where('question_number','>', $question_number)->where('is_active',true)->orderBy('question_number')->select('question_id')->get();

            // renumber the remaining question numbers
            foreach($questions as $question) {
                DB::table('questions')->where('question_id',$question->question_id)->increment('question_number', 1);
            }
            // Create new question. 
            $new_id = DB::table('questions')->insertGetId(['question_number' => $question_number + 1, 
                                            'question_text' => $new_question,
                                            'question_type' =>$question_type,
                                            'is_active' => true,
                                            'question_desc' => $question_desc ]);
            if(isset($answers)){
                foreach($answers as $answer){
                    if($answer != ""){
                    DB::table('answers')->insert(['question_id' => $new_id,
                                                'answer_text' => $answer,
                                                'is_active' => true]);
                    }    
                }
            }                                            
        }
 
        public static function moveup($question_number) {
           
            $questions = DB::table('questions')->whereIn('question_number', [$question_number, ($question_number - 1)])->orderBy('question_number')->select('question_id','question_number')->get(); 
            $question_one = $questions[0]->question_id;
            $question_two = $questions[1]->question_id;
           
            DB::table('questions')->where('question_id',$question_one)->increment('question_number',1);
            DB::table('questions')->where('question_id',$question_two)->decrement('question_number',1);
        }
        
        public static function movedown($question_number) {
            $questions = DB::table('questions')->whereIn('question_number', [$question_number, ($question_number + 1)])->orderBy('question_number')->select('question_id','question_number')->get(); 
            $question_one = $questions[0]->question_id;
            $question_two = $questions[1]->question_id;
            DB::table('questions')->where('question_id',$question_one)->increment('question_number',1);
            DB::table('questions')->where('question_id',$question_two)->decrement('question_number',1);
        }
        
        public static function modify($question_number,$new_text,$new_desc) {
            DB::table('questions')->where('question_number', $question_number)->update(['question_text'=> $new_text,'question_desc' => $new_desc]);
        } 


        public static function inactivate($question_id) {
            $question_info = DB::table('questions')->where('question_id',$question_id)->select('question_number')->get();
            $question_number = $question_info[0]->question_number;
            // inactivate question 
            DB::table('questions')->where('question_id',$question_id)->update(array('is_active' => 0,'question_number' => 999));
            // grab all numbers greater than inactive number

            $questions = DB::table('questions')->whereBetween('question_number',[$question_number, 75])->select('question_id')->get();
            // renumber the remaining question numbers
            foreach($questions as $question) {
                DB::table('questions')->where('question_id',$question->question_id)->decrement('question_number',1);
            }
        }
        
        public static function activate($question_id) {
            $last_question = DB::table('questions')->where('is_active','=', true)->whereBetween('question_number',[1, 75])->orderBy('question_number','desc')->first();
           
            DB::table('questions')->where('question_id',$question_id)->update(['question_number' => $last_question->question_number + 1,'is_active' => true]);
        }


        public static function editlist($question_number) {
            echo "The editlist function is called.";
            exit;
        }
}
            
           