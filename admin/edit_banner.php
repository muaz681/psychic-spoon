<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';


  $banner_id = $_GET['banner_id'];
  $select_user_input_query = "SELECT id, banner_title, banner_subtitle, photo_location FROM banners WHERE id=$banner_id";
  $input_user_query = mysqli_query($db_connect, $select_user_input_query);
  $after_assoc = mysqli_fetch_assoc($input_user_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
          <h5 class="card-header bg-info text-white">Edit Banner
          </h5>
          <div class="card-body">

            <form action="edit_banner_post.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Banner Title</label>
                <input type="hidden" class="form-control" value="<?= $after_assoc['id']?>" name="banner_id">
                <input type="text" class="form-control" value="<?= $after_assoc['banner_title']?>" name="banner_title">
              </div>
              <div class="form-group">
                <label>Banner Sub Title</label>
                <input type="text" class="form-control" value="<?= $after_assoc['banner_subtitle']?>" name="banner_sub_title">
              </div>
              <div class="form-group">
                <label>Banner Image</label>
                <input type="file" class="form-control" value="<?= $after_assoc['photo_location']?>" name="banner_image">
                <img height="100" width="250" src="../<?= $after_assoc['photo_location']?>" alt="">
              </div>
              <button type="submit" class="btn btn-info">Save</button>
            </form>

          </div>
        </div>
     </div>
   </div>
 </div>


 <?php
    require_once '../footer.php';
  ?>
