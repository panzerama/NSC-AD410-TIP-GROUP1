<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
//TODO: PAULS SAMPLE CODE 
// in the store() function(or whatever we made it)
// copy in the config.php and index.php from Pauls work.
// get the info for the config.php from here(?):  https://canvas.northseattle.edu/courses/1421135/pages/test-developer-api-key?module_item_id=22440853
// attempt to authenticate(this is probably done fine in pauls work)

//if authentication fails
// redirect user back to the canvas url
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

//TODO: LUCAS if the data exists:
//create a session and redirect user to home page

//if the user is a first time user 
//store function: create a new record for the user in the faculty table using their name and email
//create a session and redirect user to home page
    
}
