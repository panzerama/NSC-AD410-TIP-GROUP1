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
    //JDP - Flag for refactor
    
    //Array keys
    // tips_summary => 
        // finished_tips => $num_finished_tips,
        // in_progress_tips => $num_in_progress_tips,
        // not_started_tips => $num_faculty_no_tip
    //tips_by_month =>
        // month => $month,
        // tips_by_month_finished => $by_month_finished,
        // tips_by_month_in_progress => $by_month_in_progress
    //tips_by_division =>
        // division abbreviation =>
            // 'tips_by_division_finished'
            // 'tips_by_division_in_progress'
    
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
        $table_query
            ->select('tips.*', 'faculty.*', 'divisions.*')
            ->join('faculty_tips', 'tips.tips_id', '=', 'faculty_tips.tips_id')
            ->join('divisions', 'tips.division_id', '=', 'divisions.division_id')
            ->join('faculty', 'faculty_tips.faculty_id', '=', 'faculty.faculty_id');
        
        //get collection of table info
        $table_array = $table_query->get();
       
       $reports_array[$key] = $table_array;
    }
    
    private function reportsDataBuilder(&$reports_array, $base_query){
        // aggregator that assembles the various data points for reporting
        ReportsController::tipsSummary($reports_array, $base_query);
        ReportsController::tipsByMonth($reports_array, $base_query);
        ReportsController::tipsByDivision($reports_array, $base_query);
        ReportsController::evidenceChangeNeeded($reports_array, $base_query);
        ReportsController::howImpactAssessed($reports_array, $base_query);
        ReportsController::typeOfChange($reports_array, $base_query);
        ReportsController::newOpportunities($reports_array, $base_query);
        ReportsController::primaryELOadded($reports_array, $base_query);
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
        $summary_query
            ->select('tips.*', 'faculty.*')
            ->join('faculty_tips', 
                   'tips.tips_id', 
                   '=', 
                   'faculty_tips.tips_id')
            ->join('faculty', 
                   'faculty_tips.faculty_id', 
                   '=', 
                   'faculty.faculty_id');
        
        $summary_collection = $summary_query->get();
        
        $num_finished_tips = 
            $summary_collection->where('is_finished', 1)->count();
        
        //$summary_query = $base_query;
        $num_in_progress_tips = 
            $summary_collection->where('is_finished', 0)->count();
        
        //number of faculty, assuming that the faculty table is complete
        //is there a way to refactor this?
        $num_faculty = DB::table('faculty')->where('is_active', 1)->count();
        
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
                           ->whereDate('updated_at', '>', $school_year_start)
                           ->whereDate('updated_at', '<', $school_year_end)
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
        
        $division_collection = $division_query
            ->join('divisions', 'divisions.division_id', '=', 'tips.division_id')
            ->get();
            
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
    
    private function evidenceChangeNeeded(&$reports_array, $base_query){

        $key = "evidence_change_needed";
        
        $qa_query = clone $base_query;
        
        $qa_query
            ->select('tips.*', 'questions.*', 'answers.*')
            ->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id')
            ->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
            ->join('answers', 'questions.question_id', '=', 'answers.question_id')
            ->where('questions.question_number', 10);

        $answer_collection = $qa_query->get();
        
        $list_of_answers = $answer_collection
                                ->pluck('answer_text')
                                ->unique();
        
        foreach($list_of_answers as $idx => $answer){
            $countByChangeNeeded =
                  $answer_collection->where('is_finished', 1)
                                    ->count();
        
        $evidence_change_needed[$answer] = 
                array('countByChangeNeeded' => $countByChangeNeeded); 
        }
       
       $reports_array[$key] = $evidence_change_needed;
        
    }
    
    private function howImpactAssessed(&$reports_array, $base_query){

        $key = "how_impact_assessed";
        
        $qa_query = clone $base_query;
        
        $qa_query
            ->select('tips.*', 'questions.*', 'answers.*')
            ->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id')
            ->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
            ->join('answers', 'questions.question_id', '=', 'answers.question_id')
            ->where('question_number', 14);
        
        $answer_collection = $qa_query->get();
                                
        $list_of_answers = $answer_collection
                                ->pluck('answer_text')
                                ->unique();
        
        foreach($list_of_answers as $idx => $answer){
            $countByImpactAssessed =
                  $answer_collection->where('is_finished', 1)
                                    ->count();
       
        $how_impact_assessed[$answer] = 
                array('countByImpactAssessed' => $countByImpactAssessed); 
        }
        
        $reports_array[$key] = $how_impact_assessed;
        
    }
    
     private function typeOfChange(&$reports_array, $base_query){

        $key = "type_of_change";
        
        $qa_query = clone $base_query;
        
        $qa_query
            ->select('tips.*', 'questions.*', 'answers.*')
            ->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id')
            ->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
            ->join('answers', 'questions.question_id', '=', 'answers.question_id')
            ->where('question_number', 12);  #12
            
        $answer_collection = $qa_query->get();
                                
        $list_of_answers = $answer_collection
                                ->pluck('answer_text')
                                ->unique();
        
        foreach($list_of_answers as $idx => $answer){
            $countByTypeChange =
                  $answer_collection->where('is_finished', 1)
                                    ->count();
       
        $type_of_change[$answer] = 
                array('countByTypeChange' => $countByTypeChange); 
        }
        
        $reports_array[$key] = $type_of_change;
        
    }
    
    private function newOpportunities(&$reports_array, $base_query){

        $key = "new_opportunities";
        
        $qa_query = clone $base_query;
        
        $qa_query
            ->select('tips.*', 'questions.*', 'answers.*')
            ->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id')
            ->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
            ->join('answers', 'questions.question_id', '=', 'answers.question_id')
            ->where('question_number', 16);
            
        $answer_collection = $qa_query->get();
                                
        $list_of_answers = $answer_collection
                                ->pluck('answer_text')
                                ->unique();
        
        foreach($list_of_answers as $idx => $answer){
            $countByNewOpp =
                  $answer_collection->where('is_finished', 1)
                                    ->count();
       
        $new_opportunities[$answer] = 
                array('countByNewOpp' => $countByNewOpp); 
        }
        
        $reports_array[$key] = $new_opportunities;
        
    }
    
    private function primaryELOadded(&$reports_array, $base_query){

        $key = "primary_ELO";
        
        $qa_query = clone $base_query;
        
        $qa_query
            ->select('tips.*', 'questions.*', 'answers.*')
            ->join('tips_questions', 'tips.tips_id', '=', 'tips_questions.tips_id')
            ->join('questions', 'tips_questions.question_id', '=', 'questions.question_id')
            ->join('answers', 'questions.question_id', '=', 'answers.question_id')
            ->where('question_number', 9);
            
        $answer_collection = $qa_query->get();
                                
        $list_of_answers = $answer_collection
                                ->pluck('answer_text')
                                ->unique();
        
        foreach($list_of_answers as $idx => $answer){
            $countByELO =
                  $answer_collection->where('is_finished', 1)
                                    ->count();
       
        $primary_ELO[$answer] = 
                array('countByELO' => $countByELO); 
        }
        
        $reports_array[$key] = $primary_ELO;
        
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
}