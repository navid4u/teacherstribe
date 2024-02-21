
<style>

 
h1 {
  color: royalblue;
}

.copyCenter {
  text-align: center;
}
.copyRight {
  text-align: right;
}
.container {
  width: 95%;
  margin: 0 auto;
    overflow: hidden;

}
.box {
  max-width: 90%;
  padding: 0px 10px;
  overflow: hidden;
  margin: 20px 5px;
}
.iconArea {
  width:50px;
  float: left;
  display: inline-block;
}
.copyArea {
  max-width: 100%;
  float: none;
  display:block;
  overflow: hidden;
}
.copyArea p {
  margin-top: 20px;
}
.closeArea {
  width: 30px;
  float: right;
}
.closeArea i {
  cursor: pointer;
}


/* Unique Box Styles */
.warning {
  background:salmon;
  border-radius: 3px;
}
.weather {
  background: skyblue;
}
.newsletter{
  background:turquoise;
  border-top:5px solid #2A9489;
  border-radius: 5px;
  color: #2A9489;
}
.hours {
  background:lightgrey;
  border:1px solid #ccc;
  border-radius: 3px;
}
.specialOffer {
  background: repeating-linear-gradient(45deg, rgba(0,128,128,.25), rgba(0,128,128,.25) 10px, rgba(0,128,128,.3) 10px, rgba(0,128,128,.3) 20px);
  box-shadow: 5px 5px 0 rgba(0,0,0,.2);
  border: 2px solid #008080;
  color:#008080;
}



/* Rules for sizing the icon. */
.material-icons.md-18 { font-size: 18px; }
.material-icons.md-24 { font-size: 24px; }
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }

/* Rules for using icons as black on a light background. */
.material-icons.md-dark { color: rgba(0, 0, 0, 0.34); }
.material-icons.md-dark.md-inactive { color: rgba(0, 0, 0, 0.26); }

/* Rules for using icons as white on a dark background. */
.material-icons.md-light { color: rgba(255, 255, 255, .6); }
.material-icons.md-light.md-inactive { color: rgba(255, 255, 255, 0.3); }

.dot {
        height: 10px;
        width: 10px;
        background-color: green;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
 
    }
    
    .centered {
        text-align: left;
    }
    
</style>

<?php

$username = $_SESSION['username'];
 $sql = "SELECT * FROM ttep_student WHERE ttep_teacher_username = '$username'";

$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $mysqli->error;
}

$student_number = $result->num_rows;

$sql2 = "SELECT SUM(amount) AS total FROM ttep_tuition WHERE ttep_teacher_username = '$username' ";

$result = $conn->query($sql2);
$row = $result->fetch_assoc();

$total2 = $row['total'];

 

$sql3 = "SELECT title
        FROM events
        WHERE start_date >= CURDATE() AND posted_by='$username' 
        ORDER BY start_date ASC
        LIMIT 1";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    // Event found
    $row = $result3->fetch_assoc();
    $eventTitle = $row["title"];
} else {
    // No events found
    $eventTitle = "No events";
}
;



?>
 
    
    
    
    <script>
    // Define an array of motivational teaching sentences
    var sentences = [
        "Hello <?php echo $firstname ?> Today is Sunday: Believe you can and you're halfway there.",
        "Today is Monday: The future belongs to those who believe in the beauty of their dreams.",
        "Today is Tuesday: Education is the most powerful weapon which you can use to change the world.",
        "Today is Wednesday: The best way to predict your future is to create it.",
        "Today is Thursday: Don't watch the clock; do what it does. Keep going.",
        "Today is Friday: Education is not the filling of a pail, but the lighting of a fire.",
        "Today is Saturday: Success is not the key to happiness. Happiness is the key to success.",
    ];

    // Get the current date
    var currentDate = new Date();

    // Get the day of the week (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
    var dayOfWeek = currentDate.getDay();

    // Display the motivational teaching sentence for the current day
    var sentence = sentences[dayOfWeek];
    document.write("<p>" + sentence + "</p>");
 


</script>
<div class="row">
    
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2" style="height:80px">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Number of students</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $student_number ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-check fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>

                            
                           
                        </div>


                        
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2" style="height:80px">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total Payments&nbsp;</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $total2 . ' ' . $currency; ?>
</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2" style="height:80px">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Next on calander&nbsp;</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>  <?php echo $eventTitle;
 ?> </span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-list-alt fa-2x text-gray-300" style="font-size: 32px;"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2" style="height:80px">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><a href="social"> <span>Pending messeges&nbsp;</span></a></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $messageCount ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       

                       <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Overview</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
               
                               
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
        echo $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo   $row["student"] . $row["ttep_day_time"] . ' <br>';
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
        echo  $row["student"] . $row["ttep_day_time"] . ' <br>';
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

  
<h6 style="margin: auto;
  width: 95%;
  padding: 10px;" class="text-primary fw-bold m-0"> Projects that you have defined: </h6>

  <div class="card-body" >
    <?php
    $query = "SELECT title, progress FROM ttep_project WHERE ttep_teacher_username = '$username' LIMIT 5";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <h4 class="small fw-bold"><?php echo $row['title']; ?><span class="float-end"><?php echo $row['progress'] ?></span></h4>
            <div class="progress progress-sm mb-3">
                <div class="progress-bar bg-danger" aria-valuenow="<?php echo $row['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['progress'] ?>%;"><span class="visually-hidden"><?php echo $row['progress'] ?></span></div>
            </div>
            <?php
        }
    } else {
        echo ">Thre is no project defined. <p> Go to the <a href='project'> projects </a> page to define different tasks! </p> ";
    }
    ?>
</div>



                                </div>
                            </div>
                        </div>


                
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                     <div class="text-center small mt-4"><span class="me-2"> 





                                    <p id="line" name="line">

     
<table >
    
  


    
   <p style="color: red"> <strong> Account: <?php   echo $daysLeft ?> days left</p> 
<p> <i style="color: orange" class="fas fa-crown"></i> <a href="premium"  style="font-size:13px"> <span class="text-uppercase text-primary fw-bold text-xs mb-1"> (Recharge/ Go premium) </a></span>  </strong> </p>
    <tr> <img style="max-width: 59%; height: auto;"  class="border rounded-circle img-profile" src="<?php echo $image_path ?>" alt="profile picture" />
    <br><div style="font-size: 10px; color: grey;" ><span class="typing-dots">Status: </span></div>   
<p>
  <?php echo $status; ?>
</p>  

<div class="centered">
       
</div>
        <br>
<div class="centered">

</div>
<table style="max-width: 80%; 
    margin-left: auto;
    margin-right: auto;"> 
      
      <td style="width: 70%;  text-align: left;; " >

      <span class="dot"></span> Area of expertise:  <?php   echo $expertise ?>
      <br>
      <span class="dot"></span> Native Language: <?php   echo $nativelang ?>

      <br>
      <span class="dot"></span> Phone: <?php   echo $contact_number ?>

      <br> 
      <span class="dot"></span> Email: <?php   echo $email ?>
<br>
<p>  ____ </p>
<p> Signiture:
</p>
      <div style=" font-style: italic;">
&#8220;<?php echo $signiture; ?>&#8221;
</div>
</table>


      </td>
    </tr>
  </table>
  <br>


                                    
                                    </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                            </div>
                        </div>
                        <?php include("includes/footer.php"); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>