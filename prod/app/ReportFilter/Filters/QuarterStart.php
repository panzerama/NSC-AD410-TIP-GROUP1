<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

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
        $date_parts = explode($value);
        $converted_year = $date_parts[1];
        
        switch(strtolower($date_parts[0])){
            case "spring":
                $converted_quarter = 3;
                break;
                
            case "summer":
                $converted_quarter = 4;
                break;
                
            case "fall":
                $converted_quarter = 1;
                break;
                
            case "winter":
                $converted_quarter = 2;
                break;
        }
        
        return $builder
            ->where('tips.year', '>=', $converted_year)
            ->where('tips.quarter', '>=', $converted_quarter);
        
    }
}