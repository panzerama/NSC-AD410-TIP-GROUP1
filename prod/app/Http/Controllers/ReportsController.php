<?php

namespace App\Http\Controllers;

class ReportsController extends Controller
{
    //admin
    public function index()
    {
        return view('reports/index');
    }
    
     public function table()
    {
        return view('reports/table');
    }
    
}