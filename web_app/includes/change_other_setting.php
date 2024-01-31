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
$xsigniture = $_POST['signiture'];

 $signiture = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xsigniture);

 
 

 
 
$sql = "UPDATE ttep_teacher SET signiture = '$signiture'  WHERE username = '$username';";
$result = mysqli_query($conn, $sql);



header('Location: ../profile.php?thanks=The setting is updated!');
?>