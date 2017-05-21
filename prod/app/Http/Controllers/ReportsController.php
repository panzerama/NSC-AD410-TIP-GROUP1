<?php

namespace App\Http\Controllers;

class ReportsController extends Controller
{
    //1. filters for each 'report' data set
    //2. tests to confirm that each filter manipulates data correctly
    //3. consolidate db calls where possible
    //4. expand by creating a filter-select model so that we can choose which 
    //   reports to run
    //5. we'll be dealing with a base query that will be modified by the
    //   searching
    
    //admin
    public function index()
    {
        //call reportsDataBuilder 
        $reports_array = array();
        $query = DB::table('tips');
        reportsDataBuilder($reports_array, $query);
        
        return view('reports/index', ['data' => $reports_array]);
    }
    
     public function table()
    {
        return view('reports/table');
    }
    
    private function reportsDataBuilder(&$reports_array, $query){
        // aggregator that assembles the various data points for reporting
        // modeled on filter
    }
    
    private function reportFilterExample(&$reports_array, $query){
        //the report key
        $key = "thing";
        
        // amend the query if needed
        $query = $query->thing();
        
        //manipulate records and data
        
        //add the key to the array
        if(array_key_exists ($key, $reports_array)){
            //set key to query values
        } else {
            //add key-value pair
        }
    }
    
    private function tipsSummary(&$reports_array, $query){
        $key = "tips_summary";
        
        $num_finished_tips = $query->where('is_finished', 1)->count();
        $num_in_progress_tips = $query->where('is_finished', 0)->count();
        
        $num_faculty_no_tip = $query
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
            ->where('tips.is_finished', 1)
            ->groupBy('tips.faculty_id')
            ->count();
        
    }
}