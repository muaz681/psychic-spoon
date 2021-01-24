<?php
    session_start();
    require_once 'db.php';

    $name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    //email sanitize
    $after_sanitize_email = filter_var($email, FILTER_SANITIZE_EMAIL);
      //password validation
    $password_capital = preg_match("@[A-Z]@", $password);
    $password_small = preg_match("@[a-z]@", $password);
    $password_char = preg_match("@[0-9]@", $password);
    //email validate if else
    if (!filter_var($after_sanitize_email, FILTER_VALIDATE_EMAIL)) {
      //invalid email message
      $_SESSION['error_msg_email'] = "Invalid email";
      header("location: register.php");

    }
    else {
      //password validation if else
      if ($password_capital == 1 && $password_small == 1 && $password_char == 1 && strlen($password) >= 8) {
            //confirm password if else
          if ($password == $confirm_password) {
            //encrepete password pattern
          $encrepted_password = md5($password);
          //email count query
            $checking_query = "SELECT COUNT(*) AS total_count FROM users WHERE email = '$after_sanitize_email'";
            $after_query_checking = mysqli_query($db_connect, $checking_query);
            $after_assoc = mysqli_fetch_assoc($after_query_checking);
            if ($after_assoc['total_count'] == 0) {
              $inser_query = "INSERT INTO users (name, email, phone_number, password) VALUES ('$name', '$after_sanitize_email', '$phone_number', '$encrepted_password')";
              mysqli_query($db_connect, $inser_query);
              $_SESSION['success_msg'] = "Your register is Successfully";
              header("location: register.php");
            }
            else {
              //email existing message
              $_SESSION['error_msg_email'] = "This email is already exist";
              header("location: register.php");
            }
          }
          else {
            $_SESSION['error_msg_conf_pass'] = "Your confirm password is wrong";
            header("location: register.php");
          }



      }
      else {
        //password wrong message
        $_SESSION['error_msg_password'] = "Please type one capital letter one small letter one character and eight digits password";
        header("location: register.php");

      }
    }



 ?>
