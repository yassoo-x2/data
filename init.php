<?php
include 'admin/setting.php';

$tplad = 'admin/includes/templates/' ; //chortcut tampletes
$func = 'admin/includes/function/' ;
$css = 'admin/design/css/';   //chortcut css
$js = 'admin/design/js/';


//important folder
include $func . 'functions.php';
include  $tplad . 'header.php';
include  $tplad . 'API.php';

if(!isset($nonavbar)) {include $tplad . 'navbar.php';}




?>