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
        
        $to      = request('email');
        $topic = request('topic');
        $body = request('body');
        
        \Mail::to($to)->send(new AdminContact($topic, $body));
        $result = true;
        return view('contacts/create', compact('result'));
    }
}