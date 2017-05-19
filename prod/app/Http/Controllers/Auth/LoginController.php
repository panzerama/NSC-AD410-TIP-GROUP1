<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//config stuff:
// these settings need to be changed to whatever our actual settings are.
// redirectUri probably needs to be removed since we redirect depending on what
// kind of user is coming into our app
global  $config;
$config = [
    'canvasClientId' => '90000000000378',
    'canvasClientSecret' => 'MTuYbZdJBuapeD0gKnbkA2mHaUMZYwPGHkQb6wvoX01sGcEksnQiBaQ80YyuVtEm',
    'redirectUri'=> "http://www.icoolshow.net/nsc/tip",
    'canvasInstanceUrl'=>'https://northseattle.test.instructure.com'
];

require_once "../vendor/autoload.php";

use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

//start session
session_start();

// do we need these definitions?
define('CODE', 'code');
define('STATE', 'state');
define('STATE_LOCAL', 'oauth2-state');
// the above defined CODE gets used in the code of Pauls but do we need the rest?
// or is this for something else entirely?

// provider is our authentication provider yes/no?
$provider = new CanvasLMS([
    'clientId' => $config['canvasClientId'] ,
    'clientSecret' => $config['canvasClientSecret'],
    'purpose' => 'tip',
    'redirectUri' => $config['redirectUri'],
    'canvasInstanceUrl' => $config['canvasInstanceUrl']
]);

/* if we don't already have an authorization code, let's get one! */
// here is where CODE was used. Do we even need this if statement? or do we 
// want to just assume we have a code and if we don't than we kick them back to 
// canvas if we don't?
if (!isset($_GET[CODE])) {
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION[STATE_LOCAL] = $provider->getState();
    header("Location: $authorizationUrl");
    exit;
}
else {
    echo $_GET[CODE];
    /* try to get an access token (using our existing code) */
    $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
    
    //ownerDetails is just the canvas name and id associated with the token I think...
    $ownerDetails = $provider->getResourceOwner($token);

    // Use these details to create a new profile
    $name = $ownerDetails->getName();
    $uid= $ownerDetails->getId();
    $domain = 'northseattle.test.instructure.com';

    //use the id and the token to get the full profile from our test canvas setup
    $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
    
    $userFile = @file_get_contents($profile_url);
    
    // php built in JSON decode, 
    $profile = json_decode($userFile);
    
    // now just get our email because that's all we need to check 
    // against our faculty table
    $email = $profile->primary_email;
}
class LoginController extends Controller
{
    
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
