<?php

require 'connect.php';

if(isset($_POST['submit'])) {

	$u = $_POST['usrnm'];
	$p = $_POST['psswrd'];
	$n = $_POST['name'];


	$sql = 'INSERT INTO users (name,username,password) values("'. $n . '","'. $u .'","' . $p. '")';
	if (mysqli_query($conn, $sql)) {
    	echo "<script>alert('Account Successfully Created!');window.location.href='login.php#login';</script>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}

