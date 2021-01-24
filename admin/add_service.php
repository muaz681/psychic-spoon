<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';


  $email = $_SESSION['user_email'];
  $select_user_input_query = "SELECT * FROM services";
  $input_user_query = mysqli_query($db_connect, $select_user_input_query);



 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-8">
       <div class="card mt-4">
          <h5 class="card-header bg-dark text-white">Add Services
          </h5>
          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr class="bg-dark text-light">
                  <th>Id</th>
                  <th>Banner Title</th>
                  <th>Banner Subtitle</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($input_user_query as $input_db_value): ?>

                <tr>
                  <th><?=$input_db_value['id']?></th>
                  <th><?=$input_db_value['service_title']?></th>
                  <th><?=$input_db_value['service_description']?></th>
                  <th>
                      <img width="250" src="../<?=$input_db_value['service_photo']?>" alt="">
                  </th>
                  <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="edit_service.php?service_id=<?=$input_db_value['id']?>" class="btn btn-sm btn-info">Edit</a>
                    <?php
                        if ($input_db_value['active_status'] == 2) {
                           ?>
                          <a href="active_service.php?service_id=<?=$input_db_value['id']?>" class="btn btn-sm btn-success">Active</a>
                          <a href="delete_service.php?service_id=<?=$input_db_value['id']?>" class="btn btn-sm btn-danger">Delete</a>
                    <?php
                  }elseif ($input_db_value['active_status'] == 1) {
                    ?>
                    <a href="deactive_service.php?service_id=<?=$input_db_value['id']?>" class="btn btn-sm btn-warning">Deactive</a>
                    <?php
                  }
                     ?>

                  </div>
                    
                  </th>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>

     </div>
     <div class="col-md-4">
       <div class="card mt-4">
          <h5 class="card-header bg-dark text-white">Add Services
          </h5>
          <div class="card-body">

            <form action="add_service_post.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Service Title</label>
                <input type="text" class="form-control" name="service_title">
              </div>

              <div class="form-group">
                <label>Service Description</label>
                <input type="text" class="form-control" name="service_sub_title">
              </div>

              <div class="form-group">
                <label>Service Image</label>
                <input type="file" class="form-control" name="service_image">
              </div>
              <button type="submit" class="btn btn-success">Add Service</button>
            </form>

          </div>
        </div>
        <?php if (isset($_SESSION['error_msg'])): ?>


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php
            echo $_SESSION['error_msg'];
            unset($_SESSION['error_msg']);
           ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php endif; ?>

     </div>
   </div>
 </div>


 <?php
    require_once '../footer.php';
  ?>
