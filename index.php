<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
	<link type="text/css" href="css/styles.css" rel="stylesheet">
	<link type="text/css" href="css/index_styles.css" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<a class="title" target='' href='app/applications.php'>
			<img class='logo' src='images/logo.png'>
		</a>
		<div class="container">
			<a href="authentication/register.php">
				Register
			</a>
			<a href="authentication/login.php">
				Login
			</a>
		</div>
	</div>
	<?php
		include('server/server.php');
		session_start();
		if(isset($_SESSION['username'])){
			header('Location:app/applications.php');
		}
	?>
	<div class="main">
		<p class="user_message">Welcome to <b>Web App Store</b>! If you want to see the applications, please register first.</p>
	</div>
</body>