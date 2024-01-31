<?php

require_once '../config.php';

if (isset($_POST['post'])) {
  $xstatus = $_POST['status'];
  $username = $_POST['username'];
$status = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xstatus);

  // Insert the new status into the ttep_teacher table
  $query = "UPDATE ttep_teacher SET status='$status' WHERE username='$username'";
  mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/social.php?thanks=Your status is updated!");
	exit();
}
?>