<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Functions;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    //returns the base search query for reporting
    public static function base_constructor(){
        Log::info('state of Search Controller: base_constructor');
        return DB::table('tips');
    }
    
    //parses the filter request and returns the filtered query
    public static function filter_constructor(Request $request){
        Log::info('state of Search Controller: filter_constructor');
        return DB::table('tips'); //filters go here
    }

}
