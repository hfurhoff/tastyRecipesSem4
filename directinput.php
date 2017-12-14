<?php
namespace Recipes\View;

use Recipes\Util\Util;
use Recipes\Controller\Controller;

require_once 'classes/Recipes/Util/Util.php';
$contr = Util::init();
$loggedIn = $contr->isLoggedIn();
if($loggedIn){
    if(!empty($_POST['newComment'])){
        $commentToAdd = htmlentities($_POST['newComment'], ENT_QUOTES);
        $contr->addComment($commentToAdd, $_SESSION['currentpage']);
    } else if (!empty($_POST['timestamp'])) {
        $contr->deleteComment($_POST['timestamp'], $_SESSION['currentpage']);
    }
}
$contr->shutdown();
