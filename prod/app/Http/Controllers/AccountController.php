<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

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
    
    //called after user confirms details and picks primary division.
    //this function will update users row in the facutly table by udpationg their division id
    public function divisionUpdate()
    {
        $division_id = $request('division_id');
        $email = $request('email');
        
        $affected = DB::where('email', $email)
            ->update(['division_id' => $division_id]);
            
        if(!empty($affected))
        {
            //update succeeded
             return true; 
        }
       
            //update failed 
            return false; 
    }
}
