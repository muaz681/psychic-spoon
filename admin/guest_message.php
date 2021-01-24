<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';

  $select_db_input_query = "SELECT id, guest_name, guest_email, guest_messages, user_status FROM messages";
  $input_db_query = mysqli_query($db_connect, $select_db_input_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
          <h5 class="card-header">Guest Message</h5>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr class="bg-dark text-light">
                  <th>Id</th>
                  <th>Guest Name</th>
                  <th>Guest Email</th>
                  <th>Guest Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($input_db_query as $input_db_value): ?>

                <tr class="
                  <?php
                    if ($input_db_value['user_status'] == 1) {
                      echo "bg-info";
                    }
                   ?>
                ">
                  <th><?=$input_db_value['id']?></th>
                  <th><?=$input_db_value['guest_name']?></th>
                  <th><?=$input_db_value['guest_email']?></th>
                  <th><?=$input_db_value['guest_messages']?></th>

                  <?php if ($input_db_value['user_status'] == 1): ?>
                    <th>
                      <a href="message_read.php?message_id=<?=$input_db_value['id']?>" type="button" class="btn btn-success">Message read</a>
                    </th>
                  <?php endif; ?>

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
