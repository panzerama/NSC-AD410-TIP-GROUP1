<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    protected $fillable = [
        'question_id',
        'question_number',
        'question_text',
        'question_type',
        'is_active',
        'question_desc'
        ];
        
    protected $primaryKey = 'question_id';    
        
    public function answer(){
        return $this->hasMany(answer::class, 'question_id', 'question_id');
    }
    
    public function tips_questions(){
        return $this->hasMany(tips_questions::class,'question_id','question_id');
    }
    
    public function tip(){
        return $this->belongsToMany(tip::class,'tips_id');
    }
        
}
