<?php
require_once '../config.php';
$id_p = $_POST['id_p'];
$xtitle = $_POST['title'];
$xdetail = $_POST['detail'];
$progress = intval($_POST['progress']);
 $xrequired = $_POST['required'];
 $xextra_information = $_POST['extra_information'];
 
$title = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xtitle);
$detail = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xdetail);
$extra_information = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xextra_information);
$required = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xrequired);

// Build the SQL query
$sql = "UPDATE ttep_project SET title='$title', detail='$detail', required='$required', extra_information='$extra_information', progress=$progress WHERE id_ttep_projects= '$id_p'";

 	mysqli_query($conn, $sql);

 
header("Location: /web_app/project.php?thanks=The project is updated!");
exit();
?>