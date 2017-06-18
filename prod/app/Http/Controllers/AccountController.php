<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Auth\LoginController;

class AccountController extends Controller {
    // this __construct() function will need to be at the top
    // of all controllers doing any storing stuff.
    public function __construct() {
        $this->middleware('auth');
    }
    
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
        $faculty_id = intval(request('faculty_id'));
 +        
 +      $employment = request('employee_type');
        $division_id = request('division_id');
        
+       $update = DB::table('faculty')->where('faculty_id', $faculty_id)->update(['division_id' => $division_id, 'employee_type' => $employment]);
            
        if(!empty($update)) {
            //redirects user to Tip Questionnaire
            return redirect()->action('TipsController@index');
        }
       
        
    }
}
