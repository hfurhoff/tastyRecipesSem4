<?php

$succededSignup = null;
$hasTriedToSignup = false;
if(!empty($_POST['acc']) && !empty($_POST['pass'])){
    $hasTriedToSignup = true;
    $userAcc = $_POST['acc'];
    $userPass = $_POST['pass'];
    $userAcc = htmlentities($userAcc, ENT_QUOTES);
    $succededSignup = $contr->signup($userAcc, $userPass);
} elseif (!empty($_POST['acc']) && empty($_POST['pass'])) {
    $hasTriedToSignup = true;
    $succededSignup = false;
} elseif (empty($_POST['acc']) && !empty($_POST['pass'])) {
    $hasTriedToSignup = true;
    $succededSignup = false;
}
$loggedIn = $contr->isLoggedIn();