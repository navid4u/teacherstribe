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
                            <p class="text-primary m-0 fw-bold"> Add, remove and edit the payments that you have got from different students of yours</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
    On this page, you can add payments that you have held and their information. It is important to be accurate when entering the details to ensure a better experience. 
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



 <div style="font-size: small; color: red; text-align: center;"><?php $thanks= $_GET['thanks']; echo $thanks ?></div>
 </p>
  <table>
    <tr>
      <td >


  <div class="mb-3"><button onclick="showDiv()" class="btn btn-primary btn-sm"  type="submit"><i class="fas fa-plus-circle"></i>  Add a new payment</button></div>

  <div id="myDiv">
        <div>
            
<p>
        <table>
    <tr>
      <td >







      <div class="card-body">
                                            <form method="post"    action="includes/add_tuition.php">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username" ><strong>Teacher</strong></label><input disabled class="form-control" type="text" id="username" value="<?php echo $lastname ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="student"><strong>Student</strong></label>
                                                      
                                                      
                                                   <br>   
            
                                                        <?php
// Retrieve student names and IDs from the database
$query = "SELECT id_ttep_student, firstname, lastname FROM ttep_student WHERE ttep_teacher_username = '$username'";
$result = $conn->query($query);

// Generate HTML listbox
echo '<select name="student" id="student">  ';
while ($row = $result->fetch_assoc()) {
    $id = $row['id_ttep_student'];
    $fullname = $row['firstname'] . ' ' . $row['lastname'];
    echo '<option value="' . $id . '">' . $fullname . '</option>';
}
echo '</select>';
 
?>
                                                                
                                                      
                                                      
                                                      
                                                      </div>
                                                    </div>
                                                </div>
                                             
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="amount"><strong>Amount of payment in <?php echo $currency ?> </strong></label><input class="form-control" type="text" id="amount"   placeholder="<?php echo $currency ?>" name="amount" required></div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="sessioncount"><strong>How many sessions is it for?</strong></label><input class="form-control" type="text" id="sessioncount"   name="sessioncount" required></div>
                                                    </div> <bt>

                                                   

 
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="date"><strong>Date</strong></label><input class="form-control" type="date" id="date"    name="date"></div>
                                                    </div>
                                                     <div>
  <h5>Got paid for ...</h5>  
                              <ul>
                                    <label> <input type="radio"        name="reason[]" value="Class_sessions" checked > Class sessions </label> 
                                    <label> <input type="radio"      name="reason[]" value="Writing_correction"> Writing correction </label> 
                                    <label> <input type="radio"     name="reason[]" value="Translation"> Translation </label> 
                                    <label> <input type="radio"      name="reason[]" value="Editing"> Editing </label> 
                                  <label> <input type="radio"       name="reason[]" value="Writing"> Writing </label> 
                                <label> <input type="radio"       name="reason[]" value="Consultation"> Consultation </label> 
                                <label> <input type="radio"    name="reason[]" value="Other"> Other </label> 
                   

                              </ul> 
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
                            <p class="text-primary m-0 fw-bold"><i class="fas fa-users"></i>  Payments List</p>
                        </div>

                        <table>
    <tr>
      <td>



<?php 

$username = $_SESSION['username'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_tuition WHERE ttep_teacher_username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;



// Get the value of the "email" column and assign it to a variable
$student = $row["id_ttep_student"];
$id_p = $row["id_ttep_payment"];
  $date = $row["date"];

 $amount = $row["amount"];
 $extra_information = $row["extra_information"];
 $sessioncount = $row["sessioncount"];






// Generate the table
echo ' <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info"> <table class="table my-0" id="dataTable">';
echo '<tr><th>Students</th><th>Date</th><th> Amount </th></tr> </div>';

while ($row = $result->fetch_assoc()) {
  $student = $row["id_ttep_student"];
  $amount = $row["amount"];
  $id_p = $row["id_ttep_payment"];

   $date = $row["date"];
   $query = "SELECT firstname, lastname FROM ttep_student WHERE id_ttep_student = '$student'";
   $result2 = mysqli_query($conn, $query);
 
   $row2 = mysqli_fetch_assoc($result2);
   $firstname = $row2["firstname"];
   $lastname = $row2["lastname"];
   $student_name = "$firstname $lastname";
 
 
    echo '<tr>';
    echo '<td> ' . $student_name . '</td>';
    
     echo '<td>' . $date . '</td>';
     echo '<td>' . $amount . '</td>';



    echo '<td>';
    echo '<a href="tuition_detail.php?id=' . $id_p . '"><i class="fas fa-edit"></i></a> <a href="includes/delete_tuition_code.php?id_p=' . $id_p . '"><i class="fas fa-trash"></i></a>';
    echo ' ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';

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