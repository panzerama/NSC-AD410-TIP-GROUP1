<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Mail\AdminContact;
use DB;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function create(){
        
        //$faculty_id = 1;
        $faculty_id = Auth::id();
        
        $faculty = DB::table('faculty')->where('faculty_id', $faculty_id)->first();
        $email = $faculty->email;
        $name = $faculty->faculty_name;
        
        return view('contacts/create', compact('email', 'name'));
    }
    
    public function sendEmail(){
        
        $adminEmail = 'nsctips@gmail.com';
        
        $name = request('name');
        $email = request('email');
        $topic = request('topic');
        $body = request('body');
        
        \Mail::to($adminEmail)->send(new AdminContact($name, $email, $topic, $body));
        $result = true;
        return view('contacts/create', compact('result', 'email', 'name'));
    }
}