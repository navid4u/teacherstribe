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





 
  <script>
 
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
                            <p class="text-primary m-0 fw-bold"> Add, remove and edit your sessions, meetings, appointments, plans and to-DOs </p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">



    <?php include ("../calandar/index.php") ?>
   </p>





      </td>
    </tr>
  </table>

                        
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table>




  <table>
    <tr>
      <td >

 
  </td>
    </tr>
  </table>


   <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>