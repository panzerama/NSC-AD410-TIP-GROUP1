<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    
//TODO: PAULS SAMPLE CODE 
// in the store() function(or whatever we made it)
// copy in the config.php and index.php from Pauls work.
// get the info for the config.php from here(?):  https://canvas.northseattle.edu/courses/1421135/pages/test-developer-api-key?module_item_id=22440853
// attempt to authenticate(this is probably done fine in pauls work)

//TODO: KIP - get the name and email

    //rasar: validateEmail(name, email)
    //takes name and email and checked against database to see if it is valid
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
            
        return $bValid;    
    }
    
    public function redirect($email)
    {
        $bAdmin = FALSE;
        $admin = DB::table('FACULTY')
                    ->where('email', $email)
                    ->where('is_admin', TRUE )->get(); 
        
        if(count($admin) > 0)
        {
            $bAdmin = TRUE;
            //user is admin redirect to the reports index page
            return view('home/index'); //this gets changed later to point to the correct place.
        }
        else
        {
            // if user is existing user:
            // create a session 
            // redirect user to tips page, only if they aren't an admin
            if(validateEmail()) {
                Session::put('name', $name);
                Session::put('email', $email); 
                return view('home/index'); //this gets changed later to point to the correct place.
            }
            // else:
            // create a session
            // direct user to confirm details page
            else {
                Session::put('name', $name);
                Session::put('email', $email); 
                return view('home/index'); //this gets changed later to point to the correct place.
            }
        }
    }
}
