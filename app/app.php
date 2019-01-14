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
				<input type="submit" class="logout" name="logout" value="Logout">
			</a>
        </div>
    </div>
    
    <div class="main">
        <div class="wrapper" style="background-image: url(../images/background.jpg);">
        </div>
    </div>
</body>

<?php
	 if(!isset($_SESSION['username'])){
	//	header('Location:../index.php');
		// $_SESSION['username'] = "admin"; // todo: sometimes when there is a problem with coockies uncomment this row
	 }
?>