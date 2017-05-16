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

    //this sends data to /summarytest page
    public function summarytest()
    {
        //hardcode data (to do: replace with queries)
            $data = array('countSubmitted' => '220',
                          'countInprogress' => '50',
                          'countNotstarted' => '230');  
        
        //return data to view
        return view('reports/summarytest')->with($data);
    }
    
    public function boot() {
        View::share('data');
    }
    
     public function tabledev()
    {
        return view('reports/table-dev');
    }
    
}