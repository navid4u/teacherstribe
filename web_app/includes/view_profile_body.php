<style>
 form {
        text-align: center;
    }
    
    textarea {
        width: 90%;
        height: 228px;
        margin: 0 auto; /* Center the textarea */
    }

    #send-button {
        background-color: green;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition-duration: 0.4s;
        display: block; /* Display the button as a block element to move it below the textarea */
        margin: 0 auto; /* Center the button */
        margin-top: 10px; /* Add some top margin */
    }

    #send-button:hover {
        background-color: lightgreen;
    }
    </style>
<body id="page-top">
    <div id="wrapper">

    <?php
$username = $_GET['username'];
$query = "SELECT * FROM ttep_teacher WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$image_path = $row['image_path'];
$email = $row['email'];
$contact_number = $row['contact_number'];
$address_address = $row['address_address'];
 
$address_country = $row['address_country'];
$signature = $row['signiture'];
?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4" > <?php echo ("$firstname"." "."$lastname") ?>'s Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="<?php echo $image_path ?>"  style="width:100px; height:100px; object-fit:cover;">
                                <div class="custom-file" >

                                

        </div>                                </div>  </form>


                    
                   

                            </div>
                          

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0"><i class="fas fa-pencil-alt"></i> Send a message




</h6>
                                </div>
                                <div class="card-body">
                                   
                                     <div  >

                                    

                                     <form method="POST" action="/web_app/includes/send_message_code.php">
                                        <?php $username2 = $_SESSION['username']; ?>
    <textarea id="message" name="message"></textarea>
    <input type="hidden"  id="receiver" name="receiver" value="<?php echo $_GET['username']?>"  > 
    <input type="hidden"  id="sender" name="sender" value="<?php echo $username2 ?>"  > 

    <br>
    <button type="submit" name="post"id="send-button"> Send</button>
</form>                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form  >
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username" ><strong>Username</strong></label><input disabled class="form-control" disabled  type="text" id="username" value="<?php echo $_GET['username'] ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" disabled  type="email" id="email" value="<?php echo $email ?>" name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="firstname"><strong>First Name</strong></label><input class="form-control"  disabled  type="text" id="firstname" value="<?php echo $firstname ?>" name="firstname"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="lastname"><strong>Last Name</strong></label><input class="form-control"  disabled type="text" id="lastname" value="<?php echo $lastname ?>" name="lastname"></div>
                                                    </div>
                                                    <div class="row">

                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="contact_number"><strong>Contact Number</strong></label><input disabled class="form-control" type="text" id="contact_number" value="<?php echo $contact_number ?>" name="contact_number"></div>
                                                    </div>
</div>
                                                </div>
                                             </form>
                                        </div>
                                    </div>
                                     
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                                 <div class="mb-3"><label class="form-label" for="address_address"><strong>Address</strong></label><input disabled  class="form-control" type="text" id="address_address"  value="<?php echo $address_address ?>" name="address_address"></div>
                                                <div class="row">
                                                     </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="address_country"><strong>Country</strong></label><input disabled  class="form-control" type="text" value="<?php echo $address_country ?>" id="address_country" placeholder="Iran" name="address_country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"> </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>      <?php include("footer.php"); ?>

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

   
    </div>
    <script src="/web_app/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/web_app/assets/js/bs-init.js"></script>
    <script src="/web_app/assets/js/theme.js"></script>
