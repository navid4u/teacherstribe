
  <?php
  require_once 'config.php';

$st_username = $_POST['st_username'];
$st_password = $_POST['st_password'];
$username = $_GET['username'];

// Assuming you have already established a database connection
// Replace database_credentials with your actual database credentials


// Check if the credentials are correct
$query = "SELECT * FROM ttep_student WHERE st_username = '$st_username' AND st_password = '$st_password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Credentials are correct, proceed to load the HTML page
    ?>

<?php 

require_once 'config.php';
$username = $_GET['username'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_student WHERE ttep_teacher_username = '$username'";
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

$signiture = $row["signiture"];
$contact_number = $row["contact_number"];
$teachlang = $row["teachlang"];
$expertise = $row["expertise"];
$about_me = $row["about_me"];
$interest_1 = $row["interest_1"];
$interest_2 = $row["interest_2"];
$skill_1 = $row["skill_1"];
$instagram = $row["instagram"];
$sitetitle = $row["sitetitle"];

$twitter = $row["twitter"];

$facebook = $row["facebook"];
$linkedin = $row["linkedin"];

$skill_2 = $row["skill_2"];
$skill_3 = $row["skill_3"];
$born = $row["born"];
$hobby = $row["hobby"];



$st_username = $_GET['st_username'];
// Execute an SQL query
$sql2 = "SELECT * FROM ttep_student WHERE st_username = '$st_username'";
$result2 = $conn->query($sql2);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row2 = $result2->fetch_assoc();

// Get the value of the "email" column and assign it to a variable
$st_firstname = $row2["firstname"];
$st_lastname = $row2["firstname"];
$st_start_date = $row2["start_date"];
$st_books = $row2["books"];
$st_firstname = $row2["firstname"];
$st_time = $row2["time"];
$st_day = $row2["day"];
$st_mobile_number = $row2["mobile_number"];
$st_purpose = $row2["purpose"];
$id_ttep_student = $row2["id_ttep_student"];



$link1= $row2["link1"];
$link2= $row2["link2"];
$link3= $row2["link3"];
$link4= $row2["link4"];
 
$focus1= $row2["focus1"];

$focus2= $row2["focus2"];

$focus3= $row2["focus3"];
$material= $row2["material"];

?> 
 


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$sitetitle" ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
  
<style>
#form-container {
  display: none;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;
}
#form-container2 {
  display: none;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;
}
#form-container form {
  display: grid;
  gap: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 5px;
 
}


#form-container2 form {
  display: grid;
  gap: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 5px;
}


.form-row {
  margin-bottom: 10px;
}

.form-column {
  display: flex;
  flex-direction: column;
}

.form-column label {
  margin-bottom: 10px;
}

.form-column input,
.form-column textarea {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
  
}

.form-column.form-wide {
  grid-column: 1 / span 2;
}

.form-column.form-actions {
  display: flex;
  justify-content: flex-end;
}

.form-column.form-actions input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
}

.form-column.form-actions input[type="submit"]:hover {
  background-color: #3e8e41;
}
#thank-message {
  font-weight: bold;
  color: red;
  animation: flashing 2s infinite;
}

@keyframes flashing {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}
  </style>
  
  <body>
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark page-navbar gradient">
      <div class="container">
        <a class="navbar-brand logo" href="#"><?php echo "$st_lastname" ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item item">
                <li class="nav-item item">
                  <a class="nav-link" href="#work-experience">Announcements</a>
                </li>
                <li class="nav-item item">
                    <a class="nav-link" href="#education">Sessions</a>
                </li>
                <li class="nav-item item">
                  <a class="nav-link" href="#skills">Focuses</a>
                </li>
                <li class="nav-item item">
                    <a class="nav-link" href="#hobbies">Materials</a>
                </li>
              </li>
            </ul>
          </div>
          <a href="cv.php?username=<?php echo $username ?>" id="link2" class="btn btn-danger download-template"   >Logout</a>
      </div>
    </nav>
    <main class="page cv-page">
      <section class="cv-block block-intro border-bottom">
        


      <p id="thank-message"><?php echo $_GET['thank']; ?></p>


      <div id="form-container">
      <form method="post" action="/web_app/includes/send_message_code_student_logged_in.php" >
        
      <div class="form-column" hidden>
        <label for="username">Receiver:</label>
        <input type="text" id="username" name="username" value="<?php echo $username?>" >
      </div>
      <div class="form-column" hidden>
        <label for="username">Sender:</label>
        <input type="text" id="st_username" name="st_username" value="<?php echo $st_username?>" >
      </div>
      
      <div class="form-column"  >
        <label for="username">To:</label>
        <input type="text" id="username" name="username" value="<?php echo $lastname?>" disabled >
      </div>

      <div class="form-row">
      <div class="form-column">
         <input type="text" id="name" value="<?php echo $st_username ?>" name="name" hidden>
      </div>
      <div class="form-column">
         <input type="text" id="contact" name="contact" value="<?php echo $st_mobile_number ?>"  hidden>
      </div>
    </div>
       <div class="form-column form-wide">
        <label for="message">Message:</label>
        <textarea id="message" name="message"  ></textarea>
      
    </div>
    <div class="form-row">
      <div class="form-column form-actions">
        <input type="submit" value="Send">
      </div>
    </div>
  </form>
