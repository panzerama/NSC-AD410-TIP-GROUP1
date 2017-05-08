<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditTipsController extends Controller
{
    public function index(){
        $questions = question::all();
        return view('/editquestions/index',compact('questions'));
    }
    
    public function create(){

    }
    
    public function store(){
        
    }
}
