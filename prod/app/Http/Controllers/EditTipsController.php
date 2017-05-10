<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;

class EditTipsController extends Controller
{
    public function index(){
        $questions = question::all();
        return view('edittips/index',compact('questions'));
    }
    
    public function create(){

    }
    
    public function store(){
        
    }
}
