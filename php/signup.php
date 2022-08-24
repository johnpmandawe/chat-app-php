<?php 
header('Access-Control-Allow-Origin: *');

  include_once 'config.php';

  $insertData = new Conn();

  $fname = $_POST['fname'];

  $lname = $_POST['lname'];

  $email = $_POST['email'];

  $pword = $_POST['pword'];
  
  if (!empty($fname) && !empty($lname) && !empty($email) && !empty($pword)) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      if ($insertData->validateEmail($email) > 0) {

        echo 'Email already exists.';

      } else {

        if (isset($_FILES['image'])) {

          $extensions = ['jpeg', 'png', 'jpg'];

          $img_name = $_FILES['image']['name'];

          $tmp_name = $_FILES['image']['tmp_name'];

          $exploded = explode('.', $img_name);

          $ext = end($exploded);

          if (in_array($ext, $extensions) === true) {

            $time = time();

            $new_image_name = $time.$img_name;

            if (move_uploaded_file($tmp_name, 'profile_pics/'.$new_image_name)) {

              $unique_id = rand(1000, 100000);

              $status = 'Offline now';

              $ins = $insertData->insertData($unique_id, $fname, $lname, $email, $pword, $new_image_name, $status);

              if ($ins) {

                echo 'success';

              } else {

                echo 'Something went wrong.';

              }

            }

          } else {

            echo 'Please select an image file - jpg, png, jpeg.';

          }

        }

      }

    } else {

      echo 'Invalid email format.';

    }

  } else {

    echo 'All input fields are required.';

  }

?>