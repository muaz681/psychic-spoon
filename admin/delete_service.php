<?php
  require_once '../db.php';
  $service_id = $_GET['service_id'];
  $banner_delete_select_query = "SELECT service_photo FROM services WHERE id =$service_id";
  $banner_delete_mysqli_query = mysqli_query($db_connect, $banner_delete_select_query);
  $banner_delete_after_assoc = mysqli_fetch_assoc($banner_delete_mysqli_query);
  unlink("../".$banner_delete_after_assoc['service_photo']);

  $banar_delete_query = "DELETE FROM services WHERE id = $service_id";
  mysqli_query($db_connect, $banar_delete_query);
  header('location: add_service.php');
 ?>
