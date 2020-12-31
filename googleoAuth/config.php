<?php

require("../vendor/autoload.php");
$g_client = new Google_Client();

$g_client->setClientId("775825256057-a9pkm69pkfkj2078v06fvs1j3rtt5rq5.apps.googleusercontent.com");
$g_client->setClientSecret("Aq4VnEpP64anHknHARElEjyw");
$g_client->setRedirectUri("http://localhost/rest-crud-ptali/googleOauth/callback.php");
$g_client->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/plus/v1/people/me");
$g_client->setScopes("email");
