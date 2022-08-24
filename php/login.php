<?php 
header('Access-Control-Allow-Origin: *');

session_start();

include_once 'config.php';

$getData = new Conn();

$uname = $_POST['uname'];

$pword = $_POST['pword'];

if (!empty($uname) && !empty($pword)) {

  $user = $getData->getUserCred($uname, $pword);

  if ($user > 0) {

    $userData = $getData->getUserId($uname, $pword);

    foreach ($userData as $user_id) {

       $_SESSION['id'] = $user_id['unique_id'];

    }

    $getData->onlineStatus($_SESSION['id']);

    echo 'success';

  } else {

    echo 'Invalid username or password.';

  }

} else {

  echo 'All fields are required.';

}

?>