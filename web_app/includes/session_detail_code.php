<?php
require_once '../config.php';

 
$student = $_POST["id_ttep_student"];

 $time = $_POST["time"];
 $xlocation = $_POST["location"];
 $date = $_POST["date"];

 $xassignment = $_POST["assignment"];
 $xextra_information = $_POST["extra_information"];
 
 
 
 $location = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xlocation);
  $extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);
  $assignment = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xassignment);
 
 

// Build the SQL query
$sql = "UPDATE ttep_session SET time='$time', location='$location', date='$date', assignment='$assignment', extra_information='$extra_information' WHERE id_ttep_student= '$student'";

	mysqli_query($conn, $sql);
	
	
// Close the database connection
mysqli_close($conn);
header("Location: /web_app/session.php?thanks= The data is updated successfully!");
exit();
?>