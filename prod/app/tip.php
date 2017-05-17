<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tip extends Model
{
    protected $fillable = 
        ['tips_id',
        'division_id',
        'course_name',
        'course_number',
        'quarter',
        'year',
        'is_finished',
        'is_group'];
        
    protected $primaryKey = 'tips_id'; 
       
    public function tips_questions(){
        return $this->hasMany(tips_questions::class,'tips_id','tips_id');
    }
    
    public function division(){
        return $this->belongsTo(division::class);
    }
    
    public function faculty_tip(){
        return $this->hasMany(faculty_tip::class);
    } 
    
    public function question(){
        return $this->belongsToMany(question::class,'tips_questions','tips_id','question_id');   
    }
}
