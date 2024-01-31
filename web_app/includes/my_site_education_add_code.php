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
$xinstitute = $_POST['institute'];
$xdegree = $_POST['degree'];
$xmajor = $_POST['major'];

 
$institute = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xinstitute);

$degree = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdegree);

$major = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xmajor);



if (isset($_GET['id'])) {
  // Update existing row
  $id = $_GET['id'];
  $sql = "UPDATE ttep_education SET date='$date', institute='$institute', degree='$degree', major='$major' WHERE id_ttep_education='$id' AND ttep_teacher_username='$username'";
} else {
  // Add new row
  $sql = "INSERT INTO ttep_education (ttep_teacher_username, date, institute, degree, major) VALUES ('$username', '$date', '$institute', '$degree', '$major')";
}

$result = mysqli_query($conn, $sql);
header('Location: ../my_site_education.php?thanks=The education record was added successfully!');
?>