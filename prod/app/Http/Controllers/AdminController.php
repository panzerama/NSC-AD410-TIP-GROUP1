<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //admin
    public function index()
    {
        return view('admin/index');
    }
    
    public function show(){
        return view('admin/show');
    }
    public function destroy()
    {
    
    }
}