<?php
  session_start();
  require_once '../db.php';
  $banner_title = $_POST['banner_title'];
  $banner_sub_title = $_POST['banner_sub_title'];

  $uploaded_files_name = $_FILES['banner_image']['name'];
  $uploaded_files_exploded = explode('.', $uploaded_files_name);
  $original_extension = end($uploaded_files_exploded);
  $except_extension = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

  //image size
  $uploaded_image_size = $_FILES['banner_image']['size'];

  if (in_array($original_extension, $except_extension)) {
    if ($uploaded_image_size <= 3000000) {
      $insert_query = "INSERT INTO banners (banner_title, banner_subtitle, photo_location) VALUES ('$banner_title', '$banner_sub_title', 'primary_location')";
      mysqli_query($db_connect, $insert_query);
      $insert_id_name = mysqli_insert_id($db_connect). ".". $original_extension;
      $new_location = '../upload/banners/' . $insert_id_name;
      $tmp_name_image = $_FILES['banner_image']['tmp_name'];
      move_uploaded_file($tmp_name_image, $new_location);
      //update query
      $new_photo_location = 'upload/banners/' . $insert_id_name;
      $id_insert = mysqli_insert_id($db_connect);
      $update_query = "UPDATE banners SET photo_location = '$new_photo_location' WHERE id= $id_insert";
      mysqli_query($db_connect, $update_query);
      header('location: add_banner.php');
    }
    else {
      $_SESSION['error_msg'] = "Image size is more then 3mb!";
      header('location: add_banner.php');
    }
  }
  else {
    $_SESSION['error_msg'] = "This extension is something wrong";
    header('location: add_banner.php');
  }

 ?>
