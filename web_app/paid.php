<?php
// Start a new or resume an existing session
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
    padding: 40px 50px;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Go premium - Thanks for joining us!</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                           
                            <div class="col-lg">
                                
             <div class="container">
                    <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Teachers' Tribe Premium</h4>  
                                    </div>
<p>
    <?php 
    include ('conn.php');
	$name= $_SESSION['username'];
	
	$username = $name; 
 
	function send($url,$api,$amount,$redirect,$name,$email){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&name=$name&email=$email");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    };
    function get($url,$api,$trans_id,$id_get){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&id_get=$id_get&trans_id=$trans_id&json=1");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    };
 
  
	$url = 'https://bitpay.ir/payment/gateway-result-second'; 
	$api = '17a49-ffc24-3298c-23fa4-5e3f1ae907adf82556723079b2d9';
	$trans_id = $_GET['trans_id']; 
	$id_get = $_GET['id_get'];
	$result = get($url,$api,$trans_id,$id_get); 
 
	
	$parseDecode = json_decode($result);
	
	if($parseDecode->status == 1)
	{
		//true
		
		//mablagh ersali
		echo $parseDecode->amount;
		
		//factore ersali (ekhtiari)
		echo $parseDecode->factorId;
		
		//shomare kart pardakht konanade
		echo $parseDecode->cardNum;
		
	}
	else
	{
		//false
	};
	
	
	if(isset($trans_id) && isset($id_get) && isset($username) && !empty($trans_id) && !empty($id_get) && !empty($username)) {
    // Variables are defined and not null
    // Execute your SQL query
    $sql = "INSERT INTO ttep_premium (trans_id, id_get, username) VALUES ('$trans_id', '$id_get', '$username')";
    $result = mysqli_query($conn, $sql);
$currentDate = date('Y-m-d');

$sql2 = "UPDATE ttep_teacher SET create_date = '$currentDate' WHERE username = '$username'";
$result2 = mysqli_query($conn, $sql2);


    echo "<strong><br>The transaction is done. </strong> <p></p>";
} else {
    // Variables are null or not defined
    // Show error message
    echo "<strong>Error: Variables are null or not defined.</strong> <p></p>";
}
?>
 
    
    
    Dear user <?php echo $name ?>, </p> <p>  
    Thanks for purchasing the plan. <p> 
    Your transaction id is : <?php echo $trans_id ?></p>
    <div> 
    Your payment id is : <?php echo $id_get ?>
    
    </div>
    
    
</p>
 
<div>
    
    Now your account is recharged for more 30 days.  
</div><p> 

<strong> Please login in your account to enter your dashboard!</strong>
</p>
  <hr>
                             
               <?php include ('login.php'); ?>                         
                                        
                          

                               
                                  
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"> 

   
 