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
$sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();

// Get the value of the "email" column and assign it to a variable
 
$xabout_me = $_POST["about_me"];
$xinterest_1 = $_POST["interest_1"];
$xinterest_2 = $_POST["interest_2"];
$xskill_1 = $_POST["skill_1"];
$xinstagram = $_POST["instagram"];
$xsitetitle = $_POST["sitetitle"];

$twitter = $_POST["twitter"];

$facebook = $_POST["facebook"];
$linkedin = $_POST["linkedin"];

$xskill_2 = $_POST["skill_2"];
$xskill_3 = $_POST["skill_3"];
$born = $_POST["born"];
$xhobby = $_POST["hobby"];


$about_me = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xabout_me);
$interest_1 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xinterest_1);
$interest_2 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xinterest_2);
$skill_1 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xskill_1);
$instagram = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xinstagram);
$sitetitle = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xsitetitle);
$skill_2 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xskill_2);
$skill_3 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xskill_3);
$hobby = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xhobby);
 
 

 
$sql = "UPDATE   ttep_teacher  SET sitetitle='$sitetitle', hobby='$hobby', born='$born', skill_3='$skill_3', skill_2='$skill_2', linkedin='$linkedin', facebook='$facebook', twitter='$twitter', instagram='$instagram', skill_1='$skill_1', interest_2='$interest_2', interest_1='$interest_1',about_me='$about_me' WHERE username='$username'" ; 
 
$result = mysqli_query($conn, $sql);
header('Location: ../mySite.php');

?>