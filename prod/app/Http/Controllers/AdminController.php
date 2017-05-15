<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //admin
    public function index(){
        return view('admin/index');
    }
    
    public function create(){
        return view('admin/create');
    }
    
    public function show(){
        return view('admin/show');
    }
}