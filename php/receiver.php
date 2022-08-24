<?php 
header('Access-Control-Allow-Origin: *');

 include_once 'security.php';

 include_once 'config.php';

 $receiver = new Conn();

 $id = $_POST['id'];

 $output = '';

 $getReceiver = $receiver->getReceiver($id);

 foreach ($getReceiver as $row) {

  $output .= '

        <img src="php/profile_pics/'.$row['img'].'" alt="">

        <div class="user_name_status">

          <span>'.$row['fname'].' '.$row['lname'].'</span>

          <p>'.$row['status'].'</p>

        </div>';

 }

 echo $output;

?>