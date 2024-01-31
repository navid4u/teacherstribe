<?php
include("config.php");
$username = $_POST['username'];

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];
$age = $_POST['age'];
$website = $_POST['website'];
$email = $_POST['email'];
$temp = "";

$expertise2 = $_POST['expertise'];
$expertise = implode(" ", $expertise2);
 
$address_country = $_POST['address_country'];
$city = $_POST['city'];
$address_address = $_POST['address_address'];
$signiture = $_POST['signiture'];
$teachlang = $_POST['teachlang'];
$nativelang = $_POST['nativelang'];

$password = $_POST['password'];
$contact_number = $_POST['contact_number'];


$sql = "INSERT INTO ttep_teacher (username, firstname, lastname, age, website, email, expertise, address_country, city, address_address, signiture, password, nativelang, teachlang) VALUES ( '$username', '$firstname', '$lastname', '$age', '$website', '$email', '$expertise', '$address_country', '$city', '$address_address', '$signiture', '$password', '$teachlang', '$nativelang')";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


;

 
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
                            <h2 class="text-dark mb-4">Thank you for registration <?php echo "$firstname $lastname!"?></h2>
                                <h4 class="text-dark mb-4">You have just created an account on Teachers Tribe Portal</h4>
                            </div>
                            <br> Your username is <?php echo "$username" ?> 
                            <br> Your account is registered with this E-mail:  <?php echo "$email" ?> 
                            <br> <h4> Please first complete your profile!</h4>
                    

                            <bt>
                            <div class="card">
  <div class="card-body">
    <h5 class="card-title">Profile</h5>
    <form method="post" enctype = "multipart/form-data"  action="register-final.php?username=<?php echo $username?>&email=<?php echo $email?>&firstname=<?php echo $firstname?>">
      <div class="form-group">
        <label>Gender:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
          <label class="form-check-label" for="male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="female">
          <label class="form-check-label" for="female">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="other" value="other">
          <label class="form-check-label" for="other">
            Other
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="picture">Picture:</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image">
          <label class="custom-file-label" for="picture">Choose file</label>
        </div>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter phone number">
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>


<br>
                           <a href="login.php"> <button class="btn btn-primary d-block btn-user w-100" type="submit">Go to the login page</button> </a>


<hr><a href="http://www.teacherstribe.net" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i></i>&nbsp; Go back to the home page</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i ></i>&nbsp; Watch a demo</a>
<hr>



                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
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
 
</html>





