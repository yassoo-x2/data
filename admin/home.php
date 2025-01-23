<?php
ob_start();
SESSION_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['adm'])) {
    $pageTitle = 'Home';
    include 'init.php';

    include  $tpl . 'footer.php';
} else {
    header('location: ../index.php');
}
ob_end_flush();
?>