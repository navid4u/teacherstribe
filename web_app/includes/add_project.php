<?php 
// Start a new or resume an existing session
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
$ttep_teacher_username = $_SESSION['username'];





$title = $_POST['title'];
$time = $_POST['time'];

 $detail = $_POST['detail'];
 $required = $_POST['required'];

 $extra_information = $_POST['extra_information'];


$importance = $_POST['importance'];
$importance = implode(" ", $importance);

$short_long = $_POST['short_long'];
$short_long = implode(" ", $short_long);
 
 
 
 
 $clean_title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $title);
  $clean_detail = preg_replace('/[^a-zA-Z0-9\s-]/', '', $detail);
 $clean_required = preg_replace('/[^a-zA-Z0-9\s-]/', '', $required);
 $clean_extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $extra_information);

 
 
 
 
 
 
$sql = "INSERT INTO ttep_project (ttep_teacher_username, title, detail, required, importance, time, short_long, extra_information) 
VALUES ('$ttep_teacher_username', '$clean_title', '$clean_detail', '$clean_required', '$importance', '$time', '$short_long', '$clean_extra_information')";

$result = mysqli_query($conn, $sql);
header('Location: ../project.php?thanks=Project is added!');

?>