<?php
namespace Recipes\View;

use Recipes\Util\Util;
use Recipes\Controller\Controller;

require_once 'classes/Recipes/Util/Util.php';
$contr = Util::init();
$loggedIn = $contr->isLoggedIn();