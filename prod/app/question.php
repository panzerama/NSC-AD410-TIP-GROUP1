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
        
}
