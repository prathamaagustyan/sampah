<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '969544529474-nm1mhb3o4d5meebe284baj56ekshbjju.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/sampah/adminin/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
