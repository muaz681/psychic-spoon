<?php
  session_start();
  require_once 'db.php';

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $select_query = "SELECT COUNT(*) AS user_email_password_count FROM users WHERE email='$email' AND password='$password'";
  $select_mysqli_query = mysqli_query($db_connect, $select_query);
  $after_assoc = mysqli_fetch_assoc($select_mysqli_query);

  if ($after_assoc['user_email_password_count'] == 1) {
        $_SESSION['user_interpage'] = "yes";
        $_SESSION['user_email'] = $email;
        header('location: admin/dashboard.php');
  }
  else {
    $_SESSION['wrong_msg'] = "Your Email and Password are wrong";
    header("location: login.php");
  }


  // echo $password;
 ?>
