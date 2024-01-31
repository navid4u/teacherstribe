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

.card-body {
  min-height: 200px; /* Replace 200px with your desired minimum height */
}
#line {
    
    line-height: 2;
  
}


</style>





 
  <script>
    //this is to check that one day is chosen in the checkbox
    function validateForm(event) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var checkedCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checkedCount++;
    }
  }

  if (checkedCount === 0) {
    event.preventDefault(); // Prevent form submission if no checkbox is checked
    var errorDiv = document.getElementById('error');
    errorDiv.textContent = "Please select at least one of the days, or choose OTHERS.";  }
};
    function showDiv() {
      var div = document.getElementById('myDiv');
      div.style.display = "block";
    };

    //this is to get the start and finish time and put it in one string
    function timeclass() {
      var startTime = document.getElementById("start-time").value;
      var endTime = document.getElementById("end-time").value;
      var time = startTime + " to " + endTime;
      document.getElementById("time").value = time;
      document.getElementById("class-form").submit();
    }
  </script>

<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">  <i class="far fa-calendar-alt"></i> Weekly schedule</p>
                        </div>

                        <table>
    <tr>
      <td>



 
<div  id="line" name="line">
      <p >
      On this page, you can see the classes you have scheduled for the week, along with their exact times. It provides a comprehensive overview of your weekly timetable, allowing you to plan your schedule effectively.
     
</p>
<br> 
<strong> Add a class to the week </strong> 
<br>
<form method="post" action="includes/add_class_time.php" >
<?php
// Assuming you have a database connection established
 
// Fetch the student names from the database
$query = "SELECT CONCAT(firstname, ' ', lastname) AS fullname FROM ttep_student WHERE ttep_teacher_username = '$username'";
$result = mysqli_query($conn, $query);

// Generate the options for the select element
$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $fullname = $row['fullname'];
    $options .= "<option value='$fullname'>$fullname</option>";
}
?> 


 <table>
  <tr>
    <td><label for="student">Student:</label></td>
    <td>
      <select id="student" name="student">
        <?php echo $options; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><label for="day">Day of the Week:</label></td>
    <td>
      <select id="day" name="day">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><label for="fromTime">From:</label></td>
    <td><input type="time" id="fromtime" name="fromtime"></td>
  </tr>
  <tr>
    <td><label for="toTime">To:</label></td>
    <td><input type="time" id="totime" name="totime"></td>
  </tr>
  <tr>
    <td colspan="2">
      <button class="btn btn-primary btn-sm" type="submit">Add to my schedule</button>
      <p> </p>
</form>
    </td>
  </tr>
</table>
</div>



      </td>
    </tr>
  </table>
  </table>


<table>
    <tr>
      <td>
        <!-- Content of your cell goes here -->
        <!-- For example: -->
      

<div class="col">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <p class="m-0">Monday classes</p>
                                            <p class="text-white-50 small m-0"> 



                                            <?php
$sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Monday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>



                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Sunday classes</p>
                                            <p class="text-white-50 small m-0">
                                                

                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Sunday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-info shadow">
                                        <div class="card-body">
                                            <p class="m-0">Tuesday classes</p>
                                            <p class="text-white-50 small m-0">
                                                
                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Tuesday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>



                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-warning shadow">
                                        <div class="card-body">
                                            <p class="m-0">Wednesday classes</p>
                                            <p class="text-white-50 small m-0">
                                                
                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Wednesday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-danger shadow">
                                        <div class="card-body">
                                            <p class="m-0">Thursday classes</p>
                                            <p class="text-white-50 small m-0">
                                                

                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Thursday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="card-body">
                                            <p class="m-0">Friday classes</p>
                                            <p class="text-white-50 small m-0">
                                                

                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Friday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <p class="m-0">Saturday classes</p>
                                            <p class="text-white-50 small m-0">
                                                

                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Saturday%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="card-body">
                                            <p class="m-0">Other classes</p>
                                            <p class="text-white-50 small m-0">
                                                

                                            <?php 
                                            $sql = "SELECT id_ttep_class_time, student, ttep_day_time FROM ttep_class_time WHERE ttep_day_time LIKE '%Other%' AND ttep_teacher_username = '$username'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the rows
    while ($row = $result->fetch_assoc()) {
        echo '<a href="includes/delete_class_time_code.php?id=' . $row["id_ttep_class_time"] . '"><i class="fas fa-trash-alt" style="color: white;">      &nbsp; &nbsp; </i></a>' . $row["student"] . $row["ttep_day_time"] . ' <br>';
    }
} else {
    echo "No classes";
}
?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
      </td>
    </tr>
  </table>
 <?php include("footer.php"); ?>

 <script src="/web_app/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/web_app/assets/js/bs-init.js"></script>
    <script src="/web_app/assets/js/theme.js"></script>
</body>