<?php
define('STDIN',fopen("php://stdin","r"));
// If you've used composer to include the library, remove the following line
// and make sure to follow the standard composer autoloading.
// https://getcomposer.org/doc/01-basic-usage.md#autoloading
require_once realpath(dirname(__FILE__) . '/../autoload.php');

$client = new Google_Client();
// OAuth2 client ID and secret can be found in the Google Developers Console.
$client->setClientId('876078692105-q5b4ibn1tm9sbmmtesn1mlnmofsinlnr.apps.googleusercontent.com');
$client->setClientSecret('t7NAE0TN_rLI-3cHkA64DKDk');
$client->setRedirectUri('http://localhost/googlecalendar/examples/calendar.php');
$client->addScope('https://www.googleapis.com/auth/calendar');

$service = new Google_Service_Calendar($client);

$authUrl = $client->createAuthUrl();

//Request authorization
print "Please visit:\n$authUrl\n\n";
print "Please enter the auth code:\n";
$authCode = trim(fgets(STDIN));

// Exchange authorization code for access token
$accessToken = $client->authenticate($authCode);
$client->setAccessToken($accessToken);
?>