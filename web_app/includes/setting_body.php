<style>
  /* CSS styling for the table */
  table {
    width: 94%;
    margin: 0 auto; /* Center the table horizontally */
    border-collapse: collapse; /* Remove cell spacing */
  }

  td {
    border: none; /* Remove cell borders */
  }
     /* Hide the div initially */
    #myDiv {
      display: none;
    }
    #error {
  color: red;
  font-size: small;
}
 
.error_message {
  text-align: center;
  color: red;
  font-size: small;
}
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
     }
    
    h1 {
      text-align: center;
    }
    
    .setting {
      margin-bottom: 20px;
    }
    
    .setting label {
      display: inline-block;
      width: 200px;
      font-weight: bold;
    }
    
    .setting input[type="text"],
    .setting input[type="number"],
    .setting select {
       padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    .setting input[type="checkbox"] {
      vertical-align: middle;
    }
    
    
    
    .link {
      color: #007bff;
      text-decoration: none;
    }
    
    .link:hover {
      text-decoration: underline;
    }
  
 
  


</style>



 
 
<?php

$username = $_SESSION['username'];
 $sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$password = $row['password'];
$currency = $row['currency'];
 

?>

 

 
<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Setting </p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
      <p class="error_message"> <?php 
$message = $_GET['message'];
echo $message ?>
<p>

<div class="container">
  
<p id="line" name="line">
      Welcome to the Settings page! Here, you can customize your app experience to suit your preferences. Adjust various settings such as notifications, appearance, and account preferences. Personalize your app to make it truly yours. Take control and tailor your app settings to enhance your overall user experience.  </p>

     
    <form method="post" action="includes/change_setting.php">
      <div class="setting">
        <label for="username">Username: <br><?php echo $username ?> </label> 
        <input type="hidden" name="username" value="<?php echo $username ?>">

      
      <div class="setting">
        <label for="password">Change Password:</label>
        <input  id="password" name="password" value="<?php echo $password ?>">
      </div>
      
      <div class="setting">
        <label for="mainColor">Main Color:</label>
        <input type="color" id="mainColor" name="mainColor" value="#3C63D2">
      </div>
      
      <div class="setting">
        <label>Profile Settings:</label>
        <a href="profile" class="link">Edit Profile</a>
      </div>
      
      <div class="setting">
        <label>Premium Settings:</label>
        <a href="premium" class="link">Go premium</a>
      </div>


      <div class="setting">
        <label>Delete Account:</label>
        <a href="/delete" class="link">Delete Account</a>
      </div>
      
      <div class="setting">
        <label for="currency">Currency:</label>
        <input type="text" id="currency" name="currency" value="<?php echo $currency ?>">
          
      </div>
      

</p>
<button type="submit" name="post" class="button"> Save </button>

</form>




      </td>
    </tr>
  </table>

                      
  <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table><?php include("footer.php"); ?>





  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>