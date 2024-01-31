


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
$sql = "SELECT * FROM ttep_announcement WHERE ttep_teacher_username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();

// Get the value of the "email" column and assign it to a variable
$ttep_student_username = $row["ttep_student_username"];
$description = $row["description"];
$date = $row["date"];
$title = $row["title"];
$all_s = $row["all_s"];
 


$sql2 = "SELECT * FROM ttep_announcement WHERE id_ttep_announcement='$id'";
$result2 = $conn->query($sql2);
if ($conn->error) {
  die("Query failed: " . $conn->error);
}
;
$row2 = $result2->fetch_assoc();


$date = $row2["date"];
$title = $row2["title"];
$description = $row2["description"];
$all = $row2["all"];
 
?>





<table class="responsive-table">
    <tr class='responsive-table'>
      <td class='responsive-table'>
  <div class="card shadow mb-5 responsive-table">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Add an announcement to your students' dashboards</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
     
      
       
      <form action="<?php echo isset($id) ? 'includes/my_site_announcement_add_code.php?id=' . $id : 'includes/my_site_announcement_add_code.php' ?>" method="post">
  <div style="display: flex; flex-wrap: wrap;" class='responsive-table'>
    <div style="flex: 1; padding: 10px;">
      <label for="institute">Title:</label><br>
      <input type="text" id="title" name="title" value='<?php echo $title ?> '><br><br>
      <label for="date">Date:</label><br>
      <input type="date" id="date" name="date" value='<?php echo $date ?> '><br><br>
    </div>
    <div style="flex: 1; padding: 10px;">
      <label for="degree">Description:</label><br>
      <input type="text" id="description" name="description" style="height:100px"  value='<?php echo $description ?> '><br><br>
 


<br><br>

<label for="st_username">Student username:</label><br>

      <select name="st_username" id="st_username">
    <?php
    // Assuming you have established a connection to your database
    // and selected the appropriate database

    // Fetch the usernames from the database table

    $query = "SELECT st_username FROM ttep_student WHERE st_username <> '' AND ttep_teacher_username = '$username'";

    $result = mysqli_query($conn, $query);

    // Loop through the query results and generate the list options
    while ($row = mysqli_fetch_assoc($result)) {
        $st_username = $row['st_username'];
        echo "<option value='$st_username'>$st_username</option>";
    }
    ?>

</select>
<br><br>



    </div>
  </div>
  <input type="submit" class="btn btn-primary py-0" value="Save">
  <a href="mySite"  class="btn btn-primary py-0" >Back to My Page content </a>

</form>



 
  <br>

  </p>
 	 
  <?php
$sql = "SELECT * FROM ttep_announcement WHERE ttep_teacher_username='$username'";
$result = $conn->query($sql);


// Display the data in a table
if ($result->num_rows > 0) {
    echo "<table class='responsive-table'>";
    echo "<tr><th>List:</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["title"] . "</td><td>" . $row["date"] . "</td><td>" . $row["description"] . "</td><td>" . $row["all"] . " " . $ttep_student_username . "</td><td><a href='my_site_announcement.php?id=" . $row["id_ttep_announcement"] . "'><i class='fas fa-edit'></i></a> <a href='includes/my_site_announcement_delete_code.php?id=" . $row["id_ttep_announcement"] . "'><i class='fas fa-trash-alt'></i></a></td></tr>";    }
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