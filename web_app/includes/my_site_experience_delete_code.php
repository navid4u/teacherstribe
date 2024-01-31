<?php
require_once '../config.php';


	// Update the reminder data in the database based on the given ID
	$id = $_GET['id'];
 

	$query = "DELETE FROM ttep_experience WHERE id_ttep_experience='$id'";
	mysqli_query($conn, $query);
	
	
	
	// Redirect back to the reminders page
	header("Location: /web_app/my_site_experience.php?thanks=The experience record was deleted successfully!");
	exit();
?>