</div>





 




        <div class="container">
          <div class="avatar">
            <img class="img-fluid rounded-circle"  src="/web_app/assets/img/st.gif">
          </div>
          <p>Hello! <?php echo "$st_firstname  $st_lastname" ?> <br> Your teacher is <strong><?php echo "$firstname  $lastname" ?></strong>. <br> Your purpose: <?php echo "$st_purpose" ?>   </p>
          <a href="#" id="link" class="btn btn-outline-primary">Send a message to your teacher!</a>
        </div>
      </section>
      <section class="cv-block info">
        <div class="container">
          <div class="work-experience group" id="work-experience">
            <h2 class="text-center">Announcements</h2>
            <?php
            $sql = "SELECT * FROM ttep_announcement WHERE ttep_student_username='$st_username'";
$result = $conn->query($sql);

// Display the data
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $title = $row["title"];
     $date = $row["date"];
    $description = $row["description"];
    echo "<div class='item'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6'>";
    echo "<h3>$title</h3>";
    echo "<h4 class='organization'>$date</h4>";
    echo "</div>";
    echo "<div class='col-md-6'>";
    echo "<time class='period'></time>";
    echo "</div>";
    echo "</div>";
    echo "<p class='text-muted'>$description</p>";
    echo "</div>";
  }
} else {
  echo "No results";
}
?>
             
          </div>
          <div class="education group" id="education">
            <h2 class="text-center">Sessions</h2>
            <?php 

$sql2 = "SELECT * FROM ttep_session WHERE id_ttep_student = '$id_ttep_student'";
$result2 = $conn->query($sql2);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}while($row2 = $result2->fetch_assoc()) {
  $date = $row2["date"];
  $time = $row2["time"];
  $assignment = $row2["assignment"];
  $location = $row2["location"];
  $extra_information = $row2["extra_information"];

?>
<div class="item">
<div class="row">
  <div class="col-md-6">
    <h3><?php echo $date ?> </h3>
    <h4 class="organization"><?php echo $time ?></h4>
  </div>
  <div class="col-md-6">
    <time class="period"><?php echo $location ?></time>
  </div>
</div>
<p class="text-muted"><?php echo $assignment ?> </p>
<p class="text-muted"><?php echo $extra_information ?> </p>

</div>
<?php
}
?>
          
          <div class="group" id="skills">
            <div class="row">
              <div class="col-md-6">
                <div class="skills info-card">
                  <h2>Focuses</h2>
                  <h3><?php echo $focus1  ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <h3><?php echo $focus2  ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:90%">
                    </div>
                  </div>
                  <h3><?php echo $focus3 ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:80%">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact-info info-card">
                  <h2>Links</h2>
                  <div class="row">
                    <div class="col-1">
                    <i class="icon ion-link"></i>
                    </div>
                    <div class="col-9">
                     <a href="<?php echo $link1 ?>"> <span><?php echo "$link1 " ?></span> </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                    <i class="icon ion-link"></i>
                    </div>
                    <div class="col-9">
                    <a href="<?php echo $link2 ?>"><span><?php echo "$link2" ?></span></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                    <i class="icon ion-link"></i>
                    </div>
                    <div class="col-9">
                    <a href="<?php echo $link3 ?>">  <span><?php echo "$link3" ?></span></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                    <i class="icon ion-link"></i>
                    </div>
                    <div class="col-9">
                    <a href="<?php echo $link4 ?>">   <span><?php echo "$link4" ?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hobbies group" id="hobbies">
            <h2 class="text-center">Materials</h2>
            <p class="text-center text-muted"><?php echo "$material" ?></p>
          </div>
        </div>
      </section>
      <footer class="page-footer">
        <div class="container">
          <div class="social-icons">
            <a href="<?php echo "$facebook " ?>"><i class="ion-social-facebook" title="Facebook"></i></a>
            <a href="<?php echo "$instagram " ?>"><i class="ion-social-instagram-outline" title="Instagram"></i></a>
            <a href="<?php echo "$twitter" ?>"><i class="ion-social-twitter" title="Twitter"></i></a>
            <a href="<?php echo "$linkedin" ?>"><i class="ion-social-linkedin" title="Twitter"></i></a>

          </div>
        </div>
      </footer>
    </main>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="assets/js/script.js"></script>
</html>

<script>
var link = document.getElementById("link");
var formContainer = document.getElementById("form-container");

link.onclick = function() {
  formContainer.style.display = "block";
}

formContainer.onclick = function(event) {
  if (event.target == formContainer) {
    formContainer.style.display = "none";
  }
}



var link2 = document.getElementById("link2");
var formContainer2 = document.getElementById("form-container2");

link2.onclick = function() {
  formContainer2.style.display = "block";
}

formContainer2.onclick = function(event) {
  if (event.target == formContainer2) {
    formContainer2.style.display = "none";
  }
}
// make the message flash on and off every 2 seconds
setInterval(function() {
  var message = document.getElementById("thank-message");
  if (message.style.display === "none") {
    message.style.display = "block";
  } else {
    message.style.display = "block";
  }
}, 2000);
</script>
    <?php
} else {
    // Credentials are not correct, redirect back to cv.php with a message
     echo "<script>window.location.href = 'cv.php?username=$username&thank=The username and password are not correct.';</script>";
     exit();
}
?>



