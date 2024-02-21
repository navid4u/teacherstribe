<?php
include ('conn.php');
$username = $_POST['username'];

$subDomain = $_POST['subdomain'];
$cPanelUser = 'efqlckyo';
$cPanelPass = 'y6tDi967Yu';
$rootDomain = 'teacherstribe.net';
$subDomainWithHttp = "http://" . $subDomain . ".teacherstribe.net/";


$stmt = $conn->prepare("SELECT website FROM ttep_teacher WHERE website = ?");
$stmt->bind_param("s", $subDomainWithHttp);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Subdomain exists, show appropriate message
    echo "This domain is already taken. Please try another name!";
} else {


$newDomain = "http://" . $subDomain . "." . $rootDomain . "";
echo '<span style="font-weight: bold; color: orange; animation: flash 1s infinite;">Your domain is registered as: ' . $newDomain . '</span>';




$query = "UPDATE ttep_teacher SET website = '{$newDomain}' WHERE username = '{$username}'";
$result = mysqli_query($conn, $query);
}




?>