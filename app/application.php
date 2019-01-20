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
    </div>
    <div class="containerApplication">
		<?php
			include('../server/server.php');
			$application = getApplication($_GET['id']);

			$id = $application['ID'];
			$name = $application['NAME'];
			$description = $application['DESCRIPTION'];
			$logo = $application['LOGO'];
			$logoBase64   = base64_encode($logo);
			$source = $application['SOURCE'];

			$result =  "<a class='childApplicationDetails'>" .
			"<img src=data:image/jpg;base64,".$logoBase64.">" .
			"</a>".
			"<a class='childApplicationDetails'>" .
			"<h1>" .$name . "</h1>".
			"<p>" .$description . "</p>".
			"<form action = 'download.php' method = 'get'>".
			"<button type='submit' class='download' name='id' value='$id'>Download</button>".
			"</form>".
			"</a>";
			
			echo $result;

		?>
    </div>

	
</body>