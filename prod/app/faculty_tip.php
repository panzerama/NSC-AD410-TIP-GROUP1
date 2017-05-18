<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty_tip extends Model
{
    
     protected $fillable = 
        ['faculty_id',
        'tips_id'];
    //
    public function faculty() {
        $this->hasOne('App\faculty');
    }
    
    public function tip() {
        $this->hasOne('App\tip');
    }
}
