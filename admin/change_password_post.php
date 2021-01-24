<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../db.php';
  $email = $_POST['user_email'];
  $old_password = md5($_POST['old_password']);
  $new_password = md5($_POST['new_password']);

  if ($old_password == $new_password) {
    $_SESSION['error_msg'] = "Your old password and new paswword is match";
    header("location: change_password.php");
  }
  else {
    $select_change = "SELECT COUNT(*) AS users_email_password FROM users WHERE email='$email' AND password='$old_password'";
    $select_change_query = mysqli_query($db_connect, $select_change);
    $after_assoc = mysqli_fetch_assoc($select_change_query);

    if ($after_assoc['users_email_password'] == 1) {
      $update_query = "UPDATE users SET password='$new_password' WHERE email='$email'";
      mysqli_query($db_connect, $update_query);
      header("location: profile.php");


    }else {
      $_SESSION['error_msg'] = "Your Old password is wrong";
      header("location: change_password.php");

    }
  }

 ?>
