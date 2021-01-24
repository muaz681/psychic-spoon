<?php
  session_start();
  require_once 'header.php';
 ?>



      <h1 class="text-center text-success p-3">Registration Form</h1>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <div class="card">
                     <div class="card-header text-center bg-dark">
                      <h2 class="text-white">Form</h2>
                     </div>
                     <div class="card-body">

                        <form method="post" action="register_post.php">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" class="form-control" placeholder="Enter your name" name="user_name">
                            </div>
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" class="form-control" placeholder="Enter your email" name="email">
                              <?php
                                   if (isset($_SESSION['error_msg_email'])) {
                               ?>

                               <span class="text-danger">
                                    <?php
                                        echo $_SESSION['error_msg_email'];
                                        unset($_SESSION['error_msg_email']);
                                     ?>
                                </span>

                               <?php
                                   }
                                ?>
                            </div>
                            <div class="form-group">
                              <label for="">Phone Number</label>
                              <input type="number" class="form-control" placeholder="Enter your number" name="phone_number">
                            </div>
                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" placeholder="Enter your password" name="password">
                              <?php
                                   if (isset($_SESSION['error_msg_password'])) {
                               ?>

                               <span class="text-danger">
                                    <?php
                                        echo $_SESSION['error_msg_password'];
                                        unset($_SESSION['error_msg_password']);
                                     ?>
                                </span>

                               <?php
                                   }
                                ?>
                            </div>
                            <div class="form-group">
                              <label for="">Confirm Password</label>
                              <input type="password" class="form-control" placeholder="Enter your password" name="confirm_password">
                              <?php
                                   if (isset($_SESSION['error_msg_conf_pass'])) {
                               ?>

                               <span class="text-danger">
                                    <?php
                                        echo $_SESSION['error_msg_conf_pass'];
                                        unset($_SESSION['error_msg_conf_pass']);
                                     ?>
                                </span>

                               <?php
                                   }
                                ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="login.php" class="btn btn-info">Login</a>
                            </form>
                     </div>

                     </div>



                       <!-- success message -->

                       <?php
                            if (isset($_SESSION['success_msg'])) {
                        ?>

                        <div class="alert alert-success" role="alert">
                             <?php
                                 echo $_SESSION['success_msg'];
                                 unset($_SESSION['success_msg']);
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
