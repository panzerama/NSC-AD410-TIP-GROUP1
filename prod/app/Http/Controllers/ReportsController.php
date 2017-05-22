<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        $base_query = DB::table('tips');
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $base_query);
        //return view with amended report array
        return view('reports/index', ['data' => $reports_array]);
    }
    
     public function table()
    {
        //return all tips with division and faculty, let frontend
        //sort out what's displayed
        $table_query = DB::table('tips')
            ->select('faculty.faculty_id')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');
        
        $table_array = $table_query->get()->slice(0, 15);
        return view('reports/table');
    }
    
    private function reportsDataBuilder(&$reports_array, $base_query){
        // aggregator that assembles the various data points for reporting
        ReportsController::tipsSummary($reports_array, $base_query);
        ReportsController::tipsByMonth($reports_array, $base_query);
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
    
    private function tipsSummary(&$reports_array, $base_query){
        $key = "tips_summary";
        
        //$summary_query = $base_query;
        
        $num_finished_tips = DB::table('tips')->where('is_finished', 1)->count();
        
        //$summary_query = $base_query;
        $num_in_progress_tips = 
            DB::table('tips')->where('is_finished', 0)->count();
        
        //number of faculty, assuming that the faculty table is complete
        $num_faculty = DB::table('faculty')->where('is_active', 1)->count();
        
        //$summary_query = $base_query;
        $collect_faculty_no_tip = DB::table('tips')
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
    
    private function tipsByMonth(&$reports_array, $base_query){
        $key = "tips_by_month";
        
        // For not, static declaration of school, year. will want this as
        // programmatic to change 
        $school_year_start = Carbon::createFromDate(2016, 7, 1);
        $school_year_end = Carbon::createFromDate(2017, 6, 30);
        
        // return only the records within school year
        $by_month_query = clone $base_query;
        $by_month_query->whereDate('updated_at', '>', $school_year_start)
                       ->whereDate('updated_at', '<', $school_year_end);
        
        // build an array of months using the school year start and end
        
        $start_month = $school_year_start->startOfMonth();
        $end_month = $school_year_end->startOfMonth();
        $month = array();
        $by_month_finished = array();
        $by_month_in_progress = array();
        
        $by_month_finished_query = clone $by_month_query;
        $by_month_finished_query->where('is_finished', 1);
        //verified by logging
        
        $by_month_in_progress_query = clone $by_month_query;
        $by_month_in_progress_query->where('is_finished', 0);
        $debug_by_month_in_progress_query = $by_month_in_progress_query->count();
        //verified by logging
        Log::info("Total number of tips in by_month_in_progress: " . 
                    $debug_by_month_in_progress_query);
        
        do{
            $start_month_plus_one = clone $start_month;
            $start_month_plus_one->addMonth();
            Log::info("Start month: " . $start_month->format('m-Y')
                      . "\nStart month plus on: " . $start_month_plus_one->format('m-Y'));
            $month[$start_month->format('m-Y')] = 
                ucfirst($start_month->format('F'));
            $by_month_finished[$start_month->format('m-Y')] 
                = $by_month_finished_query
                ->where('updated_at', '>=', $start_month)
                ->where('updated_at', '<', $start_month_plus_one)
                ->get();
            $by_month_in_progress[$start_month->format('m-Y')] 
                = $by_month_in_progress_query
                ->where('updated_at', '>=', $start_month)
                ->where('updated_at', '<', $start_month_plus_one)
                ->get();
        } while ($start_month->addMonth() <= $end_month);
        
        $reports_array[$key] = array(
            'month' => $month,
            'tips_by_month_finished' => $by_month_finished,
            'tips_by_month_in_progress' => $by_month_in_progress);
    }
    
    private function facultyByDivision(&$reports_array, $base_query){
        
    }
}