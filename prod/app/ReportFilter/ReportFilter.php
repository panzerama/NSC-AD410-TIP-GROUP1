<?php
namespace App\ReportFilter;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;

//which db models to I need
use DB;

class ReportFilter {
    
    public static function apply(Request $filters){
        $base_query = DB::table('tips')
            ->join('divisions', 'divisions.division_id', '=', 'tips.division_id')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');
        $query = 
            static::applyDecoratorsFromRequest($filters, $base_query);
            return $query;
    }
    
    private static function applyDecoratorsFromRequest(Request $filters, Builder $query){
        foreach($filters->all() as $filterName => $value) {
            Log::info('state of request filter: ' . $filterName . " : " . $value);
            
            $decorator = static::createFilterDecorator($filterName);
            
            if(static::isValidDecorator($decorator)) {
                Log::info('isValidDecorator: ' . $decorator);
                $query = $decorator::apply($query, $value);
            }
        }
        return $query; 
    }
    
    private static function createFilterDecorator($name) {
        return __NAMESPACE__ . '\\Filters\\' . 
                            str_replace(' ', '', ucwords(
                                str_replace('-', ' ', $name))); 
    }
    
    private static function isValidDecorator($decorator) {
        return class_exists($decorator);
    }
    
    private static function getResults(Builder $query){
        return $query->get();
    }
}