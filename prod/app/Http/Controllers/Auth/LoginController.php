<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\faculty as Faculty;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
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
        
        $LMSinfo = [
        'clientId' => $config['canvasClientId'] ,
        'clientSecret' => $config['canvasClientSecret'],
        'purpose' => 'tip',
        'redirectUri' => $config['redirectUri'],
        'canvasInstanceUrl' => $config['canvasInstanceUrl']
        ];

        $provider = new CanvasLMS($LMSinfo);

        $LMSinfo1 = json_encode($LMSinfo);
        Log::info($LMSinfo1);
        
        $c = new Client(['verify'=>false]);
        $provider->setHttpClient($c);
        
        
        // If we don't already have an authorization code, we will get one
        if (!isset($_GET[CODE])) {
            $authorizationUrl = $provider->getAuthorizationUrl();
            $_SESSION[STATE_LOCAL] = $provider->getState();
            header("Location: $authorizationUrl");
            exit;
        
        } else {
            Log::info('We are in the else');
            
            $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
            Log::info($token);

            $ownerDetails = $provider->getResourceOwner($token);
            
            $uid = $ownerDetails->getId();
            $domain = 'northseattle.test.instructure.com';
            $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
            $f = @file_get_contents($profile_url);
            //this is object
            $profile = json_decode($f);
            //echo 'This is the profile object:  ', $profile;
            
            
            
            //canvas id from profile object:
            $faculty_canvas_id = $profile->id;
            
            $is_faculty = Faculty::select('faculty_id')->where('faculty_canvas_id', $faculty_canvas_id)->count();
            
            //if user has been here before a session gets created
            if(!empty($is_faculty)) {
                //create instance of authenticated user
                $user = Auth::user();
                //get admin status
                //$userIsAdmin = $user->isAdmin;
                
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
                
                // check if the name and email is already in the database
                // this would happen if an admin entered them earlier.
                $count = DB::select('select * from faculty where faculty_name = ? and email = ?', [$name, $email]);
                
                if($count) //it's alredy there 
                {
                    // update the row to store the canvas_id
                    DB::table('faculty')->where('email', $email)->update(['faculty_canvas_id' => $faculty_canvas_id]);
                }
                else {
                // create a new row and store id, email, name into faculty table
                DB::insert('insert into FACULTY (division_id, faculty_name, email, 
                    faculty_canvas_id, employee_type, is_admin, is_active) 
                    values(?,?,?,?,?,?,?)', [null, $name, $email, 
                    $faculty_canvas_id, null, false, true]);
                }
                //create instance of authenticated user
                $user = Auth::user();
                //create a session for the new user
                Auth::login($user);
                
                
                // redirect them to the account page so they get routed to the 
                // blade to confirm their details
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