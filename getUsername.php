<?php
namespace Recipes\View;

use Recipes\Util\Util;
use Recipes\Controller\Controller;

require_once 'classes/Recipes/Util/Util.php';
$contr = Util::init();
$username = $contr->getUser();
echo \json_encode($username);
$contr->shutdown();