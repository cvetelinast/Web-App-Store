<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=utf-8>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/app_styles.css" rel="stylesheet">
	<link rel="icon" href="../images/icon.png">
</head>
<body>

	<div class="navbar navbar-fixed-top">
        <a class="title" target='' href='../app/applications.php'>
			<img class='logo' src='../images/logo.png'>
		</a>
            <div class="logout_container">
                <form action = "" method = "post">
                    <input type="submit" class="logout" name="logout" value="Logout">
                </form>
            </div>
    </div>
    <?php
        include('../server/server.php');
        session_start();
        if(!isset($_SESSION['username'])){
            header('Location:../index.php');
        }
        if (isset($_SESSION['last_activity']) && 
            (time() - $_SESSION['last_activity']) > $timeout_duration) {
            session_unset();
            session_destroy();
            session_start();
            header('Location:../index.php');
        }
        $_SESSION['last_activity'] = time();
    ?>
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="containerUploading shadow">
            <?php include('../config/errors.php'); ?>
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