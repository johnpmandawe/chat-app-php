<?php 
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

include_once 'config.php';

$getAllUsers = new Conn();

$sender_id = $_SESSION['id'];

$output = '';

$searchStr = $_POST['searchStr'];

$getUsers = $getAllUsers->searchUser($sender_id, $searchStr);

if ($getUsers->rowCount() > 0) {

  include 'data.php';

} else {

  $output .= 'No results found.';

}

echo $output;

?>