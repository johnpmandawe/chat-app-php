<?php 
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

include_once 'config.php';

$logout = new Conn();

$confirmLogout = $logout->offlineStatus($_SESSION['id']);

if ($confirmLogout) {

  session_unset();

  session_destroy();

  header("location: ../");

}
?>