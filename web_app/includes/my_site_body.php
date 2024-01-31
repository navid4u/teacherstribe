


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
 
		td, th {
			padding: 10px;
			text-align: left;
 		}
		.label {
			font-weight: bold;
		}
		textarea, input[type="text"], input[type="email"], input[type="number"], input[type="tel"] {
			width: 85%;
		}
    img {
			display: inline-block;
			margin-right: 10px;
      margin-top:  20px;
      margin-bottom:  20px;


			width: 400px;
			height: 250px;
			object-fit: cover;
 		}	
    label[for="activate"] {
			font-weight: bold;
			text-decoration: underline;
			color: blue;
			cursor: pointer;
		}
    div.inactive {
  opacity: 0.5; /* reduces the opacity of the div */
  pointer-events: none; /* disables pointer events on the div */
  filter: grayscale(100%); /* applies a grayscale filter to the div */
}
@media (max-width: 767px) {
  .responsive-table table,
  .responsive-table table tr,
  .responsive-table table td {
    display: block;
  }

  .responsive-table table tr {
    margin: 0 0 1em 0;
  }

  .responsive-table table td {
    display: flex;
    flex-direction: column;
    padding: 0.5em 0;
  }

  .responsive-table table td:before {
    content: attr(data-label);
    font-weight: bold;
    margin-right: 0.5em;
  }
}

</style>

<?php 
$username = $_SESSION['username'];
$sql = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result = $conn->query($sql);
if ($conn->error) {
        die("Query failed: " . $conn->error);
}
;
$row = $result->fetch_assoc();

// Get the value of the "email" column and assign it to a variable
$email = $row["email"];
$firstname = $row["firstname"];
$lastname = $row["lastname"];
$image_path = $row["image_path"];
$city = $row["city"];
$address_country = $row["address_country"];
$address_address = $row["address_address"];
$duration = $row["duration"];
$sitetitle = $row["sitetitle"];

$signiture = $row["signiture"];
$contact_number = $row["contact_number"];
$teachlang = $row["teachlang"];
$expertise = $row["expertise"];
$about_me = $row["about_me"];
$interest_1 = $row["interest_1"];
$interest_2 = $row["interest_2"];
$skill_1 = $row["skill_1"];
$instagram = $row["instagram"];

$twitter = $row["twitter"];

$facebook = $row["facebook"];
$linkedin = $row["linkedin"];

$skill_2 = $row["skill_2"];
$skill_3 = $row["skill_3"];
$born = $row["born"];
$hobby = $row["hobby"];
$website = $row["website"];

?>






<table>
    <tr>
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
						<div style="background-color: #4CAF50; border-radius: 10px; padding: 10px;">
  <span style="color: white; font-weight: bold; font-size: 20px;">Domain</span>
</div>                        </div>

                        <table>
    <tr>
      <td>




<form method="post" id="subdomainform" action="/createSubDomain.php">
      <p id="line" name="line">
        After completion of your web page, you can ask for a YOURWEBSITE.teacherstribe.net domain so as to have your own webpage, with students dashboard!
<br>
<div style="color:red,    font-weight: bold" id="ajax-result">
<br> <?php 
if (isset($website)) {
    echo "<strong style='color:red'>Currently your website address is : $website</strong>";
} else {
    echo "<strong style='color:red'>Website is not defined yet.</strong>";
}
?>
<br>

</div>





<?php 
 
$mes = $_GET['mes'];
echo '<div style="color: red; font-weight: bold; text-align: center;">' . $mes . '</div>';
?>
 
 <br><p> 
<label> Your Site domain: </label> <br><input type="text" style="width:40%" name="subdomain"> .teacherstribe.net
</p>
<input type="text" hidden name="username" value="<?php echo $username?>"> 
 <p> <button  type="submit" name="post"> Make the domain </button>
