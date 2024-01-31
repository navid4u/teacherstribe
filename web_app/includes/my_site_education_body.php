


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
 
		td, th {
			padding: 10px;
			text-align: left;
 		}
		.label {
			font-weight: bold;
		}
		textarea, input[type="text"], input[type="email"], input[type="number"], input[type="tel"] {
			width: 85%;
		}
    img {
			display: inline-block;
			margin-right: 10px;
      margin-top:  20px;
      margin-bottom:  20px;


			width: 400px;
			height: 250px;
			object-fit: cover;
 		}	
    label[for="activate"] {
			font-weight: bold;
			text-decoration: underline;
			color: blue;
			cursor: pointer;
		}
	 
 @media (max-width: 600px) {
        /* Apply styles for mobile devices */
        .responsive-table td {
            display: block;
            width: 100%;
            padding: 5px ;
        }
        .responsive-table label {
            display: inline-block;
            width: 100%;
        }
        .responsive-table input {
            display: inline-block;
            width: 80%;
            margin-bottom: 10px;
        }
    }

</style>

<?php
$id = $_GET['id']; 
$username = $_SESSION['username'];
$sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();

// Get the value of the "email" column and assign it to a variable
$email = $row["email"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$image_path = $row["image_path"];
$city = $row["city"];
$address_country = $row["address_country"];
$address_address = $row["address_address"];
$duration = $row["duration"];
$sitetitle = $row["sitetitle"];

$signiture = $row["signiture"];
$contact_number = $row["contact_number"];
$teachlang = $row["teachlang"];
$expertise = $row["expertise"];
$about_me = $row["about_me"];
$interest_1 = $row["interest_1"];
$interest_2 = $row["interest_2"];
$skill_1 = $row["skill_1"];
$instagram = $row["instagram"];

$twitter = $row["twitter"];

$facebook = $row["facebook"];
$linkedin = $row["linkedin"];

$skill_2 = $row["skill_2"];
$skill_3 = $row["skill_3"];
$born = $row["born"];
$hobby = $row["hobby"];


$sql2 = "SELECT institute, date, degree, major FROM ttep_education WHERE id_ttep_education='$id'";
$result2 = $conn->query($sql2);
if ($conn->error) {
  die("Query failed: " . $conn->error);
}
;
$row2 = $result2->fetch_assoc();


$date = $row2["date"];
$institute = $row2["institute"];
$degree = $row2["degree"];
$major = $row2["major"];
 
?>





<table  class="responsive-table">
    <tr class="responsive-table">
      <td class="responsive-table">
  <div class="card shadow mb-5 responsive-table">
                        <div class="card-header py-3 responsive-table">
                            <p class="text-primary m-0 fw-bold responsive-table" > Add an academic item to your resume</p>
                        </div>

                        <table class="responsive-table">
    <tr>
      <td>



 

      <p id="line" name="line">
     
      
       
      <form action="<?php echo isset($id) ? 'includes/my_site_education_add_code.php?id=' . $id : 'includes/my_site_education_add_code.php' ?>" method="post">
  <div class="responsive-table" style="display: flex; flex-wrap: wrap;">
    <div  class="responsive-table" style="flex: 1; padding: 10px;">
      <label for="institute">Institute:</label><br>
      <input type="text" id="institute" name="institute" value='<?php echo $institute ?> '><br><br>
      <label for="date">Date:</label><br>
      <input type="date" id="date" name="date" value='<?php echo $date ?> '><br><br>
    </div>
    <div style="flex: 1; padding: 10px;">
      <label for="degree">Degree:</label><br>
      <input type="text" id="degree" name="degree" value='<?php echo $degree ?> '><br><br>
      <label for="major">Major:</label><br>
      <input type="text" id="major" name="major" value='<?php echo $major ?> '><br><br>
    </div>
  </div>
  <input type="submit" class="btn btn-primary py-0" value="Save">
  <a href="mySite"  class="btn btn-primary py-0" >Back to My Page content </a>

</form>



 
  <br>

  </p>
  <?php
$sql = "SELECT * FROM ttep_education WHERE ttep_teacher_username='$username'";
$result = $conn->query($sql);
// Display the data in a table
if ($result->num_rows > 0) {
    echo "<table class='responsive-table'>";
    echo "<tr><th>Info</th> ";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["institute"] . "</td><td>" . $row["date"] . "</td><td>" . $row["degree"] . "</td><td>" . $row["major"] . "</td><td><a href='my_site_education.php?id=" . $row["id_ttep_education"] . "'><i class='fas fa-edit'></i></a> <a href='includes/my_site_education_delete_code.php?id=" . $row["id_ttep_education"] . "'><i class='fas fa-trash-alt'></i></a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No results";
}
?>


      </td>
    </tr>
  </table>

                        
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table>

 
                </div>
            </div>
            </td>
    </tr>
  </table>

  </div>
  
  
  
  
  <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>