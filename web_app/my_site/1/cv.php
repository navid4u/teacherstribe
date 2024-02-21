<?php
// Include the config file
require_once 'config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username= $_POST['username'];
    $st_username = $_POST['st_username'];
    $st_password = $_POST['st_password'];

    // Prepare and execute the SQL query to check if the username and password match
    $stmt = $conn->prepare('SELECT * FROM ttep_student WHERE st_username = ? AND st_password = ?');
    $stmt->bind_param('ss', $st_username, $st_password);
    $stmt->execute();
    $result = $stmt->get_result();
    $invalid = ""; 
    // If the query returned a row, the username and password are correct
    if ($result->num_rows == 1) {
        session_start();

        $_SESSION['st_username'] = $st_username;
        // Redirect to index.php and pass the username in the URL
        header("Location: student_index.php?username=$username&st_username=$st_username");
                exit;
    } else {
        // Display an error message
        echo '<script>var errorDiv = document.getElementById("error");;errorDiv.innerText = "  The username or password was wrong";</script>';
    }
}
?>
<!DOCTYPE html>

<style>
.blog-container {
  width: 100%;
  padding: 20px;
}

.blog-post {
  margin-bottom: 30px;
  border: 1px solid #ccc;
  padding: 20px;
}

.blog-author {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
  text-decoration: none;
  color: #333;
}

.blog-meta {
  font-size: 14px;
  color: #666;
  margin-bottom: 10px;
}

.blog-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.blog-excerpt {
  font-size: 16px;
  color: #555;
}

.read-more-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.read-more-button:hover {
  background-color: #555;
}
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
<?php 

require_once 'config.php';
$username = $_GET['username'];
// Execute an SQL query
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
  <body>
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark page-navbar gradient">
      <div class="container">
        <a class="navbar-brand logo" href="#"><?php echo "$sitetitle" ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item item">
                <li class="nav-item item">
                  <a class="nav-link" href="#work-experience">Work Experience</a>
                </li>
                <li class="nav-item item">
                    <a class="nav-link" href="#education">Education</a>
                </li>
                <li class="nav-item item">
                  <a class="nav-link" href="#skills">Skills</a>
                </li>
                <li class="nav-item item">
                    <a class="nav-link" href="#hobbies">Hobbies</a>
                </li>
              </li>
            </ul>
          </div>
          <a href="#" id="link2" class="btn btn-danger download-template"   >Students Login</a>
      </div>
    </nav>
    <main class="page cv-page">
      <section class="cv-block block-intro border-bottom">
        


      <p id="thank-message"><?php echo $_GET['thank']; ?></p>
      <div style="color: red" id="error">    </div>
                                        <?php
		// Display the error message if there is one
		if (isset($error)) {
			echo '<p style="color: red;">' . $error . '</p>';
		}
		?> 

      <div id="form-container">
      <form method="post" action="/web_app/includes/send_message_code_student.php" >
        
      <div class="form-column" hidden>
        <label for="username">Receiver:</label>
        <input type="text" id="username" name="username" value="<?php echo $username?>" >
      </div>

      <div class="form-row">
      <div class="form-column">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="form-column">
        <label for="contact">Phone number:</label>
        <input type="text" id="contact" name="contact">
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





<div id="form-container2">
  <form method="post" action="student_index.php?username=<?php echo $username ?>">
    <div class="form-row">
      <div class="form-column">
        <label for="name">Username:</label>
        <input type="text" id="st_username" name="st_username">
      </div> 
      <div class="form-column" hidden>
        <label for="name">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username ?>">
      </div> 
      
      <div class="form-column">
        <label for="phone">Password:</label>
        <input type="password" id="st_password" name="st_password">
        <div class="form-column form-actions"> <br>
        <input type="submit" value="Login">
      </div>
    </div>
   
    </div>
  </form>
