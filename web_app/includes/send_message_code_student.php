<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../config.php';
if (isset($_POST['message'])) {

  $xmessage = $_POST['message'];

  $name = $_POST['name'];
$contact = $_POST['contact'];
$sender = $name . " -message from site visitor - contact: " . $contact;
$receiver =  $_POST['username'];
    $thank = "Your message has been sent successfully.";

$message = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xmessage);


  // Insert the new status into the ttep_teacher table
  $query = "INSERT INTO ttep_messages (message, sender, receiver) VALUES ('$message', '$sender', '$receiver')";
  mysqli_query($conn, $query);

	// Redirect back to the reminders page
	header("Location: /web_app/my_site/1/cv.php?username=$receiver&thank=$thank");
	exit();
}
?>