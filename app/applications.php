<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/app_list_styles.css" rel="stylesheet">
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

    <div class="main">
        <div class="wrapper" style="background-image: url(../images/background.jpg);">
        </div>
		<div class="containerListApps">
				<div class="top_controls">
					<form action = "" method = "post">
						<input type="submit" class="add_app" name="add_app" value="Add application">
					</form>
					<h1>Applications:</h1>
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

					$result = getApplications();
					$output = "<ul class='container_gallery'>";
					
					foreach($result as $item) {
						$id = $item['ID'];
						$logo = $item['LOGO'];
						$logoBase64   = base64_encode($logo);

						$output.=
						"<div class='responsive'>".
							"<div class='gallery'>".
								"<a target='' href='application.php?id=$id'>".
									"<img class='cardImage' src='data:image/jpg;base64,$logoBase64'>" .
								"</a>".
								"<div class='desc'>". $item['NAME'] ."</div>".
							"</div>".
						"</div>";
					}
					$output .= "</ul>";
					echo $output;
				?>
        </div>
    </div>
</body>