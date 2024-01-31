<?php
require_once '../config.php';

// Get the form data
$id_p = $_POST['id_p'];
 

$sessioncount = $_POST["sessioncount"];
$date = $_POST["date"];
$xextra_information = $_POST["extra_information"];
$amount = $_POST["amount"];


$extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);
 
// Build the SQL query
$sql = "UPDATE ttep_tuition SET sessioncount='$sessioncount', date='$date', amount='$amount', extra_information='$extra_information'  WHERE id_ttep_payment='$id_p'";

 
 	mysqli_query($conn, $sql);

header("Location: /web_app/tuition.php?thanks=The tuition is added successfully!");
exit();
?>