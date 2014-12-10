<?php session_start(); ?>

<?php
	include ('loginFunctions.php');

	if(!isValidUser()) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request Post</title>
	<link rel="icon" href="../../images/table_add.ico" />
	<link rel="stylesheet" href="files/HOA.css" />
	<style>
		form {
			width: 596px;
		}

		label {
			display: block;
			width: 5em;
			margin-right: 1em;
			float: left;
		}

		input {
			display: block;
		}

		#textBox {
			display: flex;
			margin-bottom: 1em;
		}

		footer {
			width: 100%;
			position: fixed;
			bottom: 0;	
		}
	</style>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: "textarea",
			theme: "modern",
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"template paste textcolor colorpicker textpattern"
			],
			toolbar1: "insertfile undo redo | styleselect | bold italic | bullist numlist | outdent indent | media image | link preview",
			image_advtab: true
		});
	</script>

	<?php
		include ("dbConnectFromForm.php");

		$timezone = new DateTimeZone('America/Chicago');

		$subject = $_POST['subject'];
		$content = $_POST['content'];
		$postedBy = $_SESSION['username'];
		$date_posted = new DateTime(null, $timezone);
		$date_posted = $date_posted->format('Y-m-d');
	?>
</head>

<body>
	<header>
		<span class="logo">
			<a href="index.php"><img src="images/Renaissance_Villas.png" alt="logo" /></a>
		</span>

		<nav id="navBar">
			<ul>
				<li>
					<a href="memberOptions.php">Member Options</a>
				</li>
				<li>
					<a href="requestPost.php" class="active">Request a Post</a>
				</li>
				<li>
					<a href="displayPostsForMembers.php">Display Posts</a>
				</li>
				<li id="login">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</nav>
	</header>

	<div id="container">
		<main>
		<?php
			if(!$link) {
				die("<h2>Connect Error: " . mysqli_connect_error() . "</h2>");
			}
			else if(isset($_POST['addPost'])) {
				$sql = "INSERT INTO bulletin_request (";
				$sql .= "subject, ";
				$sql .= "content, ";
				$sql .= "posted_by, ";
				$sql .= "date_posted ";

				$sql .= ") VALUES (";
				$sql .= "'$subject',";
				$sql .= "'$content',";
				$sql .= "'$postedBy',";
				$sql .= "'$date_posted'";
				$sql .= ");";

				if(mysqli_query($link, $sql)) {
					echo "<h1>Your request has been sent to an admin.</h1>";
		?>
				<div id="postContainer">
					<div class="post">
						<span class="subject"><h2><?php echo $subject; ?></h2></span>
						<span class="content"><p><?php echo $content; ?></p></span>
  						<span class="datePosted">Date Requested: <?php echo $date_posted; ?></span>
					</div>
				</div>
		<?php
				}
				else {
					echo "<h2>You have encountered a problem.</h2>";
					echo "<h3 style='color: red'>" . mysqli_error($link) . "</h3>";
				}

				$to = "admin@RenaissanceVillas.com";
				$subject = "There is a new request for the bulletin board.";
				$body = $postedBy . " has requested a post for the bulletin board.";
				$sql = "SELECT * FROM members WHERE member_name = '" . $postedBy . "'";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				$headers = "From: " . $row['member_email'];

		?>
			<p><?php echo $headers; ?></p>
			<p><?php echo $subject; ?></p>
			<p><?php echo $body; ?></p>
		<?php
				mail($to, $subject, $body, $headers);

				mysqli_close($link);
			}
			else {
		?>
			<h1>Request a new Post</h1>

			<form name="postForm" method="post" action="requestPost.php">
				<label for="subject">Subject:</label>
				<input type="text" name="subject" size="45" required="required" />

				<label for="content">Content:</label>
				<div id="textBox">
					<textarea name="content" rows="10" cols="50"></textarea>
				</div>

				<input type="submit" name="addPost" value="Add Post" style="float: right;" />
				<input type="reset" name="clearForm" value="Clear Form" style="margin-right: 1em; float: right;" />
			</form>
		<?php
			}
		?>
			<a href="memberOptions.php" class="return">Return to Member Options</a>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>