<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';

  $select_db_input_query = "SELECT id, name, email, phone_number FROM users";
  $input_db_query = mysqli_query($db_connect, $select_db_input_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
          <h5 class="card-header">Admin List</h5>
          <div class="card-body">
            <table class="table table-bordered" id="user_dashboard">
              
              </style>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!-- <th>Password</th> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($input_db_query as $input_db_value): ?>

                <tr>
                  <th><?=$input_db_value['id']?></th>
                  <th><?=$input_db_value['name']?></th>
                  <th><?=$input_db_value['email']?></th>
                  <th><?=$input_db_value['phone_number']?></th>

                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
     </div>
   </div>
 </div>


 <?php
    require_once '../footer.php';
  ?>
