<?php
  require_once 'check_asset.php';
  require_once '../db.php';
  $message_id = $_GET['message_id'];

  $update_query = "UPDATE messages SET user_status = 2 WHERE id = $message_id";
  mysqli_query($db_connect, $update_query);
  header("location: guest_message.php");
 ?>
