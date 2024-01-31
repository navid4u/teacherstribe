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
 



</style>





 
  <script>
    //this is to check that one day is chosen in the checkbox
     
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
                            <p class="text-primary m-0 fw-bold"> Add, remove and edit your students and their information</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
    On this page, you can add students and their information. It is important to be accurate when entering the details to ensure a better experience. The information you provide will be stored securely and can be easily viewed and edited at any time on this page. Please make sure to double-check the information before submitting.
  </p>





      </td>
    </tr>
  </table>

                        
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table>


<p> <div style="font-size: small; color: red; text-align: center;"><?php $thanks= $_GET['thanks']; echo $thanks ?></div>
 </p>

  <table>
    <tr>
      <td >


  <div class="mb-3"><button onclick="showDiv()" class="btn btn-primary btn-sm"  type="submit"><i class="fas fa-plus-circle"></i>  Add a new student</button></div>

  <div id="myDiv">
        <div>
        <table>
    <tr>
      <td >







      <div class="card-body">
                                            <form method="post"  onclick="timeclass()" onsubmit="validateForm(event)" action="includes/add_student.php">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username" ><strong>Teacher</strong></label><input disabled class="form-control" type="text" id="username" value="<?php echo $lastname ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email"   name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="firstname"><strong>First Name</strong></label><input required class="form-control" type="text" id="firstname" name="firstname"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="lastname"><strong>Last Name</strong></label><input class="form-control" required type="text" id="lastname"   name="lastname"></div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="mobile_number"><strong>Mobile Number</strong></label><input class="form-control" type="text" id="mobile_number"   name="mobile_number"></div>
                                                    </div> <bt>

                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="purpose"><strong>Purpose</strong></label><input class="form-control" type="text" id="purpose"  name="purpose"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="books"><strong>Books</strong></label><input class="form-control" type="text" id="books"  name="books"></div>
                                                    </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="age"><strong>Age</strong></label><input class="form-control" type="text" id="age"  name="age"></div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="base_pay"><strong>Base pay</strong></label><input class="form-control" type="text" id="base_pay"  name="base_pay" placeholder="<?php echo $currency ?>"></div>
                                                    </div>



                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="needed_sessions"><strong>Needed sessions</strong></label><input class="form-control" type="text" id="needed_sessions"  name="needed_sessions"></div>
                                                    </div>

                                                    <br><div class="row">


 
                                                    <br> </div>
                                                    <div>... </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="start_date"><strong>Start date</strong></label><input class="form-control" type="date" id="start_date"    name="start_date"></div>
                                                    </div>
                                                     <div>
   
                              <div  id="error"> </div>

  </div>

  </div>
<br><div class="row">
<div class="col"> 
                                                        <div class="mb-3"><label class="form-label" for="extra_information"><strong>Extra information</strong></label><input class="form-control" type="text" id="extra_information"   name="extra_information"></div>
                                                    </div>
</div>

                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-plus"></i> Save Settings</button></div>
                                            </form>
                                        </div>
                                        </div>








        </td>
    </tr>
  </table>
        </div>





  </td>
    </tr>
  </table>


  <table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"><i class="fas fa-user-graduate"></i>  Students List</p>
                        </div>

                        <table>
    <tr>
      <td>



<?php 

$username = $_SESSION['username'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_student WHERE ttep_teacher_username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;


 


// Generate the table
echo '<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">';
echo '<table class="table my-0" id="dataTable">';
echo '<tr><th>First Name</th><th>Last Name</th><th>Actions</th></tr>';
while ($row = $result->fetch_assoc()) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $id = $row["id_ttep_student"];


    echo '<tr>';
    echo '<td>' . $firstname . '</td>';
    echo '<td>' . $lastname . '</td>';
    echo '<td>';
    echo '<a href="student_detail.php?id=' . $id . '"><i class="fas fa-edit"></i></a> <a href="includes/delete_student_code.php?id=' . $id . '"><i class="fas fa-trash"></i></a>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';

// Close the database connection
 
?>









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