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
  min-height: 50px; /* Replace 200px with your desired minimum height */
}

#detail {
      height: 100px;
    }

    #required {
      height: 100px;
    }

</style>
<script> 
  function validateForm(event) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var checkedCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checkedCount++;
    }
  }
}
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
                            <p class="text-primary m-0 fw-bold">   <i class="fas fa-tasks fa"></i>
Projects, programs and tasks that you are going to do in the future!</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
      On this page, users have the opportunity to add their life or career projects and set a time frame for completion. This feature enables users to organize their tasks and prioritize their goals effectively. With the ability to input deadlines, users will be motivated to work towards achieving their objectives within a specific timeframe. Additionally, the platform offers reminders to help users stay on track and follow up on their projects.   </p>





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





  <table>
    <tr>
      <td >


  <div class="mb-3"><button onclick="showDiv()" class="btn btn-primary btn-sm"  type="submit"><i class="fas fa-plus-circle"></i>  Add a new plan</button></div>

  <div id="myDiv">  








  <table>
    <tr>
      <td >







      <div class="card-body">
                                            <form method="post"  onclick="timeclass()" onsubmit="validateForm(event)" action="includes/add_project.php">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username" ><strong>Teacher</strong></label><input disabled class="form-control" type="text" id="username" value="<?php echo $lastname ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="title"><strong>Title</strong></label><input class="form-control" type="text" id="title"   name="title" required></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="detail"><strong>Details</strong></label><textarea class="form-control"  type="textarea" id="detail"   name="detail" required> </textarea></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="required"><strong>Requirements</strong></label> <textarea class="form-control"   id="required"   name="required"> </textarea ></div>
                                                    </div>
                                                    



                                               <strong>     <label class="form-label"> Estimated dates</label>  </strong>

                                                    <br><div class="row">
                                                    <div class="col">
                                                    <label for="start-time">From</label>
    <input type="date" id="start-time" name="start-time">
</div> <div class="col">
    <label for="end-time">To</label>
    <input type="date" id="end-time" name="end-time">
    
    <input type="hidden" id="time" name="time" >                                                        </div> </div>
                                                    <br> </div>
                                                    <div>... </div>
                                                 
                                                     <strong>     <label class="form-label">Level of urgancy </label>  </strong> 
                              <ul>
                                     <label> <input type="radio"        name="importance[]" value="Trivial" checked> Trivial</label> 
                                     <br>  <label> <input type="radio"      name="importance[]" value="Needed to be done as a side dish"> Needed to be done as a side dish</label> 
                                     <br>   <label> <input type="radio"     name="importance[]" value="I care about it"> I care about it</label> 
                                     <br>    <label> <input type="radio"      name="importance[]" value="It is needed to be done in due time"> It is needed to be done in due time</label> 
                                     <br>      <label> <input type="radio"       name="importance[]" value="Quite important"> Quite important</label> 
                                     <br>     <label> <input type="radio"       name="importance[]" value="As sson as possible"> As sson as possible</label> 
                                     <br>     <label> <input type="radio"    name="importance[]" value="My life depends on that!"> My life depends on that!</label> 
 

                              </ul> 
                              <div  id="error"> </div>

                              <strong>     <label class="form-label">Is is it considered to be a short term or long term goal?</label>  </strong> 
                              <ul>
                                     <label> <input type="radio"        name="short_long[]" value="Short term" checked> Short term</label> 
                                        <label> <input type="radio"      name="short_long[]" value="Long term">  Long term</label> 
                    
                              </ul> 

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


</tr> </td>
</table>
    


  <table>
    <tr>
      <td>
  
      <div class="card shadow mb-5">
                        <div class="card-header py-3">



                        <div class="col">
                            <div class="row">
 <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">  <i class="fas fa-calendar-alt"></i>  Long-term plans</p>
                                            <p class="text-white-50 small m-0">
                                                
                


                                            </p>
                                        </div>

                                      
                                    </div>                                   

                                    
                  



 
<?php 
  $sql = "SELECT id_ttep_projects, detail, title, required, time, importance, extra_information FROM ttep_project WHERE ttep_teacher_username = '$username' AND short_long = 'Long term'";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      $id_p = $row["id_ttep_projects"];
      echo "  
        
 
        
        
        
        
        <div class='card shadow mb-5'>
        <div class='card-header py-3'>
            <p class='text-primary m-0 fw-bold'>
        
        
        
        
        
         Title: <br> <strong> " . $row["title"] . " </strong> <br></p>
         </div> ";
        echo "  <table>
        <tr>
          <td> <strong> Detail:</strong>  <br> " . $row["detail"] . "</p>

        </td>
        
      </tr>

      <td>   <strong> What do I require to do so? :</strong>  <br> " . $row["required"] . "</p>  </td>
      </tr>
      <td>   <strong> Estimated timing :</strong>  <br> " . $row["time"] . "</p>  </td>
      </tr>
      <td>   <strong> How much I care? </strong>  <br> " . $row["importance"] . "</p>  </td>
      </tr>
      <td>   <strong> Further information </strong>  <br> " . $row["extra_information"] . "</p>  </td>
      </tr>
      <td>
      <a href='project_detail.php?id_p=$id_p'> <button class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit </button> </a>
      <a href='includes/delete_project_code.php?id_p=$id_p'> <button class='btn btn-primary btn-sm'><i class='fas fa-trash'></i> Delete </button> </a>     </td> <br>
      </tr>
      <td>   <p> </p> </td>
    </table>
    </div>"
    
    
    
    
    ;

        echo "<br>";
    }
} else {
    echo "No results found.";
}

?>


                                </div>



                                
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white bg-info shadow">
                                        <div class="card-body">
                                            <p class="m-0">    <i class="fas fa-calendar-alt"></i>  Short-term plans</p>
                                            <p class="text-white-50 small m-0">
             
                                            </p>
                                        </div>
                                    </div>                                   
                                    <?php 
  $sql = "SELECT * FROM ttep_project WHERE ttep_teacher_username = '$username' AND short_long = 'Short term'";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      $id_p = $row["id_ttep_projects"];
      echo "  
        
        
        
        
        
        
        <div class='card shadow mb-5'>
        <div class='card-header py-3'>
            <p class='text-primary m-0 fw-bold'>
        
        
        
        
        
         Title: <br> <strong> " . $row["title"] . " </strong> <br></p>
         </div> ";
        echo "  <table>
        <tr>
          <td> Detail: <br> " . $row["detail"] . "</p>


          </td>
        
          </tr>
    
          <td>   <strong> What do I require to do so? :</strong>  <br> " . $row["required"] . "</p>  </td>
          </tr>
          <td>   <strong> Estimated timing :</strong>  <br> " . $row["time"] . "</p>  </td>
          </tr>
          <td>   <strong> How much I care? </strong>  <br> " . $row["importance"] . "</p>  </td>
          </tr>
          <td>   <strong> Further information </strong>  <br> " . $row["extra_information"] . "</p>  </td>
          </tr>
          <td>
          <a href='project_detail.php?id_p=$id_p'><button class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit </button> </a>
          <a href='includes/delete_project_code.php?id_p=$id_p'> <button class='btn btn-primary btn-sm'><i class='fas fa-trash'></i> Delete </button>  </a    </td> <br>
          </tr>
          <td>   <p> </p> </td>
        </table>
        </div>";

        echo "<br>";
    }
} else {
    echo "No results found.";
}

?>

                

  <table>
    <tr>
      <td >
                  <!-- #region -->




      </td>
    </tr>
  </table>
  </div>



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