<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }

    public function minor()
    {
        return view('home/minor');
    }
    
    
    
    public function tip()
    {
        return view('home/tip');
    }
    
    public function firstTimeUser()
    {
        return view('home/first-time-user');
    }

    
    public function tipQuestions()
    {
        return view('home/tip-questions');
    }

    public function viewPreviousTips()
    {
        return view('home/view-previous-tips');
    }
    
    public function previousTip()
    {
        return view('home/previous-tip');
    }
    
    public function contactAdmin()
    {
        return view('home/contact-admin');
    }
    
    
    
}
