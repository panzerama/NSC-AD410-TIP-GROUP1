<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Log;

use DB;

class AdminController extends Controller {
    
    // authenticated user.protected
    protected $user;

    //Is user signedIn?
    protected $signedIn;
    
    public function __construct() {

        //$this->middleware(function ($request, $next) {
        //$this->user = $this->signedIn = Auth::user();
        //return $next($request);
        //});
    }
    
    public function index() {
        return redirect()->action('AdminController@show');
    }
    
    public function create() {
    
        return redirect()->action('AdminController@show');
    }
    
    public function store() {
        
         $faculty_name = request('name');
         $email = request('email');
         $employee_type = request('employee_type');
         if(request('status') == "No"){
             $admin = 0;
         }else{
             $admin = 1;
         }
         
         $check = DB::table('faculty')
                ->where('email', '=', $email)->first();
            
            if (is_null($check)) {
                DB::table('faculty')->insert([
                    'faculty_name' => $faculty_name, 
                    'email' => $email,
                    'employee_type'=> $employee_type,
                    'is_admin' => $admin,
                    'is_active' => true
                    ]);
            } else {
                return redirect()->action('AdminController@show');
            }
            
        return redirect()->action('AdminController@show');  
    }
    
    public function show() {
        $faculty = DB::table('faculty')->get();
        $divisions = DB::table('divisions')->get();
        
        return view('admin/show', compact('faculty', 'divisions'));
    }
    
    public function update($id, $status) {
        $faculty = DB::table('faculty')->get();
        
        if($status == "active"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_active' => false]);
        }elseif($status == "inactive"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_active' => true]);
        }elseif($status == "addadmin"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_admin' => true]);
        }elseif($status == "removeadmin"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_admin' => false]);
        }else{
            return redirect()->action('AdminController@show');
        }
        return redirect()->action('AdminController@show');
    }
}