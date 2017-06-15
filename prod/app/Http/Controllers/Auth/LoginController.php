<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\faculty as Faculty;
use App\User as User;
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
            Log::info('Token ' . $token);

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
            
            Log::info('Faculty canvas id ' . $faculty_canvas_id);
            
            $faculty = DB::table('faculty')->where('faculty_canvas_id', $faculty_canvas_id)->first();
            
            //if user has been here before a session gets created
            if(isset($faculty)) {
                Log::info('This is faculty ' . var_export($faculty, true));
                
                //find user_id
                $db_user = DB::table('users')->select('id')->join('faculty', 'users.email', '=', 'faculty.email')->where('faculty.faculty_id', $faculty->faculty_id)->first();
                    
                //create instance of authenticated user
                $user = Auth::loginUsingId($db_user->id, true);
                
                $is_admin = $faculty->is_admin;
                
                //Log admin status
                Log::info('Is this user_an admin? ' . var_export($is_admin, true) . gettype($is_admin));
                
                if($is_admin === 1) {
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
		        $count = DB::table('faculty')->select('*')->where('faculty_name', $name)->where('email', $email)->count();
                
	            Log::info('Value of $count ' . $count);
		 
                if($count > 0)  {
                    // update the row to store the canvas_id
                    DB::table('faculty')->where('email', $email)->update(['faculty_canvas_id' => $faculty_canvas_id]);
                } else {
                    // create a new row in users table, insert name and email
                    DB::insert('insert into users (name, email, password) values(?,?,?)', [$name, $email, null]);
                    
                	// create a new row and store id, email, name into faculty table
                	DB::insert('insert into FACULTY (division_id, faculty_name, email, faculty_canvas_id, employee_type, is_admin, is_active) values(?,?,?,?,?,?,?)', [null, $name, $email, $faculty_canvas_id, null, false, true]);
                }

                //find user_id
                $user_id = User::select('users.id')
                    ->join('faculty', 'users.email', '=', 'faculty.email')
                    ->where('faculty.faculty_id', $faculty_id)
                    ->get();
                
                $user = Auth::loginUsingId($user_id, true);

                // redirect them to the account page so they get routed to the 
                // blade to confirm their details
                return redirect ('/account');
            }
            
        }
    
    }
    
    // destroy() go here:
    public function destroy() {
        Auth::logout();
        // redirect to canvas homepage upon logout
        $url = 'https://northseattle.test.instructure.com';
        return redirect($url);
    }

}
