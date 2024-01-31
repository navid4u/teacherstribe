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

 
 
$email = $_POST['email'];

$contact_number= $_POST['contact_number'];

$firstname= $_POST['firstname'];

$lastname= $_POST['lastname'];
 
$sql = "UPDATE ttep_teacher SET contact_number = '$contact_number', firstname= '$firstname', email= '$email' , lastname= '$lastname' WHERE username = '$username';";
$result = mysqli_query($conn, $sql);



header('Location: ../profile.php?thanks=the setting is updated!');
?>