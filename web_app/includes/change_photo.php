<?php
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: login.php');
  exit();
}
;
 
 
require_once '../config.php';
$username = $_SESSION['username'];

 
if(isset($_FILES['image'])){
   $errors= array();
   
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp = $_FILES['image']['tmp_name'];
   $file_type = $_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   
   $extensions= array("jpeg","jpg","png");
   
   if(in_array($file_ext,$extensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }
   
   if($file_size > 2097152) {
      $errors[]='File size must be excately 2 MB';
   }
   
   if(empty($errors)==true) {
      $new_file_name = rand(100000, 999999);
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $new_file_name_with_ext = $new_file_name . '.' . $file_ext;


 



      move_uploaded_file($file_tmp,"../images/".$new_file_name_with_ext);
      echo "";

   }else{
      print_r($errors);
   }
}
;
$sql = "UPDATE ttep_teacher SET image_path= 'images/$new_file_name_with_ext' WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
header('Location: ../profile.php?thanks=The photo was uploaded and changed!');
?>