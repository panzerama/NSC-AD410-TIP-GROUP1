<?php

namespace App\Http\Controllers;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
    }
    
    public function create(){
        return view('admin/create');
    }
    
    public function show(){
        $faculty = DB::table('faculty')->get();
        
        return view('admin/show', compact('faculty'));
    }
    
    public function update($id, $status){
        $faculty = DB::table('faculty')->get();
        
        if($status == "active"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_active' => false]);
        }elseif($status == "inactive"){
            DB::table('faculty')->where('faculty_id', $id)->update(['is_active' => true]);
        }else{
            return redirect()->action('AdminController@show');
        }
        return redirect()->action('AdminController@show');
    }
}