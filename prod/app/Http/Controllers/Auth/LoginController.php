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
        
        $c = new Client(['verify'=>false]);
        $provider->setHttpClient($c);
        
        
        // If we don't already have an authorization code, we will get one
        if (!isset($_GET[CODE])) {
            $authorizationUrl = $provider->getAuthorizationUrl();
            $_SESSION[STATE_LOCAL] = $provider->getState();
            header("Location: $authorizationUrl");
            exit;
        
        } else {
            $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
            $ownerDetails = $provider->getResourceOwner($token);
            $uid = $ownerDetails->getId();
            $domain = 'northseattle.test.instructure.com';
            $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
            $f = @file_get_contents($profile_url);
            $profile = json_decode($f);
        
            $faculty_canvas_id = $profile->id;
            
            $faculty = DB::table('faculty')->where('faculty_canvas_id', $faculty_canvas_id)->first();
            
            //if user has been here before a session gets created
            if(isset($faculty)) {
                $db_user = DB::table('users')->select('id')->join('faculty', 'users.email', '=', 'faculty.email')->where('faculty.faculty_id', $faculty->faculty_id)->first();
                    
                $user = Auth::loginUsingId($db_user->id, true);
                
                if($faculty->is_admin === '0') {
                    return redirect ('/admin');
                } else {
                   return redirect ('/tip');
                }
            } else {
    
                $email = $profile->primary_email;
                $name = $profile->name;
                
                // check if the name and email is already in the database
		        $count = DB::table('faculty')->select('*')->where('faculty_name', $name)->where('email', $email)->count();
                
	            Log::info('Value of $count ' . $count);
		 
                if($count > 0) {
                    DB::table('faculty')->where('email', $email)->update(['faculty_canvas_id' => $faculty_canvas_id]);
                } else {
                    DB::insert('insert into users (name, email, password) values(?,?,?)', [$name, $email, null]);
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
    // destroy() session
    public function destroy() {
        Auth::logout();
        // redirect to canvas homepage upon logout
        $url = 'https://northseattle.test.instructure.com';
        return redirect($url);
    }
}
