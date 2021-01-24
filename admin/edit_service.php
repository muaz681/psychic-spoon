<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';


  $service_id = $_GET['service_id'];
  $select_user_input_query = "SELECT id, service_title, service_description, service_photo FROM services WHERE id=$service_id";
  $input_user_query = mysqli_query($db_connect, $select_user_input_query);
  $after_assoc = mysqli_fetch_assoc($input_user_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
          <h5 class="card-header bg-dark text-white">Edit Service
          </h5>
          <div class="card-body">

            <form action="edit_service_post.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Banner Title</label>
                <input type="hidden" class="form-control" value="<?= $after_assoc['id']?>" name="service_id">
                <input type="text" class="form-control" value="<?= $after_assoc['service_title']?>" name="service_title">
              </div>
              <div class="form-group">
                <label>Banner Sub Title</label>
                <input type="text" class="form-control" value="<?= $after_assoc['service_description']?>" name="service_sub_title">
              </div>
              <div class="form-group">
                <label>Banner Image</label>
                <input type="file" class="form-control" value="<?= $after_assoc['service_photo']?>" name="service_image">
                <img height="100" width="250" src="../<?= $after_assoc['service_photo']?>" alt="">
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
