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

  <div class="wrapper index">

    <div class="header">

      <p class="top_text">WeChat</p>

    </div>

    <form action="#" id="loginForm" method="POST">

      <div class="error_msg">

        <p id="err"></p>

      </div>

      <div class="email_field">

        <input type="email" name="uname" placeholder="Email..." class="input_field"/>

      </div>

      <div class="pword_field relative">

        <input type="password" name="pword" placeholder="Password..." class="pword input_field"/>

        <img src="icon/eye.png" class="eye" alt="">

      </div>

      <div class="sbmt_field">

        <input type="submit" name="sbmt" value="Login" class="btn"/>

      </div>

    </form>

    <div class="signup_field">

      <p>No Account? Sign up</p>

      <a href="signup.php" class="here"> here</a>

    </div>

  </div>

  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="js/pass-show-hide.js"></script>

  <script src="js/login.js"></script>
    
</body>

</html>