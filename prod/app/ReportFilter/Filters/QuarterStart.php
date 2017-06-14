<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;

class QuarterStart {
    
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
            $possible_quarters = array("WINTER", "SPRING", "SUMMER", "FALL");
        } elseif ($converted_quarter === "SPRING") {
            $possible_quarters = array("SPRING", "SUMMER", "FALL");
        } elseif ($converted_quarter === "SUMMER") {
            $possible_quarters = array("SUMMER", "FALL");
        } else {
            $possible_quarters = array("FALL");
        }
        
        Log::info('QuarterStart: ' . $date_parts[1]);
        Log::info('Possible Quarters: ' . implode(" ", $possible_quarters));
        
        
        return $builder
            ->where('tips.year', '>=', $converted_year)
            ->orWhere(function ($query) use ($possible_quarters, $converted_year) {
                $query->where('tips.year', '=', $converted_year)
                      ->whereIn('tips.quarter', $possible_quarters);
            });
        
    }
}