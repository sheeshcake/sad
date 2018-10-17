<?php
	session_start();
	unset($_SESSION['name']);
	session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<title>F*CKING POS</title>
</head>
<body>

	<p>Logging out...
		<?php
			header("location: main_menu.php");
		?></p>

</body>
</html>