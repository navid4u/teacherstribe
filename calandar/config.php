<?php

$host = "localhost"; /* Host name */
$user = "efqlckyo_navid"; /* User */
$password = "Nasr6620514"; /* Password */
$dbname = "efqlckyo_ttep"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


?>