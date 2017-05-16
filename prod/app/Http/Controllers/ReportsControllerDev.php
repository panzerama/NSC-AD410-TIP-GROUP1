<?php

namespace App\Http\Controllers;

class ReportsControllerDev extends Controller
{
    //admin
    public function indexdev()
    {
        return view('reports/index-dev');
    }
    
     public function tabledev()
    {
        return view('reports/table-dev');
    }
    
}