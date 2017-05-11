<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = 
        ['answer_id',
        'question_id',
        'answer_text',
        'is_active',
        'created_at',
        'updated_at'];
    
    public function question(){
        return $this->belongsTo(question::class);
    }
}
