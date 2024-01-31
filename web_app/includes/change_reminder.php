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
<?php
var_dump($_POST);
session_start();

// Check if the session variable is set
if (isset($_SESSION['username'])) {
  // The session variable exists, so display the dashboard
  
} else {
  // The session variable doesn't exist, so redirect to the login page
  header('Location: login.php');
  exit();
}
;
 
 
 $username = $_SESSION['username'];

  ?>
<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Add, remove and edit your session with different students of yours</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
  
<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
  	<div class="container mt-5">
		<h2>Edit Reminder</h2>
		<?php
			// Fetch reminder data from the database based on the given ID
			$id = $_GET['id'];
			$query = "SELECT * FROM ttep_reminder WHERE id_ttep_reminder='$id'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			$title = $row['title'];
			$date = $row['date'];
			$detail = $row['detail'];
		?>
		<form method="POST" action="/web_app/includes/change_reminder_code.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label>Title:</label>
				<input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
			</div>
			<div class="form-group">
				<label>Date:</label>
				<input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
			</div>
			<div class="form-group">
				<label>Detail:</label>
				<textarea class="form-control" name="detail"><?php echo $detail; ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Save Changes</button>
		</form><div  class="form-row button-row" >
     <a href="#" onclick="history.back(); return false;" > <input type="submit" value="Back">    </a>
    </div>
	</div>

	</div>


</td>
</tr>
</table>
</p>





</td>
</tr>
</table>

 <?php include("footer.php"); ?>

 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>