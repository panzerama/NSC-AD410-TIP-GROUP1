<?php
namespace App\ReportFilter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

//which db models to I need
use DB;

use Illuminate\Support\Facades\Log;

class ReportFilter {
    
    public static function apply(Request $filters){
        $base_query = DB::table('tips');
        $query = 
            static::applyDecoratorsFromRequest($filters, $base_query);
            return static::getResults($query);
    }
    
    private static function applyDecoratorsFromRequest(Request $filters, Builder $query){
        foreach($filters->all() as $filterName => $value) {
            Log::info('state of request filter: ' . $filterName . " : " . $value);
            
            /*$decorator = static::createFilterDecorator($filterName);
            
            if(static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);*/
            }
        }
        return $query; //Call to 
    }
    
    private static function createFilterDecorator($name) {
        return __NAMESPACE__ . '\\Filters\\' . 
                            str_replace(' ', '', ucwords(
                                str_replace('_', ' ', $name))); 
    }
    
    private static function isValidDecorator($decorator) {
        return class_exists($decorator);
    }
    
    private static function getResults(Builder $query){
        return $query->get();
    }
}