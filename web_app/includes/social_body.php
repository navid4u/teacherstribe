<style>
  /* CSS styling for the table */
  table {
    width: 94%;
    margin: 0 auto; /* Center the table horizontally */
    border-collapse: collapse; /* Remove cell spacing */
    
  }
  .responsive-table {
  display: flex;
  flex-direction: column;
}

.row {
  display: flex;
}

.column {
  flex: 1;
  padding: 0 10px;
}

@media (max-width: 768px) {
  .column {
    flex: none;
  }
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
 
.dot {
        height: 10px;
        width: 10px;
        background-color: green;
        border-radius: 100%;
        display: inline-block;
        margin-right: 5px;
    }
    
     
    .centered {
        text-align: center;
    }
    
    .spaced {
        margin-top: 20px;
    }

    .typing-dots {
    display: inline-block;
    animation: typing 1s infinite;
    vertical-align: middle;
  }
   
  

  @keyframes typing {
    0% { opacity: 0.2; }
    20% { opacity: 1; }
    100% { opacity: 0.2; }
  }
  .card2 {
    display: inline-block;
    width: 200px; /* You can adjust this to your desired card width */
    margin-right: 20px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    min-height: 250px; /* Set the minimum height to 250px */
  max-height: 250px; /* Set the maximum height to 250px */
  }
  
  .card img {
    max-width: 100%;
    height: auto;
    border-radius: 100%;
    max-height: 100px; /* This sets the maximum height of the image to 100px */
    object-fit: cover; /* This ensures the image fills its container while maintaining aspect ratio */
  }
  
  h3 {
    margin-top: 0;
  }
  

  th, td {
     padding: 8px;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }
  .td2 {
    border-collapse: collapse;
    width: 10%;
  }
 
  .link-span {
  display: inline-block;
  color: blue;
  text-decoration: underline;
  cursor: pointer;
}
.link-span:hover {
  color: darkblue;
  background-color: #f5f5f5;
}
.messages-table {
  max-height: 0px;
  overflow: hidden;
  transition: max-height 0.5s ease-out;
}
.messages-table.show {
  max-height: 100%; /* Adjust this value to fit your content */
}

.blog-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
  border-radius: 4px;
  text-align: left;
}

.blog-post {
  background: linear-gradient(to bottom, #E9F8FF, #fff);
  padding: 20px;
 
  border-radius: 20px;

}


/* Media queries for responsive layout */
@media (max-width: 768px) {
  .blog-grid {
    grid-template-columns: repeat(1, 1fr);
  }
}

@media (max-width: 480px) {
  .blog-grid {
    grid-template-columns: 1fr;
  }
}

/* Media query for mobile */
@media (max-width: 768px) {
    /* Set table layout to display as a single column */
    #messages td {
        display: block;
        margin-bottom: 10px;
    }
}
.blog-title {
  font-weight: bold;
  font-size: 20px;
  text-align: left;
}
.search-icon {
  margin-top: 18px;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
  font-size: 13px; /* Adjust the size to your preference */
  background-color: rgb(255, 110, 6);
  color: white;
  padding: 10px;
  border-radius: 20%;
  transition: background-color 0.3s ease;
}

.search-icon:hover {
  background-color: darkorange;
}
.blog-date {
  color: blue;
  margin-top: 8px;
  text-align: right;
}

.blog-body {
  margin-top: 16px;
  text-align: left;
  
}

.section-title {
  margin-bottom: 30px;
}

.img-fluid {
  height: 100px;
}

.section {
  padding-top: 40px;
  padding-bottom: 14px;
}

