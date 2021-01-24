<?php
  require_once '../db.php';
  require_once 'check_asset.php';
  foreach ($_POST as $id => $information) {
    $update_query = "UPDATE settings SET information = '$information' WHERE id=$id";
    mysqli_query($db_connect, $update_query);
  }
  header('location: settings.php');
 ?>
