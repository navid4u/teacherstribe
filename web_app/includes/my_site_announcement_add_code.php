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
$username = $_SESSION['username'];
$date = $_POST['date'];
$xtitle = $_POST['title'];
 $xdescription = $_POST['description'];
$st_username = $_POST['st_username'];
$title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xtitle);
$description = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdescription);


if (isset($_GET['id'])) {
  // Update existing row
  $id = $_GET['id'];
  $sql = "UPDATE ttep_announcement SET date='$date', title='$title',  description='$description', ttep_student_username='$st_username' WHERE id_ttep_announcement='$id' AND ttep_teacher_username='$username'";
} else {
  // Add new row
  $sql = "INSERT INTO ttep_announcement (ttep_teacher_username, ttep_student_username,  date, title,  description) VALUES ('$username', '$st_username', '$date', '$title', '$description')";
}

$result = mysqli_query($conn, $sql);
header('Location: ../my_site_announcement.php');
?>