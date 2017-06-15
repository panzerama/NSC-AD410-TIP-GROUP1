<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Mail\AdminContact;

class ContactsController extends Controller
{
    public function create(){
        
        return view('contacts/create');
    }
    
    public function sendEmail(){
        
        $adminEmail = 'test@seattlecolleges.edu';
        $email = request('email');
        $topic = request('topic');
        $body = request('body');
        
        \Mail::to($adminEmail)->send(new AdminContact($email, $topic, $body));
        $result = true;
        return view('contacts/create', compact('result'));
    }
}