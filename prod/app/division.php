<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
     protected $fillable = 
        ['division_id',
        'division_name',
        'abbr',
        'is_active',];
        
    public function faculty(){
        $this->hasOne('App\faculty');
    }
    
    public function tip(){
        $this->hasOne('App\tip');
    }
}
