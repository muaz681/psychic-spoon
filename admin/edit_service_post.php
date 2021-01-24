<?php
session_start();
require_once '../db.php';
require_once 'check_asset.php';
  $service_id = $_POST['service_id'];
  $service_title = $_POST['service_title'];
  $service_sub_title = $_POST['service_sub_title'];
  $update_query = "UPDATE services SET service_title = '$service_title', service_description ='$service_sub_title' WHERE id=$service_id";
  mysqli_query($db_connect, $update_query);

  //banner image edit option


  $banner_edit_image_original_name = $_FILES['service_image']['name'];
  if ($banner_edit_image_original_name) {

    $uploaded_files_name = $_FILES['service_image']['name'];
    $uploaded_files_exploded = explode('.', $uploaded_files_name);
    $original_extension = end($uploaded_files_exploded);
    $except_extension = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
    $uploaded_image_size = $_FILES['service_image']['size'];

    if (in_array($original_extension, $except_extension)) {
      if ($uploaded_image_size <= 2000000) {
        $banner_edit_select_query = "SELECT service_photo FROM services WHERE id=$service_id";
        $banner_edit_mysqli_query = mysqli_query($db_connect, $banner_edit_select_query);
        $banner_edit_after_assoc = mysqli_fetch_assoc($banner_edit_mysqli_query);
        unlink("../".$banner_edit_after_assoc['service_photo']);

        $insert_id_name = $service_id. ".". $original_extension;
        $new_location = '../upload/services/' . $insert_id_name;
        $tmp_name_image = $_FILES['service_image']['tmp_name'];
        move_uploaded_file($tmp_name_image, $new_location);

        //update query
        $new_photo_location = 'upload/services/'.$insert_id_name;
        $update_query = "UPDATE services SET service_photo = '$new_photo_location' WHERE id= $service_id";
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
  }
  header('location: add_service.php');
 ?>
