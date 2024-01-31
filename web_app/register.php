<!DOCTYPE html>
<html lang="en">

<head>
<style>
input:invalid {
  border: 1px dashed burlywood;
}


    </style>
<script>






      function validate() {
        var num = document.getElementById("age").value;
        if (isNaN(num)) {
          alert("Please enter a valid age");
          return false;
        }
      };

      

      var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('password_repeat').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    document.getElementById('but').disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    document.getElementById('but').disabled = true;
  }
}


    </script>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Teachers' Tribe Exclusive Portal
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
                    <div class="col-lg-6 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/register.png&quot;);"></div>
                    </div>

                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                            <h2 class="text-dark mb-4">Teachers' Tribe Exclusive Portal</h2>
                                <h4 class="text-dark mb-4">Create an Account as a Teacher!</h4>
                            </div>
                            <form class="user" method="post"  action="check-username.php" >
                            <div class="row mb-3">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text"   minlength="4"  maxlength="20" id="username" placeholder="* User name (required)" name="username" required></div> <span id="availability-message"></span><br>
                                   
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input onkeyup='check();' class="form-control form-control-user"  minlength="3"  type="password" id="password" placeholder="* Password (required)" name="password" required></div>
                                    <div class="col-sm-6"><input onkeyup='check();' class="form-control form-control-user" minlength="3" type="password" id="password_repeat" placeholder="* Repeat Password (required)" name="password_repeat" required> <span id='message'></span> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"  minlength="3"  maxlength="20" type="text" id="firstname" placeholder="* First Name (required)" name="firstname" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="lastname"  minlength="3"  maxlength="45" placeholder="* Last Name  (required)" name="lastname" required></div>
                           
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="age"  minlength="2"  maxlength="2" placeholder="* Your age (required)" name="age" required> </div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="website" placeholder="Your website" name="website"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3"><input class="form-control form-control-user" type="email" id="email"  minlength="5"  maxlength="45" placeholder="* Email (required)" name="email" required></div>
                                    <div class="col-sm-6"> </div>
                                    <div class="col-sm-6"> 
                     
                 
              
          
                                 
                                   
                                </div>
                                <br> <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="address_country" placeholder="Country" name="address_country"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="city" placeholder="City" name="city"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" maxlength="400" id="address_address" placeholder="Address" name="address_address"></div>
                                    
                                </div>


                                <div class="mb-3"><input class="form-control form-control-user" type="text" id="signiture" aria-describedby="emailHelp" placeholder="Your signiture (brief info about you). Here you can introduce yourself and let others know you in few words." name="signiture" ></div>
                                <br>  
                                
                                
                                
                                <br>  
                                
                                <div class="row mb-3"> 
                                <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="teachlang" required>
  <option value="">What language do you teach?</option>
  <option value="English">English</option>
  <option value="French">French</option>
  <option value="German">German</option>
  <option value="Persian">Persian</option> 

  <option value="Korean">Korean</option> 

  <option value="Arabic">Arabic</option> 

  <option value="Japanese">Japanese</option> 
  <option value="Manderian">Manderian</option> 

  <option value="Spanish">Spanish</option> 

  <option value="Doutch">Doutch</option> 
  <option value="Turkish">Turkish</option> 
</select>
</div>

<div class="col-sm-6 mb-3 mb-sm-0">
<select name="nativelang" required>
  <option value="">What is your mother tongue?</option>
  <option value="English">English</option>
  <option value="French">French</option>
  <option value="German">German</option>
  <option value="Persian">Persian</option> 

  <option value="Korean">Korean</option> 

  <option value="Arabic">Arabic</option> 

  <option value="Japanese">Japanese</option> 
  <option value="Manderian">Manderian</option> 

  <option value="Spanish">Spanish</option> 

  <option value="Doutch">Doutch</option> 
  <option value="Turkish">Turkish</option> 
</select>
</div>
</div>
                                
                                
                                <h5> Specify your area of expertise </h5>  
                                    <ul>
                                    <label> <input type="checkbox"        name="expertise[]" value="Exam preperation" > Exam preperation</label> 
                                    <label> <input type="checkbox"      name="expertise[]" value="General"> General</label> 
                                    <label> <input type="checkbox"     name="expertise[]" value="Writing"> Writing</label> 
                                    <label> <input type="checkbox"      name="expertise[]" value="Speaking"> Speaking</label> 
                                  <label> <input type="checkbox"       name="expertise[]" value="Teacher Training"> Teacher Training</label> 
                                <label> <input type="checkbox"       name="expertise[]" value="Reading"> Reading</label> 
                                <label> <input type="checkbox"    name="expertise[]" value="Listening"> Listening</label> 
                                <label> <input type="checkbox"   name="expertise[]" value="Specific purposes"> Specific purposes</label> 
                                <label> <input type="checkbox"  checked  name="expertise[]"  value="Specific purposes" required> I want to register as a Teacher and I confirm that I will not abuse nor misuse the information I acquire on this application.</label> 
</ul> 


                                    </div> 
                                
                                
                                
                                <button id="but" name="but" class="btn btn-primary d-block btn-user w-100" type="submit"  >Register Account</button>


                                <hr><a href="http://www.teacherstribe.net" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i></i>&nbsp; Go back to the home page</a><a href="demo.php" class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i ></i>&nbsp; Watch a demo</a>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot.php">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>