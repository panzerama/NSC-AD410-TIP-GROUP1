<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

class Type {
    /**
     * Apply a given search value to the builder instance.
     * todo: implement when the type field is implemented on the tips model
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply($builder, $value) {
        
        if($value == "single-tips"){
            return $builder->where('tips.is_group', 0);
        } else if ($value == "group-tips"){
            return $builder->where('tips.is_group', 1);
        } else {
            return $builder;   
        }
    }
}