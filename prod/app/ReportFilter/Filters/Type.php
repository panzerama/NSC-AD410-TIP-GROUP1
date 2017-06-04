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
        
        /*$builder
            ->join('divisions', 'divisions.division_id', '=', 'tips.division_id');
        return $builder->where('divisions.abbr', $value);*/
        
    }
}