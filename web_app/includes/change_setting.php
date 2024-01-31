<?php
require_once '../config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$currency = $_POST['currency'];

	$query = "UPDATE ttep_teacher SET password='$password', currency='$currency' WHERE username='$username'";
	mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/setting.php?message=Your Password or your Currency has been changed. If you have changed your password, you can logout and login with your new password.");
	exit();
?>