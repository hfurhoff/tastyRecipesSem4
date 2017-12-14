<?php
include 'resources/views/fragments/init.php';
$_SESSION['currentpage'] = 'meatballs';

include 'resources/views/meatballspage.php';
$contr->shutdown();
