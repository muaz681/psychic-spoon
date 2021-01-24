<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';


  $email = $_SESSION['user_email'];
  $select_user_input_query = "SELECT name, email, phone_number FROM users WHERE email='$email'";
  $input_user_query = mysqli_query($db_connect, $select_user_input_query);
  $after_assoc = mysqli_fetch_assoc($input_user_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
          <h5 class="card-header bg-info text-white">Profile Edit
          </h5>
          <div class="card-body">

            <form action="profile_edit_post.php" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="hidden" class="form-control" value="<?= $after_assoc['email']?>" name="user_email">
                <input type="text" class="form-control" value="<?= $after_assoc['name']?>" name="user_name">

              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" value="<?= $after_assoc['phone_number']?>" name="phone_number">
              </div>
              <button type="submit" class="btn btn-success">Save</button>
            </form>

          </div>
        </div>
     </div>
   </div>
 </div>


 <?php
    require_once '../footer.php';
  ?>
