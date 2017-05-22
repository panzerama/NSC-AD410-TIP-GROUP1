<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tip;

class ReportsControllerDev extends Controller
{
    //admin
    public function indexold()
    {
        return view('reports/index-old');
    }

    //this sends test data to /summary-test page
    public function summarytest()
    {
        //hardcode data (to do: replace with queries)
        $count_submitted = tip::where('is_finished', 1)->count();
        //DB::table('tips')->where('is_finished',1)->count();
        $count_in_progress = DB::table('tips')->where('is_finished',0)->count();
        $data = array('countSubmitted' => $count_submitted,
                          'countInprogress' => $count_in_progress,
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/summary-test')->with($data);
    }
    
     //this sends test data to /tipsByMonth-test page
    public function tipsbymonthtest()
    {
        //hardcode data (to do: replace with queries)
        //we need a datetime
        $month = array("July", "August", "September", "October", "November", 
                        "January", "February", "March", "April", "May", "June");
        //For each month in $month
        //   array entry = tip::where(updated by month = $month and is_finished is 1)
        //   if there's nothing there, don't display!
        
        $countByMthSubmitted = array(24, 14, 29, 10, 1, 30, 6);
        $countByMthInprogress = array(5, 10, 15, 17, 20, 4, 2);

        //return data to view
        return view('reports/tips-by-month-test')
            ->with('month',json_encode($month))
            ->with('countByMthSubmitted',json_encode($countByMthSubmitted,JSON_NUMERIC_CHECK))
            ->with('countByMthInprogress',json_encode($countByMthInprogress,JSON_NUMERIC_CHECK));
    }
    
     //this sends test data to /tipsByDivision-test page
    public function tipsbydivisiontest()
    {
        //get which divisions have active tips?
        //tip::joing('division'&c.)->selelct('division.abbr')->distinct('division.abbr')->where('tips.is_active/whatever', 0)->get();
        //hardcode data (to do: replace with queries)
        $tips_by_division = DB::table('tips')
                                ->join('divisions', 'tips.division_id', '=', 'divisions.division_id')
                                ->orderBy('divisions');
        $division = array("AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S");
        $countByDivisionSubmitted = array(65, 48, 29, 19, 13, 6);
        $countByDivisionInprogress = array(5, 10, 15, 7, 20, 42);

        //return data to view
        return view('reports/tips-by-division-test')
            ->with('division',json_encode($division))
            ->with('countByDivisionSubmitted',json_encode($countByDivisionSubmitted,JSON_NUMERIC_CHECK))
            ->with('countByDivisionInprogress',json_encode($countByDivisionInprogress,JSON_NUMERIC_CHECK));
    }
    
     public function tabledev()
    {
        return view('reports/table-dev');
    }
    
}