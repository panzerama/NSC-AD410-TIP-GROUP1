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
        
    public function tip_question(){
        return $this->hasMany(tip_question::class);
    }
    
    public function division(){
        return $this->belongsTo(division::class);
    }
    
    public function faculty_tip(){
        return $this->hasMany(faculty_tip::class);
    }
}
