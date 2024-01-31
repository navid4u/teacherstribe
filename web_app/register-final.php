<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js">

</script>


 
<?php
include("config.php");


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


 



      move_uploaded_file($file_tmp,"images/".$new_file_name_with_ext);
      echo "";
   }else{
      print_r($errors);
   }
}
;
 

 

$email = $_GET['email'];


$username = $_GET['username'];
$firstname = $_GET['firstname'];

$contact_number= $_POST['contact_number'];

$gender = $_POST['gender'];
$sql = "UPDATE ttep_teacher SET contact_number = '$contact_number', gender= '$gender', image_path= 'images/$new_file_name_with_ext' WHERE username = '$username';";
$result = mysqli_query($conn, $sql);
 





?>
<html>
    



    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Registerion Completed!
    </title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Nunito.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    </head>
    
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/register.png&quot;);"></div>
                        </div>
    
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                <h2 class="text-dark mb-4">Thank you for completing your profile! <?php echo "$firstname!"?></h2>
                                    <h4 class="text-dark mb-4">Your profile information is saved</h4>
                                </div>
                                <br> Your username is <?php echo "$username" ?> 
                                <br> Your account is registered with this E-mail:  <?php echo "$email" ?> 
                                <br> <h4> Please proceed by going to the login page!</h4>
                        
    
                                <bt>
                                <div class="card">
      <div class="card-body">
        <h5 class="card-title">Profile</h5>
        <form method="post" enctype = "multipart/form-data"  action="register-final.php?username=<?php echo $username?>&email=<?php echo $email?>&contact_number=<?php echo $contact_number?>">
          <div class="form-group">
        
          <div class="form-group">
            <label for="picture">Picture:</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image"> 
              <div id="image_container">
   <img src="images/<?php echo($new_file_name_with_ext)?>" width="auto" height="200" ></div>
              
            </div>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="<?php echo($contact_number)?>" >
          </div>
          <button type="submit" class="btn btn-primary">Your information is saved - click to edit</button>
        </form>
      </div>
    </div>
    
    
    <br>
                           <a href="login.php">     <button class="btn btn-primary d-block btn-user w-100" type="submit" action="login.php">Go to the login page</button> </a>
    
    
    <hr><a href="http://www.teacherstribe.net" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i></i>&nbsp; Go back to the home page</a><a href="demo.php" class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i ></i>&nbsp; Watch a demo</a>
    <hr>
    
    
    
                                <div class="text-center"><a class="small" href="forgot.php">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
    
    </html>
    
    
    
    
    
    