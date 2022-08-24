<?php header('Access-Control-Allow-Origin: *'); include_once 'security.php'; ?>

<?php $receiver_id = $_GET['id']; ?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style/style.css">

  <title>Login</title>

</head>

<body>

  <div class="wrapper chat_wrapper">

    <div class="user_details">

    </div>

    <div class="chat_box">
      
    </div>

    <form action="#" class="type_area">

      <input type="text" name="receiver_id" id="receiver_id" value="<?php echo $receiver_id; ?>" hidden>

      <input type="text" name="sender_id" value="<?php echo $_SESSION['id']; ?>" hidden>

      <input type="text" name="message" placeholder="Type a message here.." class="message"/>

      <input type="submit" name="send" value="Send" class="send"/>

    </form>

  </div>

  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="js/receiver.js"></script>

  <script src="js/chat.js"></script>
    
</body>

</html>