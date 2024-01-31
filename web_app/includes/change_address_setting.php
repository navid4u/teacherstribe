<?php
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: login.php');
  exit();
}
;
 
 
require_once '../config.php';
$username = $_SESSION['username'];

 
 
$address_country = $_POST['address_country'];

$address_address= $_POST['address_address'];

$city= $_POST['city'];

   $clean_address_address = preg_replace('/[^a-zA-Z0-9\s-]/', '', $address_address);

 
$sql = "UPDATE ttep_teacher SET address_country = '$address_country', address_address= '$clean_address_address', city= '$city'  WHERE username = '$username';";
$result = mysqli_query($conn, $sql);



header('Location: ../profile.php?thanks=The contact information is updated!');
?>