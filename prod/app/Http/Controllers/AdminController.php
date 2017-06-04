<?php

namespace App\Http\Controllers;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
    }
    
    public function create(){
        return view('admin/create');
    }
    
    public function show(){
        $faculty = DB::table('faculty')->get();
        
        return view('admin/show', compact('faculty'));
    }
    
    public function destroy(){
        
    }
}