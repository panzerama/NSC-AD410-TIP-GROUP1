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
        //init array
        $reports_array = array();
        //create basic query - for index, this is just 'tips'
        $query = DB::table('tips');
        //pass query and array into reportsDataBuilder
        reportsDataBuilder($reports_array, $query);
        //return view with amended report array
        return view('reports/index', ['data' => $reports_array]);
    }
    
     public function table()
    {
        //return only the last 10 tips lines
        $query = DB::table('tips');
        
        $table_array = $query->get()->slice(0, 15);
        return view('reports/table');
    }
    
    private function reportsDataBuilder(&$reports_array, $query){
        // aggregator that assembles the various data points for reporting
        tipsSummary($reports_array, $query);
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
        
        //number of faculty, assuming that the faculty table is complete
        $num_faculty = DB::table('faculty')->where('is_active', 1)->count();
        
        $collect_faculty_no_tip = $query
            ->select('faculty.faculty_id')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
            ->where('tips.is_finished', 1)
            ->distinct()
            ->get();
            
        $num_faculty_no_tip = $num_faculty - $collect_faculty_no_tip->count();
        
        $reports_array[$key] = array(
            'finished_tips' => $num_finished_tips,
            'in_progress_tips' => $num_in_progress_tips,
            'not_started_tips' => $num_faculty_no_tip);

    }
}