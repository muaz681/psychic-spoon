<?php
  require_once '../db.php';
  require_once 'check_asset.php';
  $service_id = $_GET['service_id'];
  $update_query = "UPDATE services SET active_status = 2 WHERE id = $service_id";
  mysqli_query($db_connect, $update_query);
  header('location: add_service.php');
 ?>
