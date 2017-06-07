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
        
        $email = request('email');
        $topic = request('topic');
        $body = request('body');
        
        \Mail::to('tipadmin@seattlecolleges.edu')->send(new AdminContact($email, $topic, $body));
        $result = true;
        return view('contacts/create', compact('result'));
    }
}