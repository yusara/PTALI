<?php 
session_start();
require ("../googleoAuth/config.php");

$_SESSION = [];
unset($_SESSION['access_token']);
unset($_SESSION['login']);
$g_client->revokeToken();
session_destroy();
header("location: login.php");
exit;
