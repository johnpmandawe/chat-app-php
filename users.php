<?php header('Access-Control-Allow-Origin: *'); include_once 'security.php'; ?>

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

  <div class="wrapper users_wrapper">

    <div id="header">

      <div class="details">

      </div>

      <div class="logout_field">

        <a href="php/logout.php" class="logout">Logout</a>

      </div>

    </div>

    <form action="#" class="search_field">

      <input type="text" name="search" placeholder="Search here.." class="input_field search">

    </form>

    <div class="users_list">

    </div>
  
  </div>

  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="js/users.js"></script>

  <script src="js/display_users.js"></script>
    
</body>

</html>