<?php
// Start a new or resume an existing session
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: login');
  exit();
}
;


require_once 'config.php';
$username = $_SESSION['username'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();
$image_path = $row["image_path"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$email = $row["email"];
$contactnumber = $row["contact_number"];

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
   body{
    background-color: #f8f9fa!important;
    margin-top:20px;
}

.text-custom,
.navbar-custom .navbar-nav li a:hover,
.navbar-custom .navbar-nav li a:active,
.navbar-custom .navbar-nav li.active a,
.service-box .services-icon,
.price-features p i,
.faq-icon,
.social .social-icon:hover {
    color: #f6576e !important;
}

.bg-custom,
.btn-custom,
.timeline-page .timeline-item .date-label-left::after,
.timeline-page .timeline-item .duration-right::after,.back-to-top:hover {
    background-color: #08B94B;
}

.btn-custom,
.custom-form .form-control:focus,
.social .social-icon:hover,
.registration-input-box:focus {
    border-color: #08B94B;
}

.service-box .services-icon,
.price-features p i {
    background-color: rgba(246, 87, 110, 0.1);
}

.btn-custom:hover,
.btn-custom:focus,
.btn-custom:active,
.btn-custom.active,
.btn-custom.focus,
.btn-custom:active,
.btn-custom:focus,
.btn-custom:hover,
.open > .dropdown-toggle.btn-custom {
    border-color: #e45267;
    background-color: #08B94B;
}


.price-box {
    padding: 4px 5px;
}

.plan-price h1 span {
    font-size: 16px;
    color: #000;
}

.price-features p i {
    height: 20px;
    width: 20px;
    display: inline-block;
    text-align: center;
    line-height: 20px;
    font-size: 14px;
    border-radius: 50%;
    margin-right: 20px;
}
    </style>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=-1.0, shrink-to-fit=no">
    <title>Go premium - Teachers' Tribe Premium</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body class="bg-gradient-primary" >
    <div class="container"  >
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row"  >
                           
                            <div class="col-lg" >
                                
             <div class="container"  >
                    <div class="p-5" style="padding-left: 0px; padding-right= 0px">
                                    <div class="text-center" >
                                        <h4 class="text-dark mb-4">Teachers' Tribe Premium</h4>
                                    </div>
	<div class="row justify-content-center text-center" style="padding-left: 0px; padding-right= 0px">
		<div class="col-lg-12">
		    <hr>
 			<h5 class="font-weight-light">Our Pricing Plans</h5>
 			<p class="text-muted mt-4 title-subtitle mx-auto">Please select your desired plan.&nbsp;</p>
        </div>
	</div>                
	<div class="row" >
		<div class="col-lg-4">
			<div class="bg-white mt-3 price-box">
				<div class="pricing-name text-center">
					<h4 class="mb-0">Basic</h4>
				</div>
				<div class="plan-price text-center mt-4">
					<h1 class="text-custom font-weight-normal mb-0">55 <span>/Month</span></h1> <p> Thousand Tomans</p>
				</div>
				<div class="price-features mt-5">
					<p><i class="mdi mdi-check"></i>  Students:<span class="font-weight-bold"> Unlimited</span></p>
					<p><i class="mdi mdi-check"></i> Classes: <span class="font-weight-bold">Unlimited</span></p>
					
					<p><i class="mdi mdi-check"></i> Sessions: <span class="font-weight-bold">Unlimited</span></p>
					<p><i class="mdi mdi-close"></i> Journaling
: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> Community: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Reminder: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Projects: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Event: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Accounting: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> LiveBoard: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Website: <span class="font-weight-bold" style="color:red">No</span></p>

										<p><i class="mdi mdi-check"></i> Domain: <span class="font-weight-bold" style="color:red">No</span></p>

										<p><i class="mdi mdi-check"></i>Payment: <span class="font-weight-bold" style="color:red"> No</span></p>
										<p><i class="mdi mdi-check" ></i> WebDesign: <span class="font-weight-bold" style="color:red">No</span></p>
					
					


				</div>
					 <hr>
                                        <a id="amount1"  class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button" style="background-color:orange"><i></i>&nbsp; Select</a> </a>
                                        <hr>
				<div class="text-center mt-5">
					<a href="#"  class="btn btn-custom text-white">Join Now</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="bg-white mt-3 price-box">
				<div class="pricing-name text-center">
					<h4 class="mb-0">Golden</h4>
				</div>
				<div class="plan-price text-center mt-4">
									<h1 class="text-custom font-weight-normal mb-0">100 <span>/Month</span></h1> <p> Thousand Tomans</p>

				</div>
				<div class="price-features mt-5">
					<p><i class="mdi mdi-check"></i>  Students:<span class="font-weight-bold"> Unlimited</span></p>
					<p><i class="mdi mdi-check"></i> Classes: <span class="font-weight-bold">Unlimited</span></p>
					
					<p><i class="mdi mdi-check"></i> Sessions: <span class="font-weight-bold">Unlimited</span></p>
					<p><i class="mdi mdi-close"></i> Journaling
: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> Community: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Reminder: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Projects: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Event: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Accounting: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> LiveBoard: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Website: <span class="font-weight-bold" style="color:green">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Domain: <span class="font-weight-bold" style="color:green">Yes</span></p>

										<p><i class="mdi mdi-check"></i>Payment: <span class="font-weight-bold" style="color:red"> No</span></p>
										<p><i class="mdi mdi-check" ></i> WebDesign: <span class="font-weight-bold" style="color:red">No</span></p>
				</div>
					 <hr>
                                        <a  id="amount2" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button" style="background-color:orange"><i></i>&nbsp; Select</a> </a>
                                        <hr>
				<div class="text-center mt-5">
					<a href="#" class="btn btn-custom text-white">Join Now</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="bg-white mt-3 price-box">
				<div class="pricing-name text-center">
					<h4 class="mb-0">Professional</h4>
				</div>
				<div class="plan-price text-center mt-4">
									<h1 class="text-custom font-weight-normal mb-0">390 <span>/Month</span></h1> <p> Thousand Tomans</p>

				</div>
				<div class="price-features mt-5">
						<p><i class="mdi mdi-check"></i>  Students:<span class="font-weight-bold"> Unlimited</span></p>
					<p><i class="mdi mdi-check"></i> Classes: <span class="font-weight-bold">Unlimited</span></p>
					
					<p><i class="mdi mdi-check"></i> Sessions: <span class="font-weight-bold">Unlimited</span></p>
					<p><i class="mdi mdi-close"></i> Journaling
: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> Community: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Reminder: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Projects: <span class="font-weight-bold">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Event: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Accounting: <span class="font-weight-bold">Yes</span></p>
					<p><i class="mdi mdi-check"></i> LiveBoard: <span class="font-weight-bold">Yes</span></p>
										<p><i class="mdi mdi-check"></i> Website: <span class="font-weight-bold" style="color:green">Yes</span></p>

										<p><i class="mdi mdi-check"></i> Domain: <span class="font-weight-bold" style="color:green">Yes</span></p>

										<p><i class="mdi mdi-check"></i>Payment: <span class="font-weight-bold" style="color:green"> Yes</span></p>
										<p><i class="mdi mdi-check" ></i> WebDesign: <span class="font-weight-bold" style="color:green">Yes</span></p>
				</div>
				 <hr>
                                        <a id="amount3" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button" style="background-color:orange"><i></i>&nbsp; Select</a> </a>
                                        <hr>
				<div class="text-center mt-5">
					<a href="#" class="btn btn-custom text-white">Join Now</a>
				</div>
			</div>
		</div>
	</div>
</div>                  


                                <div class="p-5" style="margin-top:-100px">
                                    <div class="text-center"> <div id="plan">.</div>
                                        <h4 class="text-dark mb-4">Your information</h4>  
                                    </div>
                                  <form method="post" action="bitpay_api.php" class="user">
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="name">Name:</label>
        </div>
        <div class="col-lg-9">
            <input readonly  class="form-control form-control-user" id="name" value="<?php echo $username ?>" name="name">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="firstname">First Name:</label>
        </div>
        <div class="col-lg-9">
            <input readonly  class="form-control form-control-user" id="firstname" value="<?php echo $firstname ?>" name="firstname">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="lastname">Last Name:</label>
        </div>
        <div class="col-lg-9">
            <input readonly  class="form-control form-control-user" id="lastname" value="<?php echo $lastname ?>" name="lastname">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="email">Email:</label>
        </div>
        <div class="col-lg-9">
            <input readonly  class="form-control form-control-user" id="email" value="<?php echo $email ?>" name="email">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="contactnumber">Contact Number:</label>
        </div>
        <div class="col-lg-9">
            <input readonly  class="form-control form-control-user" id="contactnumber" value="<?php echo $contactnumber ?>" name="contactnumber">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3">
            <input class="form-control form-control-user" hidden id="api" value="17a49-ffc24-3298c-23fa4-5e3f1ae907adf82556723079b2d9" name="api">
        </div>
        <div class="col-lg-9">
            <input class="form-control form-control-user" hidden id="url" value="https://bitpay.ir/payment/gateway-send" name="url">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3">
            <input class="form-control form-control-user" hidden id="redirect" value="https://www.teacherstribe.net/web_app/paid.php" name="redirect">
        </div>
        
          <div class="row mb-3">
        <div class="col-lg-3">
            <label for="amount">Amount of payment::</label>
        </div>
        <div class="col-lg-9">
            <input type="text"   class="form-control form-control-user" id="amount" name="amount" value="Please select a plan first">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
            <div class="custom-control custom-checkbox small">
                <br> 
            </div>
        </div>
        
        <strong><div style="color:red" id="mytext">   </div> </strong>
    </div>
    <p>
            <button disabled id="mybutton" class="btn btn-primary d-block btn-user w-100" type="submit">Pay Now!</button>
     </p>  <br>
            <a href="http://www.teacherstribe.net" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i></i>  Go back to the home page</a>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
         </div>
    </div>
</form>
                                 <script>
                                     
var link1 = document.getElementById("amount1");
var mybutton = document.getElementById("mybutton");
var mytext = document.getElementById("mytext");

var div = document.getElementById("plan");

var input = document.getElementById("amount");
  var link = document.getElementById("amount2");
    var link3 = document.getElementById("amount3");

link1.addEventListener("click", function() {
    input.value = "550000";
      link1.style.backgroundColor = "green";
          mybutton.removeAttribute('disabled');

      link.style.backgroundColor = "orange";
                  link3.style.backgroundColor = "orange";
  div.textContent = "You have selected the basic plan";
  mytext.textContent= " You have selected the basic plan, and you will pay FIFTY FIVE THOUSAND TOMANS for ONE month of use."


});

var link1 = document.getElementById("amount1");
var div = document.getElementById("plan");
var mybutton = document.getElementById("mybutton");
var mytext = document.getElementById("mytext");

var link = document.getElementById("amount2");
var link3 = document.getElementById("amount3");

var input = document.getElementById("amount");

link.addEventListener("click", function() {
    input.value = "1000000";
      link.style.backgroundColor = "green";
      link1.style.backgroundColor = "orange";
            link3.style.backgroundColor = "orange";
                mybutton.removeAttribute('disabled');

  div.textContent = "You have selected the golden plan";
mytext.textContent= " You have selected the golden plan, and you will pay ONE HUNDRED THOUSAND TOMANS for ONE month of use."

});
var link1 = document.getElementById("amount1");
var div = document.getElementById("plan");


var link = document.getElementById("amount2");
var link3 = document.getElementById("amount3");
var mybutton = document.getElementById("mybutton");
var mytext = document.getElementById("mytext");
var input = document.getElementById("amount");

link3.addEventListener("click", function() {
    input.value = "3000000";
      link.style.backgroundColor = "orange";
      link1.style.backgroundColor = "orange";
      link3.style.backgroundColor = "green";
          mybutton.removeAttribute('disabled');

  div.textContent = "You have selected the professional plan";

mytext.textContent= " You have selected the professional plan, and you will pay THREE HUNDRED NINTY THOUSAND TOMANS for ONE month of use."
});


                                     
                                 </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"> 

   
 