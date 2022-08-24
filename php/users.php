<?php 
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

include_once 'config.php';

$getUser = new Conn();

$getUser1 = $getUser->getUser($_SESSION['id']);

foreach ($getUser1 as $user) {

  echo '<img src="php/profile_pics/'. $user['img'] .'" class="cert" alt="">

        <div class="name_status">

          <p class="name"> '. $user['fname'] . ' ' . $user['lname'] .' </p>
    
          <p class="status">'. $user['status'] .'</p>

        </div>';

}




?>