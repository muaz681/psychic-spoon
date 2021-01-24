

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="../index.php" target="_blank">Visit Website <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="add_banner.php">Add Banner</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="about.php">About</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="add_service.php">Add Service</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="settings.php">Settings</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="guest_message.php">
           Guest Message
           <?php
            require_once '../db.php';
            $select_total_count = "SELECT COUNT(*) AS total_user_status FROM messages WHERE user_status = 1";
            $select_total_query = mysqli_query($db_connect, $select_total_count);
            $select_total_assoc = mysqli_fetch_assoc($select_total_query);

            ?>
           <span class="badge badge-success"><?= $select_total_assoc['total_user_status']?></span>
         </a>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?php
                   echo $_SESSION['user_email'];
             ?>
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="profile.php">Admin Profile</a>
           <a class="dropdown-item" href="change_password.php">Change Password</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item text-danger" href="logout.php">Log Out</a>
         </div>
       </li>
     </ul>
     <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
   </div>
 </nav>
