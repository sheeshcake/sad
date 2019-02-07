<?php
	
	require 'connect.php';
	session_start();

	if(isset($_POST['btn-value'])){
		$u = $_POST['btn-value'];
		$sql = "SELECT * from products WHERE product_name='" . $u . "'" ;
		$query = mysqli_query($conn, $sql);
		while ($row  = mysqli_fetch_array($query)) {
			header("location: pos.php");
			echo "javascript: addProducts();";
		}
	}else{
		echo "ERROR!!";
	}

?>