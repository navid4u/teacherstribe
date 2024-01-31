<?php
require_once '../config.php';

 	// Update the reminder data in the database based on the given ID
	$id_p = $_GET['id_p'];
 

	$query = "DELETE FROM ttep_tuition WHERE id_ttep_payment='$id_p'";
	mysqli_query($conn, $query);
	
	
	
	// Redirect back to the reminders page
	header("Location: /web_app/tuition.php?thanks=The tuition is removed successfully!");
	exit();
?>