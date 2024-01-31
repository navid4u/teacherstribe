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





$student = $_POST['student'];
$xlocation = $_POST['location'];
$xassignment = $_POST['assignment'];

$xextra_information = $_POST['extra_information'];
$date = $_POST['date'];
$extra_information = $_POST['extra_information'];
 $time = $_POST['time'];
  

$day = $_POST['day'];
$day = implode(" ", $day);

 
 
 $location = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xlocation);
  $extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);
  $assignment = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xassignment);
 
$sql = "INSERT INTO ttep_session (ttep_teacher_username, id_ttep_student, location, assignment, date, day, extra_information, time) 
VALUES ('$ttep_teacher_username', '$student', '$location', '$assignment', '$date', '$day', '$extra_information', '$time')";

$result = mysqli_query($conn, $sql);
header('Location: ../session.php');

?>