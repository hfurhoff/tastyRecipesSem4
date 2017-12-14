<?php
namespace Recipes\View;

use Recipes\Util\Util;
use Recipes\Controller\Controller;

require_once 'classes/Recipes/Util/Util.php';
$contr = Util::init();
\set_time_limit(0);

$comments = $contr->getComments($_SESSION['currentpage']);
$currentNo = $_GET['noOfComments'];
while(count($comments) == $currentNo){
    \session_write_close();
    \sleep(1);
    $contr = Util::init();
    $comments = $contr->getComments($_SESSION['currentpage']);
}
echo \json_encode($comments);
$contr->shutdown();