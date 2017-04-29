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
