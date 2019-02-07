<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$sername = "localhost"
$username = "root"
$password = "";
$dbname = "pos_system"
 
//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection error:".mysqli_connect_error());
}else{
	echo "connection successful!";
}
?>