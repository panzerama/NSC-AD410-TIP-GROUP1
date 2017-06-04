<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

class Course {
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply($builder, $value) {
        if($value == 'all') {
            return $builder;
        } else {
        return $builder->where('tips.course_name', 'like', $value);
        }
    }
}