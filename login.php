<?php
  session_start();
  require_once 'header.php';
  if (isset($_SESSION['user_interpage'])) {
    header("location: admin/dashboard.php");
  }
 ?>



      <h1 class="text-center text-success p-3">Log In Form</h1>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <div class="card">
                     <div class="card-header text-center bg-dark">
                      <h2 class="text-white">Log in</h2>
                     </div>
                     <div class="card-body">

                        <form method="post" action="login_post.php">
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" class="form-control" placeholder="Enter your email" name="email">
                            </div>

                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" placeholder="Enter your password" name="password">

                            </div>


                            <button type="submit" class="btn btn-primary">Log in</button>
                            </form>
                     </div>

                     </div>



                       <!-- success message -->

                       <?php
                            if (isset($_SESSION['wrong_msg'])) {
                        ?>

                        <div class="alert alert-danger" role="alert">
                             <?php
                                 echo $_SESSION['wrong_msg'];
                                 unset($_SESSION['wrong_msg']);
                              ?>
                         </div>

                        <?php
                            }
                         ?>

                </div>
            </div>
       </div>
    <?php
      require_once 'footer.php';
     ?>
