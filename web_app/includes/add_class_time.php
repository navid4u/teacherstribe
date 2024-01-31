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





$fullname = $_POST['student'];
 
$fromtime = $_POST['fromtime'];
$day = $_POST['day'];
$totime = $_POST['totime'];
$ttep_day_time = "On $day from $fromtime to $totime";

 

 
$sql = "INSERT INTO ttep_class_time (ttep_teacher_username, student, ttep_day_time ) 
VALUES ('$ttep_teacher_username', '$fullname', '$ttep_day_time')";

$result = mysqli_query($conn, $sql);
header('Location: ../classes.php');

?>