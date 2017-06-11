<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Facades\Log;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

include '/var/www/html/mycollege.tips/prod/vendor/autoload.php';

class LoginController extends Controller
{
    public function index() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        include 'config.php';
        
        //start session
        session_start();
        
        define('CODE', 'code');
        define('STATE', 'state');
        define('STATE_LOCAL', 'oauth2-state');
        
        $provider = new CanvasLMS([
            'clientId' => $config['canvasClientId'] ,
            'clientSecret' => $config['canvasClientSecret'],
            'purpose' => 'tip',
            'redirectUri' => $config['redirectUri'],
            'canvasInstanceUrl' => $config['canvasInstanceUrl']
        ]);
        
        $c = new Client(['verify'=>false]);
        $provider->setHttpClient($c);
        
        
        // If we don't already have an authorization code, we will get one
        if (!isset($_GET[CODE])) {
            $authorizationUrl = $provider->getAuthorizationUrl();
            $_SESSION[STATE_LOCAL] = $provider->getState();
            header("Location: $authorizationUrl");
            exit;
        
        } else {
            Log::info('We are in the else and this is the authorization code: ', .$_GET[CODE]);
            // try to get an access token (using our existing code) 
            
            $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
            
            //echo 'The token has been fetched <br/><br/>';
            // Use the token, and print out info
            //echo 'This is the user token: ', $token->getToken(), '<br/><br/>';
            
            $ownerDetails = $provider->getResourceOwner($token);
            
            //echo '<br/><br/>';
            // Use these details to create a new profile
            //printf('Your Name: %s ', $ownerDetails->getName());
            //echo '<br/><br/>';
            //printf('Your id: %s ', $ownerDetails->getId());
            //echo '<br/><br/>';
            
            $uid = $ownerDetails->getId();
            $domain = 'north-seattle-college.acme.instructure.com';
            $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
            $f = @file_get_contents($profile_url);
            //this is object
            $profile = json_decode($f);
            //echo 'This is the profile object:  ', $profile;
            
            
            
            //canvas id from profile object:
            $faculty_canvas_id = $profile->id;
            
            //if user has been here before a session gets created
            if(Auth::attempt(['faculty_canvas_id' => $faculty_canvas_id])) {
                //create instance of authenticated user
                $user = Auth::user();
                //get admin status
                $userIsAdmin = $user->isAdmin;
                
                if($userIsAdmin) {
                    return redirect ('/admin');
                } else {
                    return redirect ('/tip');
                }
            } else {
                //user hasn't been here before so we'll get the details:
                
                // get name and email
                $email = $profile->primary_email;
                $name = $profile->name;
                
                
                // TODO: store id, email, name into faculty table
                DB::insert('insert into FACULTY (division_id, faculty_name, email, faculty_canvas_id, employee_type, is_admin, is_active) values(?,?,?,?,?,?,?)', [null, $name, $email, $faculty_canvas_id, null, false, true]);
                
                
                //create a session for the new user
                Auth::attempt(['faculty_canvas_id' => $faculty_canvas_id]);
                
                //is this right?
                return redirect ('/account');
            }
            
        }
    
    }
    
    // destroy() go here:
    public function destroy() {
        Auth::logout();
        // redirect to canvas homepage or to our index page?
        // return redirect('canvas.northseattle.edu')
    }

}