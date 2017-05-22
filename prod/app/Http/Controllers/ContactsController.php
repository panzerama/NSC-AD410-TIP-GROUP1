<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\DB;

class ContactsController extends Controller
{
    public function create(){
        
        return view('contacts/create');
    }
    
    public function sendEmail(){
        //todo: update admin email address ($to)/Reply-To
        $to      = '';
        $subject = request('subject');
        $message = request('body');
        $headers = request('email') . "\r\n" .
        'Reply-To: replacewithadmin@email.com' . "\r\n";
        
       
        mail($to, $subject, $message, $headers);
        $result = true;
       
        return view('contacts/create', compact('result'));
    }
}