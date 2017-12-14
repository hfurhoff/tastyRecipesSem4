<?php
include 'resources/views/fragments/init.php';

include 'resources/httpParamVarHandlers/signupVars.php';

include 'resources/views/signuppage.php';

$_SESSION["lastpage"] = "signup.php";
$contr->shutdown();
