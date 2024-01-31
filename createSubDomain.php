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
    // Subdomain does not exist, continue with the rest of your code
    // ...
    // ...



//  $buildRequest = "/frontend/x3/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain;


//$buildRequest = "/frontend/paper_lantern/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain . "&dir=public_html/code/" . $subDomain;
$buildRequest = "/frontend/paper_lantern/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain . "&dir =public_html/subdomains/";

$openSocket = fsockopen('localhost', 2082);
if (!$openSocket) {
    return "Socket error";
    exit();
}

$authString = $cPanelUser . ":" . $cPanelPass;
$authPass = base64_encode($authString);
$buildHeaders = "GET " . $buildRequest . "\r\n";
$buildHeaders .= "HTTP/1.0\r\n";
$buildHeaders .= "Host:localhost\r\n";
$buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
$buildHeaders .= "\r\n";

fputs($openSocket, $buildHeaders);
while (!feof($openSocket)) {
    fgets($openSocket, 128);
}
fclose($openSocket);

$newDomain = "http://" . $subDomain . "." . $rootDomain . "/";
echo 'Your domain is registered as: ' . $newDomain;

$query = "UPDATE ttep_teacher SET website = '{$newDomain}' WHERE username = '{$username}'";
$result = mysqli_query($conn, $query);
}




 $domain = "teacherstribe.net"; // Replace "example.com" with your own domain
$folderPath = $subDomain;
$content = "<?php
// Redirect to the desired URL
header('Location: http://www.teacherstribe.net/web_app/my_site/1/cv.php?username=$username');
exit(); // Make sure to exit immediately after redirection
?>

";
$filename = "index.php";

// Create the PHP file with specific content.
$file = fopen("/home/efqlckyo/". $folderPath . "/" . $filename, "w");

fwrite($file, $content);
fclose($file);
 




?>