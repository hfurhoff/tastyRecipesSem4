<?php
include 'resources/views/fragments/init.php';

include 'resources/httpParamVarHandlers/loginVars.php';

include 'resources/views/loginpage.php';

$_SESSION["lastpage"] = "login.php";
$contr->shutdown();

