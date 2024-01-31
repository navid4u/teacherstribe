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
$xsubtitle = $_POST['subtitle'];
$xdescription = $_POST['description'];


$description = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdescription);

$subtitle = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xsubtitle);

$title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xtitle);

if (isset($_GET['id'])) {
  // Update existing row
  $id = $_GET['id'];
  $sql = "UPDATE ttep_experience SET date='$date', title='$title', subtitle='$subtitle', description='$description' WHERE id_ttep_experience='$id' AND ttep_teacher_username='$username'";
} else {
  // Add new row
  $sql = "INSERT INTO ttep_experience (ttep_teacher_username, date, title, subtitle, description) VALUES ('$username', '$date', '$title', '$subtitle', '$description')";
}

$result = mysqli_query($conn, $sql);
header('Location: ../my_site_experience.php?thanks=The education record was added successfully');
?>