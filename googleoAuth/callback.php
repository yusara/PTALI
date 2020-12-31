<?php
require("config.php");

session_start();
if (isset($_GET['code'])) {
    $token = $g_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    $g_client->setAccessToken($token);

    try {
        $pay_load = $g_client->verifyIdToken();
        $_SESSION['login'] = true;
        $_SESSION['email'] = $pay_load['email'];
        // var_dump($g_client);
        // var_dump($pay_load);

        header('Location: ../work/index.php');
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    $pay_load = null;
    var_dump($pay_load);
    header('Location: login.php');
    exit();
}
