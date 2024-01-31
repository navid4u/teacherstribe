<?php
require_once '../config.php';

// Get the form data
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$time = $_POST['time'];
$xpurpose = $_POST['purpose'];
$age = $_POST['age'];
$needed_session = $_POST['needed_session'];
$xbooks = $_POST['books'];
$base_pay = $_POST['base_pay'];
$day = $_POST['day'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];
$st_username = $_POST['st_username'];
$st_password = $_POST['st_password'];

$link1 = $_POST['link1'];
$link2 = $_POST['link2'];
$link3 = $_POST['link3'];
$link4 = $_POST['link4'];

$xfocus1 = $_POST['focus1'];
$xfocus2 = $_POST['focus2'];
$xfocus3 = $_POST['focus3'];

$xmaterial = $_POST['material'];

$focus1 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xfocus1);
$focus2 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xfocus1);
$focus3 = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xfocus1);
$material = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xmaterial);
$books = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xbooks);
$purpose = preg_replace('/[^a-zA-Z0-9\s-]/', '', $xpurpose);

 

// Build the SQL query
$checkUsernameQuery = "SELECT id_ttep_student FROM ttep_student WHERE st_username = '$st_username'";
$result = mysqli_query($conn, $checkUsernameQuery);

// Check if any rows were found
if(mysqli_num_rows($result) > 0) {
    // Username already exists, display error message and stop execution
    header("Location: /web_app/student.php?thanks=The username is existing, please change it and submit the form again");
    exit;
}

// Username doesn't exist, proceed with the UPDATE query
$sql = "UPDATE ttep_student SET link1='$link1', link2='$link2', link3='$link3', link4='$link4', focus1='$focus1',focus2='$focus2',focus3='$focus3',material='$material',  st_username='$st_username', st_password='$st_password', firstname='$firstname', lastname='$lastname', time='$time', purpose='$purpose', age='$age', needed_sessions='$needed_session', books='$books', base_pay='$base_pay', day='$day', mobile_number='$mobile_number', email='$email' WHERE id_ttep_student=$id";

mysqli_query($conn, $sql);

// Close the database connection
header("Location: /web_app/student.php?thanks=The information is successfully updated!");
exit();
?>