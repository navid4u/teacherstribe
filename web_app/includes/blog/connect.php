<?php
ob_start();
session_start();

$dbhost 	= "localhost";
$dbuser 	= "efqlckyo_navid";
$dbpass 	= "Nasr6620514";
$dbname 	= "efqlckyo_ttep";
$charset 	= "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon,$dbname);
mysqli_set_charset($dbcon,$charset);


 