.rounded-lg {
  border-radius: 10px;
}
  /* Define a class for the first column */
  .user-column {
    width: 30%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  /* Style the sender cell */
  .sender-cell {
    padding-right: 10px;
  }

  /* Set responsive styles for smaller devices */
  @media screen and (max-width: 768px) {
    .user-column {
      width: auto;
      display: inline-block;
      white-space: normal;
    }

    .sender-cell {
      padding-right: 0;
      overflow: hidden;
    }
  }
.dataTables_wrapper .dataTables_paginate {
    margin-top: 20px; /* Adjust as needed */
    text-align: center;
}

  .dataTables_filter {
    margin-top: 30px;
    margin-bottom: 30px;
  }
</style>





 
  <script>
 function showMessagesTable() {
  var messagesTable = document.getElementById("messages");
  if (messagesTable.style.display === "none") {
    messagesTable.style.display = "block";
  } else {
    messagesTable.style.display = "none";
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


<p class="container" style="color:red; text-align:center"> <?php 

$thanks = $_GET ['thanks'];

echo $thanks ?> </p> 
<table>
    <tr>
        <td>
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">  
                        <span class="link-span" style="display:inline-block;" onclick="showMessagesTable()">
                            <i class="fa fa-envelope"></i> Open messages (your inbox)
                        </span>
                    </p>  
                </div>

                <table id='messages' name='messages' style="display:none;">
                    <tr>
                        <td class="user-column">   

                            <?php
                            $sql2 = "SELECT  id, sender, message FROM ttep_messages WHERE receiver='$username'";
                            $result2 = mysqli_query($conn, $sql2);

                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo '<tr>';
                                // add user icon before sender name
                                echo '<td class="sender-cell"><i class="fa fa-user"></i> <strong>' . $row['sender'] . '</strong></td>';
                                
                                // truncate message to 15 words
                                $words = explode(' ', $row['message']);
                                $truncatedMessage = implode(' ', array_slice($words, 0, 5));

                                // add open letter icon before truncated message
                                echo '<td><a href="/web_app/message.php?id=' . $row['id'] . '"><i class="fa fa-envelope-open"></i> <em>' . $truncatedMessage . '</em>...</a></td>';
                                echo '</tr>';
                            }
                            ?>

                        </td>
                    </tr>
                </table>   
            </div>
        </td>
    </tr>
</table>
    
     




 
<table  style="margin-top: -40px;">
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> <?php      echo 'Welcome ' . $firstname . ' ' . $lastname ;
 ?> </p> <form method="post" action="includes/status_code.php">
 <textarea style="width:100%" name="status" placeholder="Write something..."></textarea>
 <br>     <input type="hidden" name="username" value="<?php echo $username; ?>">

 <button type="submit" name="post">Post a status</button>
</form>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">

      <div class="responsive-table">
  <div class="row">
    <div class="column">
      <div class="centered spaced">
        <img  class="border rounded-circle img-profile"  style="object-fit: cover;"  src="<?php echo $image_path ?>" alt="profile picture" />
      </div>
      <br>
      <div class="centered spaced">
        <div style="font-size: 10px; color: grey;"><span class="typing-dots">Status: </span></div>   
        <p>
          <?php echo $status; ?>
        </p>
      </div>
    </div>
    <div class="column">
      <span class="dot"></span> Area of expertise: <?php echo $expertise ?>
      <br>
      <span class="dot"></span> Native Language: <?php echo $nativelang ?>
      <br>
      <span class="dot"></span> Phone: <?php echo $contact_number ?>
      <br> 
      <span class="dot"></span> Email: <?php echo $email ?>
      <br>
      <p> ____ </p>
      <p> Signiture:</p>
      <div style="font-style: italic;">
        &#8220;<?php echo $signature; ?>&#8221;
      </div>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <h5><i class="fas fa-book-open"></i> <b>Latest updates </b></h5>
    </div>
  </div>
  <div class="row">
    <div class="column">
     <?php
$result = mysqli_query($conn, "SELECT firstname, lastname, status FROM ttep_teacher");
while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['status'])) {
        echo  "<span style='color:green'>&bull;</span> " . $row['firstname'] . " " . $row['lastname'] . ": ";
        echo "  " . $row['status'] . " <br> <hr style='border-top: 1px solid ;'>
        ";
    }
};
?>
    </div>
  </div>
</div></p>





      </td>
    </tr>
  </table>
  
  
  
  <table  style="margin-top: -40px;">
    <tr>
      <td>
  <div  >
                        <div  >
   <div>
        

        <div class="blog-grid">
       <?php
// Assuming you have already established a database connection
include("conn.php");
// Query the database to fetch the blog post information
$query = "SELECT id, title, description, date, posted_by FROM posts WHERE privacy = 'teacher' OR privacy= 'all' LIMIT 15";
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
    echo "<a href='https://teacherstribe.net/web_app/view_profile.php?username=$posted_by'> $posted_by </a> posted $output:". '<h2 class="blog-title">' . $title . '</h2>';
    echo '<p class="blog-body">' . $truncatedDescription . ' ...</p>';
    echo '<p><a href="blog_post.php?id=' . $id . '" class="new-button">Read more</a></p>';
    echo '</div>';
}
?>
  </div>
</div>

   </div></p>





      </td>
    </tr>
  </table>
  
  
  
  <div class="responsive-table">
  <div class="row">
    <div class="column">
      <div class="card shadow mb-5">
        <div class="card-header py-3">
          <div class="inbox-container">
            <div style="text-align: center; margin-top: 10px; margin-bottom: 5px; font-size: 24px;">
              <i class="fa fa-users"></i> Other teachers on the network
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row" style="margin: 0 auto; width:95%">
  <div class="column">
  <?php
    $sql = "SELECT username, firstname, lastname, age, expertise, image_path FROM ttep_teacher";

    // Execute the query and store the result set in a variable
    $result = mysqli_query($conn, $sql);
    echo '<table id="userTable">';

    echo '<thead><tr><th>Profile Picture</th><th>Name</th><th>Age</th></tr></thead>';

    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td class="td2"><img style="width:40px; height:40px; object-fit: cover; " src="' . $row['image_path'] . '" alt="Profile Picture"></td>';
      echo '<td><a title="' . $row['expertise'] .  '" href="/web_app/view_profile.php?username=' . $row['username'] . '">' . $row['firstname'] . '</a></td>';
      echo '<td> Age: '  . $row['age'] . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    // Close the database connection
    mysqli_close($conn);
  ?>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#userTable').DataTable({
        "paging": true,
        "pagingType": "numbers"
    });
});
</script>

  </div>
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