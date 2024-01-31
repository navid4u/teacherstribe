<?php
require_once '../config.php';
 
	// Update the reminder data in the database based on the given ID
	$id_s = $_GET['id_s'];
 

	$query = "DELETE FROM ttep_session WHERE id_ttep_session='$id_s'";
	mysqli_query($conn, $query);
	
	
	
	// Redirect back to the reminders page
	header("Location: /web_app/session.php?thanks=The session is deleted successfully!");
	exit();
?>