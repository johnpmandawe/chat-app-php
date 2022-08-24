<?php 
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

include 'config.php';

$getChat = new Conn();

  $sender_id = $_POST['sender_id'];

  $receiver_id = $_POST['receiver_id'];

  $output = "";

  $get = $getChat->getChat($sender_id, $receiver_id);

  if ($get->rowCount() > 0) {

    foreach ($get as $row) {

      if ($row['sender_id'] == $sender_id) {

        $output .= '
                    <div class="chat outgoing">
            
                      <div class="details">
            
                        <p>'. $row['msg'] .'</p>
            
                      </div>
            
                    </div>';

      } else {

        $output .= '

                    <div class="chat incoming">
            
                      <img src="php/profile_pics/'. $row['img'] .'" alt="">
            
                      <div class="details">
            
                        <p>'. $row['msg'] .'</p>
            
                      </div>
            
                    </div>';

      }

    }

    echo $output;

  }

?>