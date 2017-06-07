<?php

namespace App\Http\Controllers;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
        
    }
    
    public function store(){
         
         $email = request('email');
         
         $faculty_name = request('name');
         dd(DB::table('faculty')->get());
         
         
        
         DB::table('faculty')->insert([
            'faculty_name' => $faculty_name, 'email' => $email, 
            'is_admin' => true, 'is_active' => true
            ]);
        return view('admin/create');    
    }
    
    public function create(){
        
         $facultyAdd = DB::table('faculty')->where('is_admin', true);
         /*$faculty_id = request('faculty_id');
         dd($faculty_id);
         $email = request('email');
         $faculty_name = request('name');
         $is_admin = request('is_admin');
         $is_active = request('is_active');
        
         DB::table('faculty')->insert([
            'faculty_id' => $faculty_id, 'faculty_name' => $faculty_name, 'email' => $email, 
            'is_admin' => true, 'is_active' => true
            ]);*/
        return view('admin/create', compact('facultyAdd'));
        
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