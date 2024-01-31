<?php $username = $_SESSION['username']; 
$sql4 = "SELECT * FROM ttep_messages WHERE receiver = '$username'";

$result4 = $conn->query($sql4);

if (!$result4) {
    echo "Error: " . $mysqli->error;
}

$message_number = $result4->num_rows;

$sql5 = "SELECT * FROM ttep_teacher WHERE username = '$username'";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
$status = $row5['status'];
$firstname = $row5['firstname'];
$lastname = $row5['lastname'];
$age = $row5['age'];
$expertise = $row5['expertise'];
$signiture = $row5['signiture'];
$email = $row5['email'];
$currency = $row5['currency'];
$contact_number = $row5['contact_number'];
$nativelang = $row5['nativelang'];
$image_path = $row5['image_path'];
$currency = $row5['currency'];

$signature = $row5['signiture'];


?>
<style>
    .expired-account-banner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Change the color and opacity as needed */
        color: white;
        font-size: 24px;
        text-align: center;
        padding-top: 100px; /* Adjust the padding as needed */
        z-index: 9999;
            /* Add more styles as needed to customize the banner appearance *
            }
            
     
</style>
  <?php
 
$query = "SELECT create_date FROM ttep_teacher";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$createDate = $row['create_date'];

$currentDate = date('Y-m-d');
$daysPassed = floor((strtotime($currentDate) - strtotime($createDate)) / (60 * 60 * 24));
$daysLeft = 30 - $daysPassed;

  $query2 = "UPDATE ttep_teacher SET days_left = '$daysLeft' WHERE username = '$username'";
$result2 = mysqli_query($conn, $query2);
     
if ($daysLeft <= 0) {
    // Show the banner content
    echo '

   <div class="expired-account-banner">
 <a href="premium"> <img style="max-width: 100%;" src="pre.png"></a>
  <p><a href="http://www.teacherstribe.net" style="color: orange">Or return to the home page!</a></p>
</div>
    
    '
    
    
    ;
}


 ?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form> 
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">
                                    
                                <?php
$query = "SELECT COUNT(*) AS message_count FROM ttep_reminder WHERE ttep_teacher_username = '$username'";

$result = mysqli_query($conn, $query);
if ($result) {
    // Fetch the count result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Retrieve the message count from the result
    $messageCount = $row['message_count']; 
    echo $messageCount;  

} else {
    // Handle the case where the query fails
    echo "0";
}
    ?>



                                </span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6> 
                                            <div class="me-3">  </a>
                                            <?php
                                $result = mysqli_query($conn, "SELECT date, title FROM ttep_reminder WHERE ttep_teacher_username='$username'");
                                while ($row = mysqli_fetch_assoc($result)) {
$counter =  $messageCount;
                                    $counter++;
                                                 if ($counter >= 5) {
                                                     break;
                                                 }
                                                $title = $row['title'];
                                                $date = $row['date'];

                                    echo "   

                                    <table style='width: 100%;display: flex;   border-collapse: collapse; padding: 10px;'>
  <tr>
    <td style='width: 20%; padding: 5px; border: none;'><i><div class='bg-primary icon-circle'><i class='fas fa-file-alt text-white'></i></div></td>
    <td style='padding: 5px; border: none;'>$title <span class='small text-gray-500'>$date</span></td>
  </tr>
</table>  
                                       
                                        ";
                                    
                                    };
                                ?>  


                                       <a class="dropdown-item text-center small text-gray-500" href="reminder">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                             
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">
                                    
                                <?php
$query = "SELECT COUNT(*) AS message_count FROM ttep_messages WHERE receiver = '$username' AND readstatus='1' ";

$result = mysqli_query($conn, $query);
if ($result) {
    // Fetch the count result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Retrieve the message count from the result
    $messageCount = $row['message_count']; 
    echo $messageCount;  

} else {
    // Handle the case where the query fails
    echo "0";
}
    ?>
                                
                                
                                 </span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">Messages</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                           
                                          
                                             <?php
                              $result = mysqli_query($conn, "SELECT id, receiver, sender, message FROM ttep_messages WHERE receiver='$username' ORDER BY id DESC LIMIT 5");
while ($row = mysqli_fetch_assoc($result)) {
    $message = $row['message'];
    $sender = $row['sender'];
    $id = $row['id'];
    echo "
        <a class='dropdown-item d-flex align-items-center' href='message.php?id=$id'>
            <div class='text-truncate'>
                <i class='far fa-envelope-open'></i>
                <span>$message</span>
            </div>
            <p class='small text-gray-500 mb-0'>--- from $sender</p>
            <div></div>
        </a>
    ";
};
                                
                                ?>
                                        
                                        <a class="dropdown-item text-center small text-gray-500" href="social">Go to the social page</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['username'] ?></span><img class="border rounded-circle img-profile" src="<?php echo $image_path ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="setting"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item"  href="/web_app/my_site/1/cv.php?username=<?php echo $username ?> "><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;My Site</a>
                                        <div class="dropdown-divider" ></div><a class="dropdown-item"  href="logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>  &nbsp;Logout  </a>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>