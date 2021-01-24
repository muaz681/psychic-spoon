<?php
  session_start();
  unset($_SESSION['user_interpage']);
  unset($_SESSION['user_email']);
  header("location: ../login.php");
 ?>
