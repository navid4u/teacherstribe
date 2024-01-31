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
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    if (obj.clientHeight < obj.contentWindow.document.body.scrollHeight) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    } else {
        obj.style.height = "1400px";
    }
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
 
                        <table>
    <tr>
      <td>



 
 
       <iframe src="includes/blog/index.php" onload="resizeIframe(this)" style="width:100%; border:none; max-height:2000px;"></iframe>

 



      </td>
    </tr>
  </table>

                        
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table>
 <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>