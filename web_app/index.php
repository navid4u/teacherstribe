<?php
// Start a new or resume an existing session
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: login');
  exit();
}


?><!DOCTYPE html>
<html lang="en">

 
<body id="page-top">
    
    <div id="wrapper">
       <?php 
         include("config.php");
       include("includes/nav.php") ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <?php include("includes/top_nav.php") ?>
<?php
      
        include("includes/head.php");?>
        <div id="content">
          <?php
        include("includes/main_body.php");?>
        </div>




 </html>