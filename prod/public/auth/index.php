<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

require_once '/var/www/html/mycollege.tips/prod/vendor/autoload.php';

use smtech\OAuth2\Client\Provider\CanvasLMS;
use GuzzleHttp\Client;

session_start();

// Define constant values 
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
    echo $authorizationUrl;
    $_SESSION[STATE_LOCAL] = $provider->getState();
    header("Location: $authorizationUrl");
    exit;

} else {
    echo 'This is the authorization code: ', $_GET[CODE], '<br/><br/>';
    /*
    // try to get an access token (using our existing code) 
    $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
    // echo 'The token has been fetched <br/><br/>';
    // Use the token, and print out info
    // echo 'This is the user token: ', $token->getToken(), '<br/><br/>';
    // $ownerDetails = $provider->getResourceOwner($token);
    // Use these details to create a new profile
    printf('Your Name: %s ', $ownerDetails->getName());
    echo '<br/><br/>';
    printf('Your id: %s ', $ownerDetails->getId());
    echo '<br/><br/>';
    $uid = $ownerDetails->getId();
    $domain = 'north-seattle-college.acme.instructure.com';
    $profile_url = 'https://' . $domain . '/api/v1/users/' . $uid . '/profile?access_token=' . $token;
    $f = @file_get_contents($profile_url);
    $profile = json_decode($f);
    print_r($profile);
    */
}
