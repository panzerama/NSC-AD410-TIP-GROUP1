<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\tip;
use App\tips_questions;
use App\faculty;
use App\faculty_tip;

class PreviousTipsController extends Controller
{
    public function index(){
        
        return view('previoustips/index');
    }
    
    public function show(){
        return view('previoustips/show');
    }
}
