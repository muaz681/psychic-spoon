<?php
  require_once '../db.php';
  $banner_id = $_GET['banner_id'];
  $banner_delete_select_query = "SELECT photo_location FROM banners WHERE id =$banner_id";
  $banner_delete_mysqli_query = mysqli_query($db_connect, $banner_delete_select_query);
  $banner_delete_after_assoc = mysqli_fetch_assoc($banner_delete_mysqli_query);
  unlink("../".$banner_delete_after_assoc['photo_location']);

  $banar_delete_query = "DELETE FROM banners WHERE id = $banner_id";
  mysqli_query($db_connect, $banar_delete_query);
  header('location: add_banner.php');
 ?>
