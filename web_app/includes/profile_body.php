<body id="page-top">
    <div id="wrapper">

    
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" > <?php echo ("$firstname"." "."$lastname") ?>'s Profile</h3> <div style="font-size: small; color: red;"><?php $thanks= $_GET['thanks']; echo $thanks ?></div>
<div style="color:red"> <strong> Account: <?php echo $daysLeft ?> days left 
<a href="premium"> (Recharge/ Go premium)</a> </strong> 
</div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="<?php echo $image_path ?>" width="auto" height="160">
                                <div class="custom-file" > 
 
                                <form method="post" enctype = "multipart/form-data"  action="/web_app/includes/change_photo.php">
       <div style="color:red"> <strong> <?php $error= $_GET['error']; echo $error ?> <div> <strong></strong> <input type="file"    id="image" name="image" accept="image/jpeg, image/jpg, image/png, image/gif" required>    <button type="submit" class="btn btn-primary btn-sm">Save</button> </p>

        </div>                                </div>  </form>


                    
                   

                            </div>
                          
                            <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="text-primary fw-bold m-0">Projects</h6>
    </div>
    <div class="card-body" style="min-height: 300px;">
    <?php
    $query = "SELECT title, progress FROM ttep_project WHERE ttep_teacher_username = '$username' LIMIT 5";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <h4 class="small fw-bold"><?php echo $row['title']; ?><span class="float-end"><?php echo $row['progress'] ?></span></h4>
            <div class="progress progress-sm mb-3">
                <div class="progress-bar bg-danger" aria-valuenow="<?php echo $row['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['progress'] ?>%;"><span class="visually-hidden"><?php echo $row['progress'] ?></span></div>
            </div>
            <?php
        }
    } else {
        echo ">Thre is no project defined. <p> Go to the <a href='project'> projects </a> page to define different tasks! </p> ";
    }
    ?>
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
                                            <form method="post"  action="includes/change_user_setting.php">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username" ><strong>Username</strong></label><input disabled class="form-control" type="text" id="username" value="<?php echo $_SESSION['username'] ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" value="<?php echo $email ?>" name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="firstname"><strong>First Name</strong></label><input class="form-control" type="text" id="firstname" value="<?php echo $firstname ?>" name="firstname"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="lastname"><strong>Last Name</strong></label><input class="form-control" type="text" id="lastname" value="<?php echo $lastname ?>" name="lastname"></div>
                                                    </div>
                                                    <div class="row">

                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="contact_number"><strong>Contact Number</strong></label><input class="form-control" type="text" id="contact_number" value="<?php echo $contact_number ?>" name="contact_number"></div>
                                                    </div>
</div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                     
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="post"  action="includes/change_address_setting.php">
                                                <div class="mb-3"><label class="form-label" for="address_address"><strong>Address</strong></label><input class="form-control" type="text" id="address_address"  value="<?php echo $address_address ?>" name="address_address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" value="<?php echo $city ?>" type="text" id="city"   name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="address_country"><strong>Country</strong></label><input class="form-control" type="text" value="<?php echo $address_country ?>" id="address_country" placeholder="Iran" name="address_country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Forum Settings</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post"  action="includes/change_other_setting.php">
                                        <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><input type="text"  class="form-control" id="signiture"  name="signiture" value="<?php echo $signiture ?>" > </div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Notify me about new replies</strong></label></div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     <?php include("footer.php"); ?>


        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

   
    </div>
    <script src="/web_app/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/web_app/assets/js/bs-init.js"></script>
    <script src="/web_app/assets/js/theme.js"></script>
</body>