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





$xtitle = $_POST['title'];
$xdetail = $_POST['detail'];
$date = $_POST['date'];
$title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xtitle);
$detail = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdetail);

$sql = "UPDATE ttep_reminder SET title='$title', detail='$detail', date='$date' WHERE ttep_teacher_username='$ttep_teacher_username' AND reminder_id=$reminder_id";


$result = mysqli_query($conn, $sql);
header('Location: ../reminder.php');

?>