</div>





  
  <table>
  <tr>
    <td>
    
      <div class="blog-container">
        <?php
        // Assuming you have already established a database connection
        // Query the database to fetch the blog post information
        $query = "SELECT id, title, description, date, posted_by 
        FROM posts 
        WHERE (privacy = 'all' OR privacy = 'student' OR privacy = 'site') AND posted_by = '$username' 
        LIMIT 3";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          // Extract the values from the row
          $id = $row['id'];
          $title = $row['title'];
          $posted_by = $row['posted_by'];
          $date = $row['date'];

          $currentDate = new DateTime();
          $date = new DateTime($date);
          $interval = $date->diff($currentDate);

          if ($interval->y >= 1) {
            $output = $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
          } elseif ($interval->m >= 1) {
            $output = $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
          } elseif ($interval->d >= 1) {
            $output = $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
          } elseif ($interval->h >= 1) {
            $output = $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
          } elseif ($interval->i >= 1) {
            $output = $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
          } else {
            $output = $interval->s . " second" . ($interval->s > 1 ? "s" : "") . " ago";
          }

          $description = $row['description'];
          $description = strip_tags($description);

          // Truncate the description to 50 words
          $truncatedDescription = implode(' ', array_slice(str_word_count($description, 1), 0, 30));

          // Generate the HTML code for the blog post
          echo '<div class="blog-post">';
          echo "<a class='blog-author' href='https://teacherstribe.net/web_app/view_profile.php?username=$posted_by'>$posted_by</a>";
          echo "<div class='blog-meta'>$output</div>";
          echo "<h2 class='blog-title'>$title</h2>";
          echo "<p class='blog-excerpt'>$truncatedDescription ...</p>";
          echo "<a href='/blog_post.php?id=$id' class='read-more-button'>Read more</a>";
          echo '</div>';
        }
        ?>
      </div>
    </td>
  </tr>
</table>
  
   
  


        <div class="container">
          <div style="margin-top: -100px">
            <img   style=" width: 300px;     height: 300px;     object-fit: cover;    border-radius: 50%;" src="/web_app/<?php echo $image_path ?>">
          </div>
          <p></p>
          <p>Hello! I am <strong><?php echo "$firstname  $lastname" ?></strong>. <?php echo "$about_me" ?>. I have a passion for <?php echo "$interest_1" ?> and <?php echo "$interest_2"?> . I have been teaching <?php echo "$teachlang" ?> for more than <?php echo "$duration" ?> </p>
          <a href="#" id="link" class="btn btn-outline-primary">Send me a message!</a>
        </div>
      </section>
      <section class="cv-block info">
        <div class="container">
          <div class="work-experience group" id="work-experience">
            <h2 class="text-center">Work Experience</h2>
            <?php
            $sql = "SELECT title, subtitle, date, description FROM ttep_experience WHERE ttep_teacher_username='$username'";
$result = $conn->query($sql);

// Display the data
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $title = $row["title"];
    $subtitle = $row["subtitle"];
    $date = $row["date"];
    $description = $row["description"];
    echo "<div class='item'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6'>";
    echo "<h3>$title</h3>";
    echo "<h4 class='organization'>$subtitle</h4>";
    echo "</div>";
    echo "<div class='col-md-6'>";
    echo "<time class='period'>$date</time>";
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
            <h2 class="text-center">Education</h2>
            <?php 

$sql2 = "SELECT * FROM ttep_education WHERE ttep_teacher_username = '$username'";
$result2 = $conn->query($sql2);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}while($row2 = $result2->fetch_assoc()) {
  $date = $row2["date"];
  $degree = $row2["degree"];
  $institute = $row2["institute"];
  $major = $row2["major"];
?>
<div class="item">
<div class="row">
  <div class="col-md-6">
    <h3><?php echo $degree ?> </h3>
    <h4 class="organization"><?php echo $institute ?></h4>
  </div>
  <div class="col-md-6">
    <time class="period"><?php echo $date ?></time>
  </div>
</div>
<p class="text-muted"><?php echo $major ?> </p>
</div>
<?php
}
?>
          
          <div class="group" id="skills">
            <div class="row">
              <div class="col-md-6">
                <div class="skills info-card">
                  <h2>Skills</h2>
                  <h3><?php echo "$skill_1 " ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div>
                  <h3><?php echo "$skill_2 " ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:90%">
                    </div>
                  </div>
                  <h3><?php echo "$skill_3 " ?> </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:80%">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact-info info-card">
                  <h2>Contact Info</h2>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-android-calendar icon"></i>
                    </div>
                    <div class="col-9">
                      <span><?php echo "$born " ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                        <i class="ion-person icon"></i>
                    </div>
                    <div class="col-9">
                      <span><?php echo "$firstname $lastname" ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-ios-telephone icon"></i>
                    </div>
                    <div class="col-9">
                      <span><?php echo "$contact_number" ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-1">
                      <i class="ion-at icon"></i>
                    </div>
                    <div class="col-9">
                      <span><?php echo "$email" ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php if (!empty($hobby)): ?>

          <div class="hobbies group" id="hobbies">
            <h2 class="text-center">Hobbies</h2>
            <p class="text-center text-muted"><?php echo "$hobby" ?></p>
          </div>
          <?php endif; ?>
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