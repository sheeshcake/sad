<?php
require 'connect.php';
	// session_start();


	// if(isset($_POST['submit'])) {
		
		$search = $_POST['search'];


		$sql = 'SELECT * from products'.' WHERE product_name LIKE "' . $search . '%"';
		$query = mysqli_query($conn, $sql);
		while ($row  = mysqli_fetch_array($query)) {
			echo $row['product_id'] . " " .  $row['product_name'] . " " . $row['product_price'];
		}
	// }
	// else{
	// 	echo "<script>alert('ERROR');</script>";
	// 	// header("location: pos.php");
	// }

?>