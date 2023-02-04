<?php 

if (!session_id()) {
  session_start();
}

require_once __DIR__ . '\src\Facebook\autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '431162058980480',
  'app_secret' => '9ce60f0085dc648a387212f2dd398d06',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fbGraphSDK/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


// https://www.facebook.com/v2.10/dialog/oauth?
// client_id=431162058980480
// &
// state=a9de72bada599d1afad9426d7fe78b43
// &
// response_type=code
// &
// sdk=php-sdk-5.7.0
// &
// redirect_uri=https%3A%2F%2Flocalhost%2Ffb-callback.php&scope=email
?>