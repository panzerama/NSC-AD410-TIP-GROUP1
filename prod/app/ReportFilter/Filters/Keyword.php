<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

class Keyword {
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply($builder, $value) {
        if($value == null) {
            return $builder;
        } else {
            $builder->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id');
                    
            return $builder->where('tips_questions.question_answer', 'LIKE', '%' . $value . '%');
        }
    }
}