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
        
        $date_parts = explode(' ', $value);
        $converted_year = (int)$date_parts[1];
        $converted_quarter = strtoupper($date_parts[0]);
        
        if($converted_quarter === "WINTER"){
            $possible_quarters = array("WINTER");
        } elseif ($converted_quarter === "SPRING") {
            $possible_quarters = array("WINTER", "SPRING");
        } elseif ($converted_quarter === "SUMMER") {
            $possible_quarters = array("WINTER", "SPRING", "SUMMER");
        } else {
            $possible_quarters = array("WINTER", "SPRING", "SUMMER", "FALL");
        }
        
        return $builder
            ->where('tips.year', '<=', $converted_year);
            /*->orWhere(function ($query) use ($possible_quarters, $converted_year) {
                $query->where('tips.year', '=', $converted_year)
                      ->whereIn('tips.quarter', $possible_quarters);
            });*/
    }
}