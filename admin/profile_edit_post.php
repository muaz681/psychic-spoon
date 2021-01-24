<?php
require_once 'check_asset.php';
require_once '../db.php';
$email = $_POST['user_email'];
$name = $_POST['user_name'];
$phone_number = $_POST['phone_number'];

$update_query = "UPDATE users SET name='$name', phone_number='$phone_number' WHERE email='$email'";
mysqli_query($db_connect, $update_query);
header("location: profile.php");

 ?>
