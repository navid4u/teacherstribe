
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
$id_p = $_GET['id'];
 // Execute an SQL query
$sql = "SELECT id_ttep_student, amount, date, extra_information, sessioncount FROM ttep_tuition WHERE id_ttep_payment = '$id_p'";


  $result = mysqli_query($conn, $sql);


$row = $result->fetch_assoc();
$student = $row["id_ttep_student"];
 $sessioncount = $row["sessioncount"];
$date = $row["date"];

$amount = $row["amount"];
 

 

  $extra_information = $row["extra_information"];
  $query = "SELECT firstname, lastname FROM ttep_student WHERE id_ttep_student = '$student'";
  $result2 = mysqli_query($conn, $query);
 
  $row2 = mysqli_fetch_assoc($result2);
  
  $firstname = $row2["firstname"];
  $lastname = $row2["lastname"];
  $student_name = "$firstname $lastname";

  ?>


<div class="centered-div">
  <h1>Edit Tuitions</h1>
</div>
<table>
  <tr>
     
  </tr>
  <div class="card">
  <p>This Tuition was given by <em><?php echo $student_name ?></em> </em>.</p>
  <p>The date of the payment is:  <em><?php echo $date ?></em>  </em>.</p>

  <p>It was basically for <em><?php echo $sessioncount ?></em> sessions  </p> 
  <p>The amount was   <em><?php echo $amount ?></em>.</p>
   <p>Info. <em><?php echo $extra_information ?></em>  </em>.</p>
  <p>
  </p>

</div>
<div class="card">
  <form action="includes/tuition_detail_code.php" method="post">
    <input type="hidden" name="id_p" value="<?php echo $id_p; ?>">
    <div class="form-row">
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" disabled>
    </div>
    <div class="form-row">
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" disabled>
    </div>
    <div class="form-row">
      <label for="time">Amount:</label>
      <input type="text" id="amount" name="amount" value="<?php echo $amount; ?>">
    </div>
    <div class="form-row">
      <label for="time">Number of sessions:</label>
      <input type="text" id="sessioncount" name="sessioncount" value="<?php echo $sessioncount; ?>">
    </div>
    <div class="form-row">
      <label for="date">Date:</label>
      <input type="text" id="date" name="date" value="<?php echo $date; ?>">
    </div>
  
    <div class="form-row">
      <label for="Extra_information">Extra Information:</label>
      <input type="text" id="extra_information" name="extra_information" value="<?php echo $extra_information; ?>">
    </div>
     
    <div class="form-row button-row">
      <input type="submit" value="Save">
    </div>
  </form>
</div>

</table> <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>