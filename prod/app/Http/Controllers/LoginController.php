<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function index()
    {
        return view('home/login');
    }
    

//TODO: PAULS SAMPLE CODE 
// in the store() function(or whatever we made it)
// copy in the config.php and index.php from Pauls work.
// get the info for the config.php from here(?):  https://canvas.northseattle.edu/courses/1421135/pages/test-developer-api-key?module_item_id=22440853
// attempt to authenticate(this is probably done fine in pauls work)

//if authentication fails
// redirect user back to the canvas url
//TODO: KIP - get the name and email
//TODO: RASAR - and compare against existing data in the table
public function validateEmail($name, $email)
{
    $bValid = FALSE; 
    
    $users = DB::table('FACULTY')
                   ->where('name', $name)
                   ->where('email', $email)->get();
                   
    if(count($users) > 0)
    {
       $bValid = TRUE;
    }
        
    return bValid;    
}

//TODO: LUCAS if the data exists:
//create a session and redirect user to home page

//if the user is a first time user 
//store function: create a new record for the user in the faculty table using their name and email
//create a session and redirect user to home page
    
    
}
