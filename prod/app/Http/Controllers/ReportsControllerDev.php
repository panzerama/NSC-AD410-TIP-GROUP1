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
            $data = array('countSubmitted' => '220',
                          'countInprogress' => '50',
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/summary-test')->with($data);
    }
    
     //this sends test data to /tipsByMonth-test page
    public function tipsbymonthtest()
    {
        //hardcode data (to do: replace with queries)
            $data = array('countSubmitted' => '220',
                          'countInprogress' => '50',
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/tips-by-month-test');
    }
    
     //this sends test data to /tipsByDivision-test page
    public function tipsbydivisiontest()
    {
        //hardcode data (to do: replace with queries)
            $data = array('countSubmitted' => '220',
                          'countInprogress' => '50',
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/tips-by-division-test')->with($data);
    }
    
    public function boot() {
        View::share('data');
    }
    
     public function tabledev()
    {
        return view('reports/table-dev');
    }
    
}