</p>
</form>

 
  <script>
  // Get the form element
  const form = document.getElementById('subdomainform');

  // Add event listener for form submission
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Create and configure a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Get the form data
    const formData = new FormData(form);

    // AJAX request
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the content of the AJAX div
          document.getElementById('ajax-result').innerHTML = xhr.responseText;
        } else {
          console.error('AJAX request failed.');
        }
      }
    };

    // Send the form data
    xhr.send(new URLSearchParams(formData));
  });
</script>




















 
 
  </p>

  </p>
 	 
	  <table style="border-collapse: collapse; width: 100%;">
  <tr>
   
    <td style=" padding: 10px; border: none;">
     </td>
  </tr>
</table>


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
      <td>
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Viewing Options</p>
                        </div>

                        <table>
    <tr>
      <td>



 

      <p id="line" name="line">
      Welcome to your personal webpage editor! Here, you have complete control over the content of your webpage. You can easily edit your contact information, update your posts, and adjust various options to customize your page to your liking.

 
 <br> <p id="typing-paragraph"> <p>
<strong> Now, you can design and put up your own website and publish it! </p> <p> Your students will be able to check your schedule and request for a session with you, all by means of a CLICK! </p></strong>
  </p><br>
<img src="/web_app/assets/img/sites/1.png" style="max-width: 100%; height: auto;">
 
  <br>

  </p>
 	 
	  <table style="border-collapse: collapse; width: 100%;">
  <tr>
   
    <td style=" padding: 10px; border: none;">
	<a  target="_blank" href="/web_app/my_site/1/cv.php?username=<?php echo $username ?>" ><input class="btn btn-primary py-0"     value="View My Page">
    </td>
  </tr>
</table>


      </td>
    </tr>
  </table>

                        
                    </div>
                </div>
            </div>
            </td>
    </tr>
  </table>


  <div id="edit"  >
      <style> 
      
      .icon-blog {
  opacity: 0.5; /* Initial opacity */
  font-size: 48px; /* Adjust the size as per your requirement */
  transition: opacity 0.3s ease-in-out; /* Transition effect */
}

.icon-blog:hover {
  opacity: 1; /* Change opacity on hover */
}
.icon-announcement {
  opacity: 0.5; /* Initial opacity */
  font-size: 48px; /* Adjust the size as per your requirement */
  transition: opacity 0.3s ease-in-out; /* Transition effect */
}

.icon-announcement:hover {
  opacity: 1; /* Change opacity on hover */
}
.icon-work {
  opacity: 0.5; /* Initial opacity */
  font-size: 48px; /* Adjust the size as per your requirement */
  transition: opacity 0.3s ease-in-out; /* Transition effect */
}

.linkicon {
        display: block;
    margin: 0 auto;
    opacity: 0.5; /* Initial opacity */
  font-size: 48px; /* Adjust the size as per your requirement */
  transition: opacity 0.3s ease-in-out; /* Transition effect */
}
.linkicon:hover {
      opacity: 1; /* Change opacity on hover */

}
    
}
.icon-work:hover {
  opacity: 1; /* Change opacity on hover */
}

.icon-education {
  opacity: 0.5; /* Initial opacity */
  font-size: 48px; /* Adjust the size as per your requirement */
  transition: opacity 0.3s ease-in-out; /* Transition effect */
}

.icon-education:hover {
  opacity: 1; /* Change opacity on hover */
}
      .centered-table {
  margin: 0 auto; /* To center the table */
  border-collapse: collapse; /* To remove table borders */
}

.centered-table td {
  padding: 0; /* To remove cell padding */
}
      </style>
      
      
      
   
  <table>
    <tr>
      <td>					
  <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold"> Edit information </p>
                        </div>

                        <table >
                            

 

    <tr>
      <td>

