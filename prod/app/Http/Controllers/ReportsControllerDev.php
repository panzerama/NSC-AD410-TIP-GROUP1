<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsControllerDev extends Controller
{
    //admin
    public function indexdev()
    {
        return view('reports/index-dev');
    }

    //this sends test data to /summary-test page
    public function summarytest()
    {
        //hardcode data (to do: replace with queries)
        $count_submitted = DB::table('tips')->where('is_finished',1)->count();
            $data = array('countSubmitted' => $count_submitted,
                          'countInprogress' => '50',
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/summary-test')->with($data);
    }
    
     //this sends test data to /tipsByMonth-test page
    public function tipsbymonthtest()
    {
        //hardcode data (to do: replace with queries)
        $month = array("July", "August", "September", "October", "November", "January", "February");
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
        //hardcode data (to do: replace with queries)
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