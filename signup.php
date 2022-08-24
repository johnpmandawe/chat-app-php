<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style/style.css">

  <title>Sign Up</title>

</head>

<body>

  <div class="wrapper index">

    <div class="header">

      <p class="top_text">WeChat</p>

    </div>

    <form action="#" class="signupForm" enctype="multipart/form-data" method="POST">

      <div class="error_msg">

        <p id="err"></p>

        <p id="success"></p>

      </div>
        
      <div class="name_field">

        <input type="text" name="fname" placeholder="Firstname" class="input_field half" required/>

        <input type="text" name="lname" placeholder="Lastname" class="input_field half" required/>

      </div>

      <div class="email_field">

        <input type="email" name="email" placeholder="Email" class="input_field" required/>

      </div>

      <div class="pword_field relative">

        <input type="password" name="pword" placeholder="Password" class="pword input_field" required/>

        <img src="icon/eye.png" class="eye" alt="">

      </div>

      <div class="pic_field">

        <p>Select profile picture</p>

        <input type="file" name="image" class="input_field image"/>

      </div>

      <div class="sbmt_field">

        <input type="submit" name="signup" value="Sign up" class="btn"/>

      </div>

    </form>

    <div class="login_field">

      <p>Login</p>

      <a href="index.php" class="here">here</a>

    </div>

  </div>

  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="js/pass-show-hide.js"></script>

  <script src="js/signup.js"></script>
    
</body>

</html>