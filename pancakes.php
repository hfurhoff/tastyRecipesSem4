<?php
include 'resources/views/fragments/init.php';
$_SESSION['currentpage'] = 'pancakes';

include 'resources/httpParamVarHandlers/pancakesVars.php';

include 'resources/views/pancakespage.php';
$contr->shutdown();
