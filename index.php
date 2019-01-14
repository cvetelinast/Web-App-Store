<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
    <link type="text/css" href="css/styles.css" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
</head>
<body>

	<div class="navbar navbar-fixed-top">
        <a class="title">
			Web Apps Store
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
	
	<?php include('server/server.php') ?>
	<?php 
		if(isset($_SESSION['username'])){
			// todo: delete the two rows below when the project is ready
			session_destroy();
    		unset($_SESSION['username']);
			//header('Location:app.php'); // todo: uncomment when the project is ready
		}
	?>
    <div class="main">
        <div class="wrapper" style="background-image: url(images/background.jpg);">
        </div>
    </div>
</body>