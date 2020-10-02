<?php  
ob_start();
session_start();
$timezone=date_default_timezone_get("Asia/Kolkata");
$host="localhost";
$name="root";
$pass="";
$db="onlinesubmission";
$con=mysqli_connect($host,$name,$pass,$db);

if(mysqli_connect_errno())
{ 
	echo "Failed To Connect" .mysqli_connect_errno();
} 
?> 