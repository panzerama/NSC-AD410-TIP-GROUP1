<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
class answer extends Model
{
    protected $fillable = 
        ['answer_id',
        'question_id',
        'answer_text',
        'is_active',
        'created_at',
        'updated_at'];
    
    protected $primaryKey = 'answer_id';  
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('answers', function (Builder $builder) {
            $builder->where('is_active', true);
        });
    }
    
    
    
    public function question(){
        return $this->belongsTo(question::class,'question_id');
    }
}
