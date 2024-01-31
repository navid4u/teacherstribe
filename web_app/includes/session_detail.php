<style>
.card {
  margin: auto;
  width: 90%;
  border: 1px solid black;
  padding: 10px;
}
.card em {
  color: blue;
  font-style: italic;
}

.form-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-bottom: 10px;
}

.form-row label {
  width: 150px;
  text-align: right;
  margin-right: 10px;
}

.form-row input[type="text"] {
  flex: 1;
}

.button-row {
  margin-top: 20px;
  justify-content: center;
}

.button-row input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.button-row input[type="submit"]:hover {
  background-color: #3e8e41;
}
.centered-div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px; /* adjust as needed */
}

.centered-div h1 {
  text-align: center;
}
</style>
<?php 

$id_s = $_GET['id'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_session WHERE id_ttep_session = '$id_s'";


$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;


$row = $result->fetch_assoc();
$student = $row["id_ttep_student"];

 $time = $row["time"];
 $location = $row["location"];
 $date = $row["date"];

 $assignment = $row["assignment"];
 $extra_information = $row["extra_information"];
 $query = "SELECT firstname, lastname FROM ttep_student WHERE id_ttep_student = '$student'";
 $result2 = mysqli_query($conn, $query);

 $row2 = mysqli_fetch_assoc($result2);
 
 $firstname = $row2["firstname"];
 $lastname = $row2["lastname"];
 $student_name = "$firstname $lastname";

  ?>


<div class="centered-div">
  <h1>Edit Sessions</h1>
</div>
<table>
  <tr>
     
  </tr>
  <div class="card">
  <p>This session was held for <em><?php echo $student_name ?></em> </em>.</p>
  <p>The class is held on <em><?php echo $date ?></em> at <em><?php echo $time ?></em>.</p> 
  <p>The location was in <em><?php echo $location ?></em>.</p>
  <p>The given assignment was <em><?php echo $assignment ?></em>  </em>.</p>
  <p>Info. <em><?php echo $extra_information ?></em>  </em>.</p>
  <p>
  <a href="student_detail.php?id=<?php echo $student; ?>">
  <button style="background-color: green; color: white;">Click here to edit the student</button>
</a></p>

</div>
<div class="card">
  <form action="includes/session_detail_code.php" method="post">
    <input type="hidden" name="id_ttep_student" value="<?php echo $student; ?>">
    <div class="form-row">
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" disabled>
    </div>
    <div class="form-row">
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" disabled>
    </div>
    <div class="form-row">
      <label for="time">Date:</label>
      <input type="text" id="date" name="date" value="<?php echo $date; ?>">
    </div>
    <div class="form-row">
      <label for="purpose">Time:</label>
      <input type="text" id="time" name="time" value="<?php echo $time; ?>">
    </div>
    <div class="form-row">
      <label for="age">Location</label>
      <input type="text" id="location" name="location" value="<?php echo $location; ?>">
    </div>
    <div class="form-row">
      <label for="assignment">Assignment:</label>
      <input type="text" id="assignment" name="assignment" value="<?php echo $assignment; ?>">
    </div>
       <div class="form-row">
      <label for="extra_information">Extra information:</label>
      <input type="text" id="extra_information" name="extra_information" value="<?php echo $extra_information; ?>">
    </div>
    <div class="form-row button-row">
      <input type="submit" value="Save">
    </div>
  </form> <div  class="form-row button-row" >
     <a href="#" onclick="history.back(); return false;" > <input type="submit" value="Back">    </a>
    </div>
</div>

</table> <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>