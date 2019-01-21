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
        <div>
        <a class="title">
			Web App Store
		</a>
		<div class="logout_container">
            <form action = "" method = "post">
                <input type="submit" class="logout" name="logout" value="Logout">
            </form>
        </div>
</div>
    </div>
  
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="containerUploading shadow">
                <h2>Upload application:</h2>
                <hr>
                <a class="child">
                    <p><b>Name of the app:</b></p>
                    <input type="text" id="appName" name="appName" required>
                </a>

                <a class="child">
                    <p><b>Description of the app:</b></p>
                    <textarea rows="4" id="appDescription" name="appDescription" required></textarea>
                </a>

                <a class="child">
                    <p><b>Add image/logo:</b></p>
                    <input type="file" name="imageToUpload" id="imageToUpload" required>
                </a>

                <a class="child">
                    <p><b>Add your app:</b></p>
                    <input type="file" name="appToUpload" id="appToUpload" required>
                </a>
                <a class="child">
                    <input type="submit" value="Upload" name="upload" class="upload">
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