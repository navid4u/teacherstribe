<?php
require_once '../config.php';
 

	// Update the reminder data in the database based on the given ID
	$id = $_GET['id'];
 

	$query = "DELETE FROM ttep_class_time WHERE id_ttep_class_time='$id'";
	mysqli_query($conn, $query);
	
	
	
	// Redirect back to the reminders page
	header("Location: /web_app/classes.php?thanks=The class is successfully deleted!");
	exit();
?>