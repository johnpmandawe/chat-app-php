<?php 
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

include_once 'config.php';

$getAllUsers = new Conn();

$sender_id = $_SESSION['id'];

$getUsers = $getAllUsers->getAllUsers($sender_id);

$output = '';

if ($getUsers->rowCount() <= 0 ) {

  $output .= 'No users available to chat';

} else {

  include 'data.php';

}

echo $output;

?>