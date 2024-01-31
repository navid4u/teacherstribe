<?php

require_once 'conn.php';
 
  
if (isset($_POST['message'])) {
  $xmessage = $_POST['message'];
  $senderx = $_POST['sender'];
  $email = $_POST['email'];
  $sender = $senderx. " contact: " .$email; 

  $receiver =  "navid";

$message = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xmessage);

   $query = "INSERT INTO ttep_messages (message, sender, receiver) VALUES ('$message', '$sender', '$receiver')";
  mysqli_query($conn, $query);

}
?>

<h4 style="color: red"> Message sent! Thank you very much. We will be in contact soon. </h4>