<p> 
 
 </p> 

      <p id="line" name="line">
          <div class="responsive-table">
      <form method="post" action="includes/add_site_info.php">
		<table>
			<tr>
				<td class="label">Title of Webpage:</td>
				<td><input type="text"   value='<?php echo "$sitetitle" ?>' name="sitetitle" placeholder="e.g. The professional page of John Smith!" required  > </td>
			</tr>
			<tr>
				<td class="label">About me:</td>
				<td><input type="text" value='<?php echo "$about_me" ?>'name="about_me" placeholder="e.g. I have always been into self-improvement!" required></td>
			</tr>
			<tr>
				<td class="label">Hobbies:</td>
				<td><input type="text" value='<?php echo "$hobby" ?>' name="hobby" placeholder="e.g. As a kid, I have always ..." required> </td>
			</tr>
			<tr>
				<td class="label">Interest (1):</td>
				<td><input type="text" name="interest_1" value='<?php echo "$interest_1" ?>' placeholder="e.g. Translation, Teaching Speaking, etc." required></td>
			</tr>
			 
      <tr>
				<td class="label">Interest (2)</td>
				<td><input type="text" value='<?php echo "$interest_2" ?>' name="interest_2" placeholder="e.g. Football" required></td</td>
			</tr>
			<tr>
				<td class="label">Skill (1):</td>
				<td><input type="text" name="skill_1" value='<?php echo "$skill_1" ?>' placeholder="e.g. Socializing" required></td>
			</tr>
			 
      <tr>
				<td class="label">Skill (2)</td>
				<td><input type="text" value='<?php echo "$skill_2" ?>' name="skill_2" placeholder="e.g. Teaching kids" required></td</td>
			</tr>
            <tr>
				<td class="label">Skill (3)</td>
				<td><input type="text" value='<?php echo "$skill_3" ?>' name="skill_3" placeholder="Databases" required></td</td>
			</tr>
			<tr>
				<td class="label">Date of birth:</td>
				<td><input type="date" value='<?php echo "$born" ?>' name="born"  ></td>
			</tr>
			<tr>
				<td class="label">How long have you been teaching?</td>
				<td><input type="text"value='<?php echo "$duration" ?>' name="duration" placeholder="12 years"></td>
			</tr>
			 
      <tr>
				<td class="label">Twitter account:</td>
				<td><input type="text" value='<?php echo "$twitter" ?>'name="twitter" placeholder="http://"></td>
			</tr>
      <tr>
				<td class="label">Instagram account</td>
				<td><input type="text" value='<?php echo "$instagram" ?>' name="instagram" placeholder="John_smith"></td>
			</tr>
			<tr>
				<td class="label">Facebook account</td>
				<td><input type="text" value='<?php echo "$facebook" ?>'name="facebook" placeholder="http://"></td>
			</tr>
			<tr>
				<td class="label">LinkedIn account</td>
				<td><input type="text" value='<?php echo "$linkedin" ?>' name="linkedin" placeholder="http://"></td>
			</tr>
      <tr>
  <td class="label" colspan="3">
    <a href="my_site_education">Add/edit academic background</a>
  </td>
</tr>
<tr>
  <td class="label" colspan="3">
    <a href="my_site_experience">Add/edit working experiences</a>
  </td>
</tr>
<tr>
  <td class="label" colspan="3">
    <a href="my_site_announcement">Add/edit announcements</a>
    <p>To edit focuses, links, and materials on the students' dashboard, go to the <a href="student">Students</a> link.</p>
    <p>Remember, you need to define a USERNAME and PASSWORD for each student through the EDIT link on the Students section.</p>
  </td>
</tr>

<tr>
  <td class="label" colspan="3">
    <a href="journal">Visit the Journaling section for adding/editing and deleting Blog Posts </a>
        <p>Remember to set the privacy to My Website or All for the posts to be shown on your site .</p>
  </td>
</tr>


			</tr>
			<tr>
				<td colspan="2"><input class="btn btn-primary py-0" type="submit" name="save" value="Save">  

			</td>

			</tr>
		</table>
	</form>

</div>

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

  </div>
  
  
  
  
  <?php include("footer.php"); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>