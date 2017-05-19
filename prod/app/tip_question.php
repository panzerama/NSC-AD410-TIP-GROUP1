<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tip_question extends Model
{
    protected $fillable = 
        ['tips_id',
        'question_id',
        'question_answer'];
    
    public function question(){
        return $this->belongsTo(question::class);
    }
    
    public function tip(){
        return $this->belongsTo(tip::class);
    }
}
