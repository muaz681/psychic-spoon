<?php
session_start();
require_once '../db.php';
require_once 'check_asset.php';
  $banner_id = $_POST['banner_id'];
  $banner_title = $_POST['banner_title'];
  $banner_sub_title = $_POST['banner_sub_title'];
  $update_query = "UPDATE banners SET banner_title = '$banner_title', banner_subtitle ='$banner_sub_title' WHERE id=$banner_id";
  mysqli_query($db_connect, $update_query);

  //banner image edit option


  $banner_edit_image_original_name = $_FILES['banner_image']['name'];
  if ($banner_edit_image_original_name) {

    $uploaded_files_name = $_FILES['banner_image']['name'];
    $uploaded_files_exploded = explode('.', $uploaded_files_name);
    $original_extension = end($uploaded_files_exploded);
    $except_extension = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
    $uploaded_image_size = $_FILES['banner_image']['size'];

    if (in_array($original_extension, $except_extension)) {
      if ($uploaded_image_size <= 3000000) {
        $banner_edit_select_query = "SELECT photo_location FROM banners WHERE id=$banner_id";
        $banner_edit_mysqli_query = mysqli_query($db_connect, $banner_edit_select_query);
        $banner_edit_after_assoc = mysqli_fetch_assoc($banner_edit_mysqli_query);
        unlink("../".$banner_edit_after_assoc['photo_location']);

        $insert_id_name = $banner_id. ".". $original_extension;
        $new_location = '../upload/banners/' . $insert_id_name;
        $tmp_name_image = $_FILES['banner_image']['tmp_name'];
        move_uploaded_file($tmp_name_image, $new_location);

        //update query
        $new_photo_location = 'upload/banners/'.$insert_id_name;
        $update_query = "UPDATE banners SET photo_location = '$new_photo_location' WHERE id= $banner_id";
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
  }
  // header('location: add_banner.php');
 ?>
