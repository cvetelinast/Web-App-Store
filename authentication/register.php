<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store</title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/login_styles.css" rel="stylesheet">
	<link rel="icon" href="../images/icon.png">
</head>
<body>

<div class="navbar navbar-fixed-top">
		<a class="title" target='' href='../app/applications.php'>
			<img class='logo' src='../images/logo.png'>
		</a>
		<div class="container">
            <a href="login.php">
				Login
			</a>
        </div>
        <div class="container">
            <a href="../index.php">
				Home
			</a>
		</div>
</div>

<?php 
	include('../server/server.php');
	session_start();
	if(isset($_SESSION['username'])){
		header('Location:../app/applications.php');
	} 
?>

<div class="main">
	<form action = "" method = "post">
	<?php include('../config/errors.php'); ?>
		<div class="register">
			<input type="text" placeholder="Username" id="username" name="username" required>
			<input type="password" placeholder="Password" id="password" name="password" required>
			<input type="password" placeholder="Repeat password" id="repeat_password" name="repeat_password" required>
			<input type="submit" name="register" value="Register">
		</div>
		<div class="shadow"></div>
	</form>
</div>
</body>