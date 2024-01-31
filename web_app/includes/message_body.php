 
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
.button-container {
            display: flex;
             margin-top: 20px;
        }
        
        .button {
            display: inline-block;
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
             text-decoration: none;
            font-size: 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 2%;
            margin-right: 2%;
        }

</style>


 <?php 
 $id = $_GET ['id'];

$sql = "SELECT  sender, message, receiver FROM ttep_messages WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sender = $row['sender'];
 $receiver = $row['receiver'];
 $message = $row['message'];
 
 

$query = "UPDATE ttep_messages SET `readstatus` = '0' WHERE id='$id'";



$result2 = mysqli_query($conn, $query);

?>


<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Message View </p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
     

  <div class="responsive-table">
  <div class="row">
    <div class="column">
      <div class="card shadow mb-5">
        <div class="card-header py-3">
          <div class="inbox-container">
            <div style="text-align: center; margin-top: 10px; margin-bottom: 5px; font-size: 24px;">
              <i class="fa fa-users"></i> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="column" >
<p id="line" name="line">
     
 
<table>
        <tr>
            <th>From</th>
        </tr>
        <tr>
            <td><a href="#"> <?php echo $sender ?></a> </td>
        </tr>
        <tr>
            <th>Message</th>
        </tr>
        <tr>
            <td><?php echo $message ?> </td>
        </tr>
    </table>
    
    <div class="button-container">
        <a href="#"> <button onclick="myFunction()" class="button">Reply</button> </a>
        <a href="includes/delete_message_code.php?id=<?php echo $id ?>"> <button class="button">Delete</button> </a>
       <a >  <button class="button" onclick="history.back()">Back</button> </a>
       
       
     



    </div>
      



</p>
<br>
   <div id="myDiv" style="display: none;">
       <form method="post" action="includes/send_reply_code.php">
           
           <input type="text" name="sender"  value="<?php echo $receiver ?>" hidden>
           <input type="text" name="receiver"value="<?php echo $sender ?>" hidden >
<input type="text"   style="height: 200px;" name="message"> 

 <br>
<button type="submit" name="post" class="button"> Send </button>

       </form>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>




      </td>
    </tr>
  </table>

                        </div>
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