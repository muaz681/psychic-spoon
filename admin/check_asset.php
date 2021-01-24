<?php
  if (!isset($_SESSION['user_interpage'])) {
    header("location: ../login.php");
  }
 ?>
