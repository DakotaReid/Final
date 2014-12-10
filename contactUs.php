<?php session_start(); ?>

<?php include ('loginFunctions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Dakota Reid" />
	<meta name="description" content="Renaissance Villas Owners Association Contact Us Page">
	<meta name="keywords" content="Renaissance, Villas, Owners, Association, Contact, Us, Page">
	<title>Contact Us</title>
	<link rel="stylesheet" href="files/HOA.css" />
	<style>
		main form {
			width: 596px;
		}

		main label {
			display: block;
			width: 5em;
			margin-right: 1em;
			float: left;
		}

		main input {
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
	<script src="files/formControl.js"></script>
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
			toolbar1: "insertfile undo redo | styleselect | bold italic | bullist numlist | outdent indent | link image | media preview",
			image_advtab: true
		});
	</script>
</head>

<?php
	if(!isset($_POST['submitLogin'])) {
?>
<body>
<?php
	}
	else {
?>
<body onload="toggle()">
<?php
	}
?>
	<header>
		<span class="logo">
			<a href="index.php"><img src="images/Renaissance_Villas.png" alt="logo" /></a>
		</span>

		<nav id="navBar">
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="aboutUs.php">About Us</a>
				</li>
				<li>
					<a href="articlesAndBylaws.php">Articles and Bylaws</a>
				</li>
				<li>
					<a href="contactUs.php" class="active">Contact Us</a>
				</li>
				<li id="login">
				<?php
					if(!isValidUser()) {
				?>
					<a href="javascript:toggle()">Login</a>
				<?php
					}
					else if(isAdmin()) {
				?>
					<a href="adminOptions.php">Admin Options</a>
				<?php
					}
					else {
				?>
					<a href="memberOptions.php">Member Options</a>
				<?php
					}
				?>
				</li>
			</ul>
		</nav>
	</header>

	<?php
		displayOptionsOrForm();
	?>

	<div id="container">
		<main>
	<?php
		if(isset($_POST['submit'])) {
			$timezone = new DateTimeZone('America/Chicago');
			$date = new DateTime(null, $timezone);

			$to = "<insert admin email>";
 			$subject = "Has contacted you." . $_POST['name'];
			$body = $_POST['content'];
			$headers = "From: " . $email;

			echo "<h2>" . $body . "</h2>";
			echo $date->format('m\/d\/Y g:i A') . "<br />";

			mail($to, $subject, $body, $headers);
	?>

	<?php
		}
		else {
	?>
			<h1>Contact Us</h1>

			<form name="contactForm" method="post" action="contactUs.php">
				<label for="name">Name:</label>
				<input type="text" name="name" required="required" />

				<label for="email">Email:</label>
				<input type="email" name="email" required="required" />

				<label for="content">Content:</label>
				<div id="textBox">
					<textarea name="content" rows="10" cols="50"></textarea>
				</div>

				<input type="submit" name="submit" value="Submit" style="float: right;" />
				<input type="reset" name="clearForm" value="Clear Form" style="margin-right: 1em; float: right;" />
			</form>
		</main>
	<?php
		}
	?>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>