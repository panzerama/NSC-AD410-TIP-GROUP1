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
    public function updateFirstTime()
    {
        $faculty_id = $request('faculty_id');
        
        $employment = $request('employee_type');
        $division_id = $request('division_id');
        
        
        $affected = DB::where('faculty_id', $faculty_id)
            ->update(['division_id' => $division_id], ['employee_type' => $employment]);
            
        if(!empty($affected))
        {
            //update succeeded
             return true; 
        }
       
            //update failed 
            return false; 
    }
}
