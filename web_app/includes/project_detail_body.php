
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
$id_p = $_GET['id_p'];
 // Execute an SQL query
$sql = "SELECT * FROM ttep_project WHERE id_ttep_projects = '$id_p'";


  $result = mysqli_query($conn, $sql);


$row = $result->fetch_assoc();
$id_ttep_project = $row["id_ttep_projects"];
 $ttep_teacher_username = $row["ttep_teacher_username"];
$title = $row["title"];
$required = $row["required"];


$detail = $row["detail"];
 
$importance = $row["importance"];

$time = $row["time"];
$progress = $row["progress"];


  $extra_information = $row["extra_information"];
  
  ?>


<div class="centered-div">
  <h1>Edit Projects</h1>
</div>
<table>
  <tr>
     
  </tr>
   <div style="font-size: small; color: red;"><?php $thanks= $_GET['thanks']; echo $thanks ?></div>
  <div class="card">
  <p>This project was introduced by <em><?php echo $ttep_teacher_username ?></em> </em>.</p>
  <p>The start and end date of the project is:  <em><?php echo $time ?></em>  </em>.</p>

  <p>The title of the project is <em><?php echo $title ?></em>    </p> 
  <p>And the detail is   <em><?php echo $detail ?></em>.</p>
  <p>The requirements are as follows:    <em><?php echo $required ?></em>.</p>

   <p>Info. <em><?php echo $extra_information ?></em>  </em>.</p>
  <p>
  </p>

</div>
<div class="card">
  <form action="includes/project_detail_code.php" method="post">
    <input type="text" hidden name="id_p" value="<?php echo $id_p; ?>">
    <p>
    <div class="form-row">
      <label for="progress">Progress:</label>
      <input type="range" min="1" max="100" id="progress" name="progress" value="<?php echo $progress; ?>">
    </div>
    
    </p>
    
    <div class="form-row">
      <label for="firstname">Title:</label>
      <input type="text" id="title" name="title" value="<?php echo $title; ?>" >
    </div>
    <div class="form-row">
      <label for="lastname">Detail:</label>
      <input type="text" id="detail" name="detail" value="<?php echo $detail; ?>" >
    </div>
    <div class="form-row">
      <label for="time">Requirements:</label>
      <input type="text" id="required" name="required" value="<?php echo $required; ?>">
    </div>
 
  
    <div class="form-row">
      <label for="Extra_information">Extra Information:</label>
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