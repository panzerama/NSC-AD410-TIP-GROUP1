<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class tip extends model
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
<<<<<<< HEAD
        
=======
    
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
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
