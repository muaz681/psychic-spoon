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
          <h5 class="card-header bg-info text-white">Password Change
          </h5>
          <div class="card-body">

            <form action="change_password_post.php" method="post">
              <div class="form-group">
                <label>Old Password</label>
                <input type="hidden" class="form-control" value="<?= $after_assoc['email']?>" name="user_email">
                <input type="password" class="form-control" name="old_password">

              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password">
              </div>
              <button type="submit" class="btn btn-success">Change</button>
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
