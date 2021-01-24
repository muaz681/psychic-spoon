<?php
  session_start();
  require_once 'check_asset.php';
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';

  $select_query = "SELECT * FROM settings";
  $select_mysqli_query = mysqli_query($db_connect, $select_query);

 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-4 m-auto">
       <div class="card mt-4">
          <h5 class="card-header bg-info text-white">Settings
          </h5>
          <div class="card-body">

            <form action="settings_post.php" method="post">
              <?php foreach ($select_mysqli_query as $value): ?>
              <div class="form-group">
                <label><?= $value['settings_head']?></label>
                <input type="text" class="form-control" name="<?= $value['id']?>" value="<?= $value['information']?>">
              </div>
              <?php endforeach; ?>
              <button type="submit" class="btn btn-info">Update</button>
            </form>

          </div>
        </div>
     </div>

   </div>
 </div>

 <?php
    require_once '../footer.php';
  ?>
