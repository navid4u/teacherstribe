<?php

require_once '../config.php';

if (isset($_POST['post'])) {
  $xmessage = $_POST['message'];
  $sender = $_POST['sender'];

  $receiver =  $_POST['receiver'];

$message = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xmessage);

  // Insert the new status into the ttep_teacher table
  $query = "INSERT INTO ttep_messages (message, sender, receiver) VALUES ('$message', '$sender', '$receiver')";
  mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/social.php?thanks=The Message has been sent");
	exit();
}
?>