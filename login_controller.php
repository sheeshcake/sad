
<?php

require 'connect.php';
session_start();
$_SESSION['loggedin'] = false;

if(isset($_POST['submit'])) {
	
	$u = $_POST['usrnm'];
	$p = $_POST['psswrd'];

	$sql = 'SELECT * from users'.' WHERE username =   "'  . $u  . '" AND password = "'. $p . '"';
	$query = mysqli_query($conn, $sql);
	if($query){
		if (mysqli_num_rows($query) == 1) {
			while ($row = mysqli_fetch_array($query)) {
				$_SESSION['name'] = $row['name'];
				header("location: main_menu.php");
			}
		}
		else{
			echo "<script>alert('Wrong Username or Password!');window.location.href='login.php#login';</script>";
		}
	}
	else{
		echo "<script>alert('Oops! An error has occured!')</script>";
	}

	//mysqli_close($conn);
}