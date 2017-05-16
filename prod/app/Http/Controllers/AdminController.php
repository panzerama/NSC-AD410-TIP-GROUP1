<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //admin
<<<<<<< HEAD
    public function adminManagement()
    {
        return view('admin/admin-management');
    }
    public function tipsManagement()
    {
        return view('admin/tips-management');
    }
    
    public function inactivateUser()
    {
        return view('admin/inactivate-user');
=======
    public function index(){
        return view('admin/index');
    }
    
    public function create(){
        return view('admin/create');
    }
    
    public function show(){
        return view('admin/show');
    }
    
    public function destroy(){
        
>>>>>>> 410bf9769dddf43bb2348eabdbb805afff0a6a5c
    }
}