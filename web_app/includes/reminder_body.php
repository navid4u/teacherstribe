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
  min-height: 200px; /* Replace 200px with your desired minimum height */
  width: 94%;

}
#line {
    
    line-height: 2;
  
}
.card {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 10px;
      width: 100%;

    }

    .card-column {
      width: 90%;
      padding: 10px;
            align-items: center;

    }

    @media (max-width: 767px) {
      .card-column {
        width: 90%;
        align-items: center;

      }
    }

    .card .card-title {
      font-size: 20px;
      padding: 10px;
      background: #f0f0f0;
      display: flex;
      align-items: center;
    }

    .card .card-title i {
      margin-right: 10px;
      padding: 20px;
      margin-left: 10px;


    }

    .card .card-body {
      padding: 20px;
       min-height: 150px;
       font-weight: bold;

    }

</style>





 
  <script>
    //this is to check that one day is chosen in the checkbox
    function validateForm(event) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var checkedCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checkedCount++;
    }
  }

  if (checkedCount === 0) {
    event.preventDefault(); // Prevent form submission if no checkbox is checked
    var errorDiv = document.getElementById('error');
    errorDiv.textContent = "Please select at least one of the days, or choose OTHERS.";  }
};
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
                            <p class="text-primary m-0 fw-bold">  <i class="far fa-calendar-alt"></i> Reminders</p>
                        </div>

                        <table>
    <tr>
      <td>



 
<div  id="line" name="line">
      <p >
Add a piece of note of which you want to be reminded later      </p>
 


<div>

<form method="post" action="includes/add_reminder.php">
  <table>
    <tr>
      <td><label for="title">Title:</label></td>
      <td><input type="text" id="title" name="title"></td>
    </tr>

    <tr>
      <td><label for="detail">Details:</label></td>
      <td><textarea id="detail" name="detail"></textarea></td>
    </tr>

    <tr>
      <td><label for="date">Date:</label></td>
      <td><input type="date" id="date" name="date"  value="<?php echo date('Y-m-d'); ?>"> </td>
    </tr>

   
    
    <tr>
      <td colspan="2"><input type="submit" value="Submit"></td>
    </tr>
  </table>
</form>
<p></p>
  </div>
</div>



      </td>
    </tr>
  </table>
  </table>




  <table>
    <tr>
      <td>
  <div class="card shadow mb-5">
  <?php 

  
$query = "SELECT * FROM ttep_reminder WHERE ttep_teacher_username= '$username'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $title = $row['title'];
  $date = $row['date'];
  $detail = $row['detail'];
  $id = $row['id_ttep_reminder'];
?>
<div class="card mt-3">
<h5 class="card-header"><?php echo $title; ?></h5>
<div class="card-body">
  <p >Deadline: <?php echo $date; ?></p>
  <p class="card-text"><?php echo $detail; ?></p>
  <a href="edit_reminder.php?id=<?php echo $id; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>  <a href="includes/delete_reminder_code.php?id=<?php echo $id; ?>" class="btn btn-primary"> <i class="fas fa-trash"></i></a>

</div>
</div>
<?php } ?>
</div>


</td>
</tr>
</table>
 
 <?php include("footer.php"); ?>

 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>