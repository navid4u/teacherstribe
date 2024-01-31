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
 
$xextra_information = $_POST['extra_information'];
$date = $_POST['date'];
$sessioncount = $_POST['sessioncount'];

$amount = $_POST['amount'];
   

$reason = $_POST['reason'];
$reason = implode(" ", $reason);
$extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);

 
$sql = "INSERT INTO ttep_tuition (ttep_teacher_username, id_ttep_student, amount, reason, date, extra_information, sessioncount) 
VALUES ('$ttep_teacher_username', '$student', '$amount', '$reason', '$date', '$extra_information', '$sessioncount')";

$result = mysqli_query($conn, $sql);
header('Location: ../tuition.php?thanks= The payment is added.');

?>