<?php
// Start a new or resume an existing session
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: /web_app/login.php');
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

// Get the value of the "email" column and assign it to a variable
$email = $row["email"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$image_path = $row["image_path"];
$city = $row["city"];
$address_country = $row["address_country"];
$address_address = $row["address_address"];

$signiture = $row["signiture"];
$contact_number = $row["contact_number"];


?>
<!DOCTYPE html>
<html lang="en">

 
 
<body id="page-top">
    
    <div id="wrapper">
       <?php include("includes/nav.php") ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <?php include("includes/top_nav.php") ?>
<?php
        include("includes/conn.php");
        include("includes/head.php");
        include("includes/profile_body.php");

        ?>
 
 
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
  
</html>
 