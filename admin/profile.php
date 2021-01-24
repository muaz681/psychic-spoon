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
          <h5 class="card-header bg-info text-white">Profile
            <a class="btn btn-warning" href="profile_edit.php">Edit</a>
          </h5>
          <div class="card-body">
            <p class="font-weight-bold">Email : <?= $after_assoc['email']?></p>
            <p class="font-weight-bold">Name : <?= $after_assoc['name']?></p>
            <p class="font-weight-bold">Phone Number : <?= $after_assoc['phone_number']?></p>
          </div>
        </div>
     </div>
   </div>
 </div>


 <?php
    require_once '../footer.php';
  ?>
