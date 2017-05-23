<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tips_questions extends Model
{
    protected $fillable = 
        ['tips_id',
        'question_id',
        'question_answer'];
    
    public function question(){
        return $this->belongsTo(question::class,'question_id','question_id');
    }
    
    public function tip(){
        return $this->belongsTo(tip::class,'tips_id');
    }
    
    
    public function answer(){
    return $this->hasManyThough(tips_questions::class , answer::class,'question_id','question_id','question_id');
    }
}
