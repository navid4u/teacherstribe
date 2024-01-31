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

$id = $_GET['id'];
// Execute an SQL query
$sql = "SELECT * FROM ttep_student WHERE id_ttep_student = '$id'";


$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;


$row = $result->fetch_assoc();

 $firstname = $row["firstname"];
$lastname = $row["lastname"];
$time = $row["time"];
$purpose= $row["purpose"];
$age= $row["age"];
$needed_session= $row["needed_sessions"];
$books= $row["books"];
$base_pay= $row["base_pay"];
$day= $row["day"];
$mobile_number= $row["mobile_number"];
$email= $row["email"];
$st_username= $row["st_username"];
$st_password= $row["st_password"];


$link1= $row["link1"];
$link2= $row["link2"];
$link3= $row["link3"];
$link4= $row["link4"];
 
$focus1= $row["focus1"];

$focus2= $row["focus2"];

$focus3= $row["focus3"];
$material= $row["material"];


  ?>


<div class="centered-div">
  <h1>Edit students</h1>
</div>
<table>
  <tr>
     
  </tr>
  <div class="card">
  <p>The name of the student is <em><?php echo $firstname ?></em>. <em><?php echo $lastname ?></em>.</p>
  <p>The class is held on <em><?php echo $day ?></em> at <em><?php echo $time ?></em>.</p>
  <p>The main purpose of this student is to <em><?php echo $purpose ?></em>.</p>
  <p>His/her contact number is <em><?php echo $mobile_number ?></em> and his/her Email is <em><?php echo $email ?></em>.</p>
  <p>He/She is estimated to have <em><?php echo $needed_session ?></em> and the payment he/she has to pay for each session is <em><?php echo $base_pay ?></em>.</p>
</div>
<div class="card">
  <form action="includes/student_detail_code.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-row">
      <label for="st_username">Username:</label>
      <input type="text" id="st_username" name="st_username" value="<?php echo $st_username; ?>">
    </div>
    <div class="form-row">
      <label for="st_password">Password:</label>
      <input type="text" id="st_password" name="st_password" value="<?php echo $st_password; ?>">
    </div>


    <div class="form-row">
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
    </div>
    <div class="form-row">
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
    </div>
    <div class="form-row">
      <label for="time">Time:</label>
      <input type="text" id="time" name="time" value="<?php echo $time; ?>">
    </div>
    <div class="form-row">
      <label for="purpose">Purpose:</label>
      <input type="text" id="purpose" name="purpose" value="<?php echo $purpose; ?>">
    </div>
    <div class="form-row">
      <label for="age">Age:</label>
      <input type="text" id="age" name="age" value="<?php echo $age; ?>">
    </div>
    <div class="form-row">
      <label for="needed_session">Needed Session:</label>
      <input type="text" id="needed_session" name="needed_session" value="<?php echo $needed_session; ?>">
    </div>
    <div class="form-row">
      <label for="books">Books:</label>
      <input type="text" id="books" name="books" value="<?php echo $books; ?>">
    </div>
    <div class="form-row">
      <label for="base_pay">Base Pay:</label>
      <input type="text" id="base_pay" name="base_pay" value="<?php echo $base_pay; ?>">
    </div>
    <div class="form-row">
      <label for="day">Day:</label>
      <input type="text" id="day" name="day" value="<?php echo $day; ?>">
    </div>
    <div class="form-row">
      <label for="mobile_number">Mobile Number:</label>
      <input type="text" id="mobile_number" name="mobile_number" value="<?php echo $mobile_number; ?>">
    </div>
    <div class="form-row">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="<?php echo $email; ?>">
    </div>

    <div class="form-row">
      <label for="link1">Link 1:</label>
      <input type="text" id="link1" name="link1" value="<?php echo $link1; ?>">
    </div>

    <div class="form-row">
      <label for="link2">Link 2:</label>
      <input type="text" id="link2" name="link2" value="<?php echo $link2; ?>">
    </div>

    <div class="form-row">
      <label for="link3">Link 3:</label>
      <input type="text" id="link3" name="link3" value="<?php echo $link3; ?>">
    </div>

    <div class="form-row">
      <label for="link4">Link 4:</label>
      <input type="text" id="link4" name="link4" value="<?php echo $link4; ?>">
    </div>



    <div class="form-row">
      <label for="focus1">Focus 1:</label>
      <input type="text" id="focus1" name="focus1" value="<?php echo $focus1; ?>">
    </div>

    <div class="form-row">
      <label for="focus2">Focus 2:</label>
      <input type="text" id="focus2" name="focus2" value="<?php echo $focus2; ?>">
    </div>

    <div class="form-row">
      <label for="focus3">Focus 3:</label>
      <input type="text" id="focus3" name="focus3" value="<?php echo $focus3; ?>">
    </div>

    <div class="form-row">
      <label for="material">Suggested Material:</label>
      <input type="text" style="height:100px" id="material" name="material" value="<?php echo $material; ?>">
    </div>


    <div class="form-row button-row">
      <input type="submit" value="Save">
    </div>
    
  
    
    
  </form>   <div  class="form-row button-row" >
     <a href="#" onclick="history.back(); return false;" > <input type="submit" value="Back">    </a>
    </div>
</div>

</table> <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>