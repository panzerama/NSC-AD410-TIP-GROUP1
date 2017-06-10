<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

class QuarterEnd {
    
    /**
     * Apply a given search value to the builder instance.
     * todo: preconditions?
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply($builder, $value) {
        
        if($value === '---'){ return $builder; }
        
        $date_parts = explode($value);
        $converted_year = $date_parts[1];
        $converted_quarter = strtoupper($date_parts[0]);
        
        return $builder
            ->where('tips.year', '<=', $converted_year)
            ->where('tips.quarter', '<=', $converted_quarter);
    }
}