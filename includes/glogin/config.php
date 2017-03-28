<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '560848313899-js5fu6mf4lu20ln90dvtia4ur381t91n.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'o-W8pnnYEqt54dbEQYSuux5M'; //Google CLIENT SECRET
$redirectUrl = 'http://biscle.com/bisclenew1/includes/glogin/index.php';  //return url (url to script)
$homeUrl = 'http://biscle.com/bisclenew1/includes/glogin/index.php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to biscle.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>