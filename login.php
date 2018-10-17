<?php
	header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
 
	require 'connect.php';

	session_start();
	if(isset($_SESSION['name'])){
		header("location: main_menu.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="ui_style.css">
	<link rel="stylesheet" type="text/css" href="inputbox_style.css">
	<link rel="stylesheet" type="text/css" href="button_style.css">

	<title>Fucking POS</title>

</head>
<body>
	<!-- Header-->
	<header id="header">
	  <div class="main_nav">
	    <div class="container">
	      <div class="mobile-toggle">
	      	<span></span>
	      	<span></span>
	      	<span></span>
	      </div>
	    </div>
	  </div>
	  <div class="title">
	  	<div><span>
	  		<img class="logo" src="logo.png"></img>
	  	</span></div>
	    <h1 class="heading">F*cking POS</h1>
	    <h2 class="heading">By HalfByte</h2>
	    </a> </div>
	  	<a class="smoothscroll" href="#login">
	  	<div class="scroll-down"></div>
		</a>
	</header>

	<!-- Login-->
	<section id="login">
		<div class="container">
			<div class="row">
				<h1>Login</h1>
				<div class="block" style="width: 10%"></div>
			</div>
		</div>
		<form method="POST" action="login_controller.php">
			<center>
				<div class="login_container">
					<div class="group">
					    <input type="username" required name="usrnm">
					    <span class="highlight"></span>
					    <span class="bar"></span>
					    <label>Username</label>
					    </div>
					      
					    <div class="group">      
					      <input type="password" required name="psswrd">
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Password</label>
					    </div>
					    <button class="btn" type="submit" name="submit">
			    			<span>Log-in</span>
						</button>
				</div>
			</center>
		</form>
	</section>


	<!--About-->
	<section id="about">
	  <div class="container">
	      <h1>About HalfByte</h1>
	      <div class="block" style="width: 30%;"></div>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	  </div>
	</section>

	<!-- Footer-->  

	<footer>
	  <div class="container">
	      <p>HalfByte ©2018 Copyright.</p>
	    </div>
	</footer>

</body>


</html>


