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
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $base_query);
        
        $form_options = ReportsController::formOptions($base_query);
        
        //return view with amended report array
        return view('reports/index', ['data' => $reports_array, 'form_options' => $form_options]);
    }
    
    public function show(Request $request){
        
        //init array
        $reports_array = array();
        //create basic query - for index, this is just 'tips'
        $filtered_query = SearchController::filter_constructor($request);
        //pass query and array into reportsDataBuilder
        ReportsController::reportsDataBuilder($reports_array, $filtered_query);
        
        // the form options should be based on the set of all tips, not the filtered tips
        // todo: accurate?
        $form_options = ReportsController::formOptions(SearchController::base_constructor());
        
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
       
       $reports_array[$key] = $table_array;
    }
    
    private function reportsDataBuilder(&$reports_array, $base_query){
        // aggregator that assembles the various data points for reporting
        ReportsController::tipsSummary($reports_array, $base_query);
        ReportsController::tipsByMonth($reports_array, $base_query);
        ReportsController::tipsByDivision($reports_array, $base_query);
        ReportsController::indextable($reports_array, $base_query);
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
        
        //$base_query should not be operated on directly
        $summary_query = clone $base_query;
        
        //building a collection based on the query lets us manipulate the data
        //in a safe way.
        
        $summary_collection = $summary_query->get();
        
        var_dump($summary_collection);
        
        $num_finished_tips = 
            $summary_collection->where('is_finished', 1)->count();
        
        //$summary_query = $base_query;
        $num_in_progress_tips = 
            $summary_collection->where('is_finished', 0)->count();
        
        // todo find a way fo rthis to change based on the filters
        $num_faculty = $summary_collection->where('is_active', 1)->pluck('faculty_id')->unique()->count();
        
        //$summary_query = $base_query;
        $collect_faculty_with_tips = 
            $summary_collection->pluck('faculty_name')->unique()->count();
        
        /*DB::table('tips')
            ->select('faculty.faculty_id')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id')
            ->where('tips.is_finished', 1)
            ->distinct()
            ->get();
            */
            
        $num_faculty_no_tip = $num_faculty - $collect_faculty_with_tips;
        
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
    
    public static function formOptions($base_query){
        $form_options = array();
        $form_query = clone $base_query;
        
        //start and end date options
        $key = "date_options";
        $today = Carbon::today();
        $start_date = Carbon::today()->subYears(3)->firstOfQuarter();;
        while($start_date->lte($today)){
            $current_quarter = $start_date->quarter;
            
            switch($current_quarter) {
                case '1':
                    $form_options[$key][] = "Winter " . $start_date->format('Y');
                    break;
                case '2':
                    $form_options[$key][] = "Spring " . $start_date->format('Y');
                    break;
                case '3':
                    $form_options[$key][] = "Summer " . $start_date->format('Y');
                    break;
                case '4':
                    $form_options[$key][] = "Fall " . $start_date->format('Y');
                    break;
            }

            $start_date->addMonths(3);
        }
        
        //Divisions
        $key = "division_options";
        $form_options[$key] = $form_query->pluck('abbr')->unique()->all();
        
        //courses
        $key = "course_options";
        $form_options[$key] = $form_query->pluck('course_name')->unique()->all();
        
        //questions
        $key = "question_options";
        $form_options[$key] = DB::table('questions')->pluck('question_text')->all();
        
        var_dump($form_options);
        
        return $form_options;
    }
}