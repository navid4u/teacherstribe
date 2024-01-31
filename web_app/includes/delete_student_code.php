<?php
require_once '../config.php';
	// Update the reminder data in the database based on the given ID
	$id = $_GET['id'];
 

	$query = "DELETE FROM ttep_student WHERE id_ttep_student='$id'";
	mysqli_query($conn, $query);
	
	
	
	// Redirect back to the reminders page
	header("Location: /web_app/student.php");
	exit();
?>