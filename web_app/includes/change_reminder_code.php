<?php
require_once '../config.php';

	// Update the reminder data in the database based on the given ID
	$id = $_POST['id'];
	$xtitle = $_POST['title'];
	$date = $_POST['date'];
	$xdetail = $_POST['detail'];
$detail = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdetail);
$title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xtitle);


	$query = "UPDATE ttep_reminder SET title='$title', date='$date', detail='$detail' WHERE id_ttep_reminder='$id'";
	mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/reminder.php?thanks=The information is successfully updated!");
	exit();
?>