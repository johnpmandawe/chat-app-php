<?php
header('Access-Control-Allow-Origin: *');

include_once 'security.php';

$res = '';

$you = '';

$msg = '';

$status = '';

$sender = 0;

$update = '';

foreach ($getUsers as $user) {

  $status = $user['status'];

  $getLastChat = $getAllUsers->getLastChat($sender_id, $user['unique_id']);

  if ($getLastChat->rowCount() > 0) {

    foreach ($getLastChat as $row) {

      $res = $row['msg'];

      $sender = $row['sender_id'];

    }

  } else {

    $res = "No messages available";

  }

  (strlen($res) > 28) ? $msg = substr($res, 0, 28).'...' : $msg = $res;

  ($sender_id == $sender) ? $you = "You: " : $you = "";

  ($status === 'Active now') ? $update = "online" : $update = "offline";

  $output .= '
        <a href="chat.php?id='. $user['unique_id'] .'">

          <div class="content">

            <img src="php/profile_pics/'. $user['img'] .'" alt="">

            <div class="name_msg">

                <span>'. $user['fname'] .' '. $user['lname'] .'</span>

                <p>'. $you . $msg .'</p>

            </div>

          </div>

          <div class="status_dot '. $update .'"></div>

        </a>';

}

?>