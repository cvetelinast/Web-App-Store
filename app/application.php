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

		<div class="reviews_container">
			<h2>Add review:</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="containerUploading">
					<a class="child">
						<p>Evaluate app quality from 2 to 6:</p>
						<select name="score">
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</a>
					<a class="child">
						<p>Add comment:</p>
						<textarea rows="4" cols="50" id="comment" name="comment" required></textarea>
					</a>
					<?php
					$id = $_GET['id'];

					$result =
					"<a class='child'>".
						"<button type='submit' class='add_review' name='add_review_for_application' value='$id'>Add</button>".
					"</a>";
					echo $result;
					?>
				</div>
			</form>
			<h2>Reviews:</h2>
				<div class="containerUploading">
					<?php
						$sumOfScores = 0;
						$result = "";

						$reviews = getReviewsForApplication($_GET['id']);
						foreach($reviews as $item) {
							$score = $item['SCORE'];
							$comment = $item['COMMENT'];
							$reviewerName = $item['REVIEWER_NAME'];

							$sumOfScores += $score;

							$result.=
							"<a class='child'>".
							"<p><b>Reviewer:</b> $reviewerName</p>".
							"<p><b>Score:</b> $score</p>".
							"<p><b>Comment:</b> $comment</p>".
							"</a>";
						}
						$averageScore = 0;
						$stars ="";
						if(sizeof($reviews)!==0){					
							$averageScore = round($sumOfScores/sizeof($reviews),2);
							$countStars = round($sumOfScores/sizeof($reviews));
							for($x = 0; $x < $countStars; $x++ ){
								$stars.="&#9733";
							}
						}
						echo "<p>Average score: $averageScore $stars";
						echo $result;
					?>
				</div>
		</div>
	</div>
	
</body>