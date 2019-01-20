<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web App Store </title>
	<link type="text/css" href="../css/styles.css" rel="stylesheet">
	<link type="text/css" href="../css/app_styles.css" rel="stylesheet">
	<link type="text/css" href="../css/app_list_styles.css" rel="stylesheet">
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
		<div class="containerListApps">
				<form action = "" method = "post">
					<input type="submit" class="add_app" name="add_app" value="Add application">
				</form>
				<h2>Applications:</h2>
				<?php
					include('../server/server.php');
					session_start();
					if(!isset($_SESSION['username'])){
						header('Location:../index.php');
					}

					$result = getApplications();
					foreach($result as $item) {
						$id = $item['ID'];
						$logo = $item['LOGO'];
						$logoBase64   = base64_encode($logo);

						$result =
						"<div class='responsive'>".
							"<div class='gallery'>".
								"<a target='_blank' href='application.php?id=$id'>".
									"<img src='data:image/jpg;base64,$logoBase64'>" .
								"</a>".
								"<div class='desc'>". $item['NAME'] ."</div>".
							"</div>".
						"</div>";
						echo $result;
					}
					echo "<div class='clearfix'></div>";
				?>
        </div>
    </div>
</body>