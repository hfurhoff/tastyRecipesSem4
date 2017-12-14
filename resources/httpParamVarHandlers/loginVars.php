<?php

if(!empty($_POST['logout'])){
    $contr->logout();
    $contr->shutdown();
}

$succededLogin = true;
if(!empty($_POST['acc']) && !empty($_POST['pass'])){
    $userAcc = $_POST['acc'];
    $userPass = $_POST['pass'];
    $userAcc = htmlentities($userAcc, ENT_QUOTES);
    $succededLogin = $contr->login($userAcc, $userPass);
} elseif (!empty($_POST['acc']) && empty($_POST['pass'])) {
    $succededLogin = false;
} elseif (empty($_POST['acc']) && !empty($_POST['pass'])) {
    $succededLogin = false;
}
$loggedIn = $contr->isLoggedIn();
