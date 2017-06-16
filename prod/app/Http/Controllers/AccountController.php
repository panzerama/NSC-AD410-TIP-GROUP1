<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller {
    
    public function index() {
        //update this when LoginController is setup
        //$faculty_id = 1;
        $faculty_id = Auth::id();
        
        $divisions = DB::table('divisions')->get();
        $faculty = DB::table('faculty')->get()->where('faculty_id', $faculty_id);

        return view('first_time/index', compact('divisions', 'faculty'));
    }
    
    //called after user confirms details and picks primary division.
    //this function will update users row in the facutly table by udpationg their division id
    public function updateFirstTime() {
        $faculty_id = request('faculty_id');
 +        
 +      $employment = request('employee_type');
        $division_id = request('division_id');
        
+       $affected = DB::table('faculty')->where('faculty_id', $faculty_id)->update(['division_id' => $division_id, 'employee_type' => $employment]);
            
        if(!empty($affected)) {
            //redirects user to Tip Questionnaire
            return redirect()->action('TipsController@index');
        }
       
            //update failed 
            return false; 
        
    }
}
