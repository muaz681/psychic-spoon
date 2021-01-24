<?php
  session_start();
  require_once '../db.php';
  $service_title = $_POST['service_title'];
  $service_sub_title = $_POST['service_sub_title'];

  $uploaded_files_name = $_FILES['service_image']['name'];
  $uploaded_files_exploded = explode('.', $uploaded_files_name);
  $original_extension = end($uploaded_files_exploded);
  $except_extension = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

  //image size
  $uploaded_image_size = $_FILES['service_image']['size'];

  if (in_array($original_extension, $except_extension)) {
    if ($uploaded_image_size <= 2000000) {
      $insert_query = "INSERT INTO services (service_title, service_description, service_photo) VALUES ('$service_title', '$service_sub_title', 'primary_location')";
      mysqli_query($db_connect, $insert_query);
      $insert_id_name = mysqli_insert_id($db_connect). ".". $original_extension;
      $new_location = '../upload/services/' . $insert_id_name;
      $tmp_name_image = $_FILES['service_image']['tmp_name'];
      move_uploaded_file($tmp_name_image, $new_location);
      //update query
      $new_photo_location = 'upload/services/' . $insert_id_name;
      $id_insert = mysqli_insert_id($db_connect);
      $update_query = "UPDATE services SET service_photo = '$new_photo_location' WHERE id= $id_insert";
      mysqli_query($db_connect, $update_query);
      header('location: add_service.php');
    }
    else {
      $_SESSION['error_msg'] = "Image size is more then 3mb!";
      header('location: add_service.php');
    }
  }
  else {
    $_SESSION['error_msg'] = "This extension is something wrong";
    header('location: add_service.php');
  }

 ?>
