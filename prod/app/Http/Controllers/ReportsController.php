<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\SearchController;

class ReportsController extends Controller
{
    //Array keys
    // tips_summary => 
        // finished_tips => $num_finished_tips,
        // in_progress_tips => $num_in_progress_tips,
        // not_started_tips => $num_faculty_no_tip
    //tips_by_month =>
        // month => $month,
        // tips_by_month_finished => $by_month_finished,
        // tips_by_month_in_progress => $by_month_in_progress
    //tips_by_divition =>
        // division abbreviation =>
            // 'tips_by_division_finished'
            // 'tips_by_division_in_progress'
    
    //admin
    public function index()
    {
        //init array
        $reports_array = array();
        //create basic query - for index, this is just 'tips'
        $base_query = SearchController::base_constructor();
        $department_code = "";
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $base_query, $department_code);
        
        $form_options = ReportsController::formOptions($base_query);
        
        //return view with amended report array
        return view('reports/index', ['data' => $reports_array, 'form_options' => $form_options]);
    }
    
    public function show(Request $request){
        
        //init array
        $reports_array = array();
        //create basic query - for index, this is just 'tips'
        $filtered_query = SearchController::filter_constructor($request);
        $department_code = $request['division'];
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $filtered_query, $department_code);
        
        // the form options should be based on the set of all tips, not the filtered tips
        // todo: accurate?
        $form_options = ReportsController::formOptions(SearchController::base_constructor(), $request);
        
        //return view with amended report array
        return view('reports/index', ['data' => $reports_array, 'form_options' => $form_options]);
    }
    
    public function table()
    {
        //return all tips with division and faculty, let frontend
        //sort out what's displayed
        $table_query = DB::table('tips')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('divisions', 'tips.division_id', '=', 'divisions.division_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');
            
        //get collection of table info
        $table_array = $table_query->get();

        return view('reports/table', ['data' => $table_array]);
    }
    
    private function indextable(&$reports_array, $base_query)
    {
        $key = "table_data";
        
        //$base_query should not be operated on directly
        $table_query = clone $base_query;
        
         //building a collection based on the query lets us manipulate the data
        //in a safe way.
        
        //get collection of table info
        $table_array = $table_query->get();
        
        //var_dump($table_array);
       
        $reports_array[$key] = $table_array;
    }
    
    private function reportsDataBuilder(&$reports_array, $base_query, $division_code){
        // aggregator that assembles the various data points for reporting
        ReportsController::tipsSummary($reports_array, $base_query, $division_code);
        ReportsController::tipsByMonth($reports_array, $base_query);
        ReportsController::tipsByDivision($reports_array, $base_query);
        ReportsController::indextable($reports_array, $base_query);
    }
    
    private function tipsSummary(&$reports_array, $base_query, $division_code){
        $key = "tips_summary";
        
        $summary_query = clone $base_query;
        $summary_collection = $summary_query->get();
        
        //var_dump($summary_collection);
        
        $num_finished_tips = 
            $summary_collection->where('is_finished', 1)->count();
        
        $num_in_progress_tips = 
            $summary_collection->where('is_finished', 0)->count();
        
        if($division_code === ""){
            $num_faculty = DB::table('faculty')->select('faculty_id')->count();
        } else {
            $num_faculty = DB::table('faculty')
                ->join('divisions', 'faculty.division_id', '=', 'divisions.division_id')
                ->select('faculty.faculty_id')
                ->where('divisions.abbr', $division_code)
                ->count();
        }

        $collect_faculty_with_tips = 
            $summary_collection->pluck('faculty_name')->unique()->count();
        
        $num_faculty_no_tip = $num_faculty - $collect_faculty_with_tips;
        
        if($num_faculty_no_tip < 0){ $num_faculty_no_tip = 0; }
        
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
        $by_month_collection = 
            $by_month_query->select('tips.*')
                           ->whereDate('tips.updated_at', '>', $school_year_start)
                           ->whereDate('tips.updated_at', '<', $school_year_end)
                           ->get();
        
        // build an array of months using the school year start and end
        
        $start_month = $school_year_start->startOfMonth();
        $end_month = $school_year_end->startOfMonth();
        
        $month = array();
        $by_month_finished = array();
        $by_month_in_progress = array();
        
        /*$by_month_finished = $by_month_collection->where('is_finished', 1);
        $by_month_in_progress = $by_month_collection->where('is_finished', 0);*/
        
        do{
            $start_month_plus_one = clone $start_month;
            $start_month_plus_one->addMonth();
            
            $month[$start_month->format('m-Y')] = 
                ucfirst($start_month->format('M'));
                
            $by_month_finished[$start_month->format('m-Y')] 
                = $by_month_collection
                    ->where('is_finished', 1)
                    ->where('updated_at', '>=', $start_month)
                    ->where('updated_at', '<', $start_month_plus_one)
                    ->count();
            $by_month_in_progress[$start_month->format('m-Y')] 
                = $by_month_collection
                    ->where('is_finished', 0)
                    ->where('updated_at', '>=', $start_month)
                    ->where('updated_at', '<', $start_month_plus_one)
                    ->count();
        } while ($start_month->addMonth() <= $end_month);
        
        $reports_array[$key] = array(
            'month' => $month,
            'tips_by_month_finished' => $by_month_finished,
            'tips_by_month_in_progress' => $by_month_in_progress);
    }
    
    private function tipsByDivision(&$reports_array, $base_query){
        $key = "tips_by_division";
        
        $division_query = clone $base_query;
        
        $division_collection = $division_query->get();
            
        $list_of_divisions = $division_collection
                                ->pluck('abbr')
                                ->unique();
                                
        $tips_by_division = array();
                                
        foreach($list_of_divisions as $idx => $division){
            $tips_by_division_finished = 
                $division_collection->where('abbr', '=', $division)
                                    ->where('is_finished', 1)
                                    ->count();
                                    
            $tips_by_division_in_progress =  
                $division_collection->where('abbr', '=', $division)
                                    ->where('is_finished', 0)
                                    ->count();
       
            $tips_by_division[$division] = 
                array('tips_by_division_finished' => $tips_by_division_finished,
                      'tips_by_division_in_progress' => $tips_by_division_in_progress); 
        }
        
        $reports_array[$key] = $tips_by_division;
        
    }
    
    public function tabledemo()
    {
        return view('reports/table-demo');
    }
    
    public function reportsdemo()
    {
        //init array
        $reports_array = array();
        //create basic query - for index, this is just 'tips'
        $base_query = DB::table('tips');
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $base_query);
        //return view with amended report array
        return view('reports/reports-demo', ['data' => $reports_array]);
    }
    
    public function qareports()
    {
        return view('reports/qareports');
    }
    
    public static function formOptions($base_query, Request $request = null){
        $form_options = array();
        $form_query = clone $base_query;
        
        ReportsController::startDateOptions($form_options, $request);
        ReportsController::endDateOptions($form_options, $request);
        ReportsController::divisionOptions($form_query, $form_options, $request);
        ReportsController::courseOptions($form_query, $form_options, $request);
        ReportsController::questionOptions($form_query, $form_options, $request);
        $form_options['keyword'] = $request['keyword'];
        
        return $form_options;
    }
    
    public static function startDateOptions(&$form_options, $request){
        //start date options
        if($request != null){
            $selection_start_date = $request['quarter-start'];
        } else {
            $selection_start_date = "";
        }
        
        $key = "start_date_options";
        $today = Carbon::today();
        $start_date = Carbon::today()->subYears(3)->firstOfQuarter();;
        while($start_date->lte($today)){
            $current_quarter = $start_date->quarter;
            $next_date_option = "";
            $is_selected = false;
            
            switch($current_quarter) {
                case '1':
                    $next_date_option = "Winter " . $start_date->format('Y');
                    break;
                case '2':
                    $next_date_option = "Spring " . $start_date->format('Y');
                    break;
                case '3':
                    $next_date_option = "Summer " . $start_date->format('Y');
                    break;
                case '4':
                    $next_date_option = "Fall " . $start_date->format('Y');
                    break;
            }
            
            if($next_date_option === $selection_start_date){ $is_selected = true; }
            
            $form_options[$key][] = array($next_date_option, $is_selected);
            $start_date->addMonths(3);
        }
    }
    
    public static function endDateOptions(&$form_options, $request){
        //end date options
        if($request != null){
            $selection_end_date = $request['quarter-end'];
        } else {
            $selection_end_date = "";
        }
        
        $key = "end_date_options";
        $today = Carbon::today();
        $start_date = Carbon::today()->subYears(3)->firstOfQuarter();;
        while($start_date->lte($today)){
            $current_quarter = $start_date->quarter;
            $next_date_option = "";
            $is_selected = false;
            
            switch($current_quarter) {
                case '1':
                    $next_date_option = "Winter " . $start_date->format('Y');
                    break;
                case '2':
                    $next_date_option = "Spring " . $start_date->format('Y');
                    break;
                case '3':
                    $next_date_option = "Summer " . $start_date->format('Y');
                    break;
                case '4':
                    $next_date_option = "Fall " . $start_date->format('Y');
                    break;
            }
            
            if($next_date_option === $selection_end_date){ $is_selected = true; }
            
            $form_options[$key][] = array($next_date_option, $is_selected);
            $start_date->addMonths(3);
        }
    }
    
    public static function divisionOptions($form_query, &$form_options, $request){
        //Divisions
        $key = "division_options";
        
        $divisions_list = $form_query->pluck('abbr')->unique()->all();
        
        foreach($divisions_list as $division){
            if($division == $request['division']){
                $form_options[$key][] = array($division, true);
            } else {
                $form_options[$key][] = array($division, false);
            }
        }
    }
    
    public static function courseOptions($form_query, &$form_options, $request){
        //courses
        $key = "course_options";
        $course_list = $form_query->pluck('course_name')->unique()->all();
        
        foreach($course_list as $course){
            if($course == $request['course']){
                $form_options[$key][] = array($course, true);
            } else {
                $form_options[$key][] = array($course, false);
            }
        }
    }
    
    public static function questionOptions($form_query, &$form_options, $request){
        //questions
        $key = "question_options";
        $question_list = DB::table('questions')->pluck('question_text')->all();
        
        foreach($question_list as $question){
            if($question == $request['question']){
                $form_options[$key][] = array($question, true);
            } else {
                $form_options[$key][] = array($question, false);
            }
        }
    }
}