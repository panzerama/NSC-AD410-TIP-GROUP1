<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //admin
    public function adminManagement()
    {
        return view('admin/admin-management');
    }
    public function tipsManagement()
    {
        return view('admin/tips-management');
    }
    public function reports()
    {
        return view('admin/reports');
    }
    public function inactivateUser()
    {
        return view('admin/inactivate-user');
    }
}