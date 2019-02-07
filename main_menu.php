<?php
	
		session_start();
		if(isset($_SESSION['name'])){
		}
		else{
			header("location: login.php");
		}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="ui_style.css">
	<link rel="stylesheet" type="text/css" href="inputbox_style.css">
	<link rel="stylesheet" type="text/css" href="button_style.css">
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="main_script.js"></script>
	<title>POS</title>
</head>
<body>
		<!-- Header Section
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->

	<header id="header">
	  <div class="main_nav sticky">
	    <div class="container">
	      <div class="mobile-toggle"> <span></span> <span></span> <span></span> </div>
	      <nav>
	        <ul>
						<li><a class="smoothscroll" href="profile.php"><?php echo $_SESSION['name']; ?></a></li>
	          <li><a class="smoothscroll" href="pos.php">Point Of Sale</a></li>
	          <li><a class="smoothscroll" href="inventory.php">Inventory</a></li>
	          <li><a class="smoothscroll" href="history.php">Transaction History</a></li>
	          <li><a class="smoothscroll" href="logout.php">Logout</a></li>
	        </ul>
	      </nav>
	    </div>
	  </div>

	  <div class="title">
	    <div><span><img class="logo" src="logo.png"></img></span></div>
	    <h1 class="heading">Welcome <?php echo $_SESSION['name']; ?>!</h1>
	    <h2 class="heading">By Dy and Cabillian</h2>
	    <a class="smoothscroll" href="#menu">
	    <div class="mouse">
	      <div class="wheel"></div>
	    </div>
	    </a> </div>
	  <a class="smoothscroll" href="#menu">
	  <div class="scroll-down"></div>
		</a>
	</header>
	<section id="menu">
		<div class="container">
			<div class="row">
				<h1>Menu</h1>
				<div class="block"></div>
			</div>
			<div class="row">
				<center>
				<div class="four columns"> <a href="pos.php"> <img src="pos_icon.png" width="220" height="220" alt=""/> </a>
					<h4>Point Of Sale</h4>
					<p>Start Selling</p>
				</div>
				<div class="four columns"> <a href="inventory.php"> <img src="inventory_icon.png" width="220" height="220" alt=""/> </a>
					<h4>Inventory</h4>
					<p>Update Inventory</p>
				</div>
				<div class="four columns"> <a href="inventory.php"> <img src="history_icon.png" width="220" height="220" alt=""/> </a>
					<h4>Transaction History</h4>
					<p>View Transaction History</p>
				</div>
				<button class="btn" onclick="location.href='logout.php'">
					<span>Logout</span>
				</button>
				</center>
			</div>
		</div>
	</section>

	<footer>
	  <div class="container">
	      <p>Dy & Cabillian	 ©2018 Copyright.</p>
	    </div>
	</footer>


</body>

</html>