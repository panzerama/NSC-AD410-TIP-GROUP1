<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Functions;
use Illuminate\Support\Facades\Log;
use App\ReportFilter\ReportFilter;

class SearchController extends Controller
{
    //returns the base search query for reporting
    public static function base_constructor(){
        Log::info('state of Search Controller: base_constructor');
        $base_query = DB::table('tips')
            ->join('divisions', 'divisions.division_id', '=', 'tips.division_id')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');
        return $base_query;
    }
    
    //parses the filter request and returns the filtered query
    public static function filter_constructor(Request $request){
        Log::info('state of Search Controller: filter_constructor');
        Log::info('request uri: ' . $request->path());
        
        return ReportFilter::apply($request); //filters go here
    }

}
