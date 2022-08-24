<?php 
header('Access-Control-Allow-Origin: *');

  include_once 'security.php';

  include_once 'config.php';

  $insertChat = new Conn();

  $sender_id = $_POST['sender_id'];

  $receiver_id = $_POST['receiver_id'];

  $message = $_POST['message'];

  if (!empty($message)) {

    $insert = $insertChat->insertChat($sender_id, $receiver_id, $message);

  }


?>