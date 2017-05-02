<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    //defining a many to many relation between faculty member and tip report models
    public function tips() {
        /* general layout
        belongsToMany(<model to join name>, <joining table name>, <current model id>, 
         <model being joined id>);
        http://laraveldaily.com/pivot-tables-and-many-to-many-relationships/ */
        return $this->belongsToMany('App\tip', 'faculty_tips', 'faculty_id', 'tips_id');
    }
}
