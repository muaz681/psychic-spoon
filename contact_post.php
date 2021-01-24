<?php
  require_once 'db.php';
  $guest_name = $_POST['guest_name'];
  $guest_email = $_POST['guest_email'];
  $guest_message = $_POST['guest_message'];

  $insert_contact_message = "INSERT INTO messages (guest_name, guest_email, guest_messages) VALUES ('$guest_name', '$guest_email', '$guest_message')";
  mysqli_query($db_connect, $insert_contact_message);
  header('location: index.php');
 ?>
