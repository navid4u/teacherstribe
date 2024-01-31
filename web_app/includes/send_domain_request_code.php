<?php

require_once '../config.php';

if (isset($_POST['post'])) {
  $message2 = $_POST['message'];
  $message = "domain request: " . $message2;
  $sender = $_POST['sender'];

  $receiver =  $_POST['receiver'];


  // Insert the new status into the ttep_teacher table
  $query = "INSERT INTO ttep_messages (message, sender, receiver) VALUES ('$message', '$sender', '$receiver')";
  mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/mySite.php?mes=The request has been sent. You will be notified through your contact information about the results (phone/email/messages on the portal)");
	exit();
}
?>