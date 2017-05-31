<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

class AccountController extends Controller
{
    // this __construct() function will need to be at the top
    // of all controllers doing any storing stuff.
    public function __construct() {
        $this->middleware('auth');
    }
    
    
    public function index(){
        return view('first_time/index');
    }
    
    //needs a update() function for storing confirmed details
}
