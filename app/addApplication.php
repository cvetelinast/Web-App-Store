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
			Web App Store
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="containerUploading">
                <h2>Upload application:</h2>
                <a class="child">
                    <p> Name of the app: </p>
                    <input type="text" id="appName" name="appName" required>
                </a>

                <a class="child">
                    <p> Description of the app: </p>
                    <textarea rows="4" cols="50" id="appDescription" name="appDescription" required></textarea>
                </a>

                <a class="child">
                    <p> Add image/logo: </p>
                    <input type="file" name="imageToUpload" id="imageToUpload" required>
                </a>

                <a class="child">
                    <p> Add your app: </p>
                    <input type="file" name="appToUpload" id="appToUpload" required>
                </a>
                <a class="child">
                    <input type="submit" value="Upload" name="upload">
                </a>
            </div>
        </form>
    </div>
</body>

<?php
    include('../server/server.php');
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location:../index.php');
	}
?>