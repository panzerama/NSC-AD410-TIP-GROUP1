<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviousTipsController extends Controller
{
    public function index(){
        return view('previoustips/index');
    }
    
    public function show(){
        return view('previoustips/show');
    }
}
