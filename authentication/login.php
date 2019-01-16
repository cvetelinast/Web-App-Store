<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store</title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/login_styles.css" rel="stylesheet">
	<link rel="icon" href="../images/icon.png">
</head>
<body>

<div class="navbar navbar-fixed-top">
        <a class="title">
			Web Apps Store
		</a>
		<div class="container">
			<a href="register.php">
				Register
			</a>
		</div>
		<div class="container">
            <a href="../index.php">
				Home
			</a>
		</div>
</div>

<?php include('../server/server.php') ?>
<div class="main">
	<form action = "" method = "post">
	<?php include('../config/errors.php'); ?>
		<div class="login">
			<input type="text" placeholder="Username" id="username" name="username" required>  
			<input type="password" placeholder="Password" id="password" name="password" required>  
			<input type="submit" name="login" value="Sign In">
		</div>
		<div class="shadow"></div>
	</form>
</div>
</body>