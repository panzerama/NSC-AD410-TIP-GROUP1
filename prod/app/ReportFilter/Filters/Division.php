<?php 

namespace App\ReportFilter\Filters;

use Illuminate\Database\Query\Builder;

class Division {
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply($builder, $value) {
        
        $builder
            ->join('divisions', 'divisions.division_id', '=', 'tips.division_id');
        return $builder->where('divisions.abbr', $value);
        
    }
}

/*
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');*/