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


require_once 'config.php';
$username = $_SESSION['username'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();
$image_path = $row["image_path"];
$firstname = $row["firstname"];
$username = $row["username"];

$lastname = $row["lastname"];
$expertise = $row["expertise"];
$nativelang = $row["nativelang"];
$teachlang = $row["teachlang"];
$contact_number = $row["contact_number"];
$email = $row["email"];
$status = $row["status"];



?>
 
 <!DOCTYPE html>
<html lang="en">

<body id="page-top">
    
    <div id="wrapper">
       <?php 
       
        

       include("includes/nav.php") ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <?php include("includes/top_nav.php") ?>
<?php
        include("includes/conn.php");
        include("includes/head.php");
        include("includes/social_body.php");
        ?>
 
 
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
     
 </html>