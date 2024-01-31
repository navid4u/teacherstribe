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





$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$mobile_number = $_POST['mobile_number'];
$xpurpose = $_POST['purpose'];
$xextra_information = $_POST['extra_information'];
$xbooks = $_POST['books'];
 $start_date = $_POST['start_date'];
$needed_sessions = $_POST['needed_sessions'];
 
  
 $base_pay = $_POST['base_pay'];
$age = $_POST['age'];
 
 
 
  $extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);

 $books = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xbooks);
$purpose = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xpurpose);



$sql = "INSERT INTO ttep_student (ttep_teacher_username, age, firstname, lastname, email, mobile_number, purpose, extra_information, books, start_date, needed_sessions, base_pay) 
VALUES ('$ttep_teacher_username', '$age', '$firstname', '$lastname', '$email', '$mobile_number', '$purpose', '$extra_information', '$books', '$start_date', '$needed_sessions', '$base_pay')";

$result = mysqli_query($conn, $sql);
header('Location: ../student.php?thanks=A new student is added!');

?>