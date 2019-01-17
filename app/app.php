<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/app_styles.css" rel="stylesheet">
	<link rel="icon" href="../images/icon.png">
</head>
<body>

	<div class="navbar navbar-fixed-top">
        <a class="title">
			Web Apps Store
		</a>
		<div class="container">
            <a>
				<form action = "" method = "post">
					<input type="submit" class="logout" name="logout" value="Logout">
				</form>
			</a>
        </div>
    </div>

    <div class="main">
        <div class="wrapper" style="background-image: url(../images/background.jpg);">
        </div>
		<div class="container">
				<form action = "" method = "post">
					<input type="submit" class="add_app" name="add_app" value="Add application">
				</form>
        </div>
    </div>
</body>

<?php include('../server/server.php') ?>

<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location:../index.php');
	}
?>