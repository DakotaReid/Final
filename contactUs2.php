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
	<link rel="stylesheet" href="files/HOAPrint.css" media="print" />
	<style>
		main form {
			width: 467px;
		}

		main label {
			width: 8em;
			margin-right: 1em;
			float: left;
		}

		main input, {
			display: block;
		}

		main select {
			display: block;
			width: 180px;
			margin-bottom: 1em;
			padding: .25em;
		}

		#textBox {
			display: flex;
			margin-bottom: 1em;
		}

		footer {
			height: 18px;
		}

		footer a,
		footer a:visited {
			color: white;
		}

		footer a:hover {
			text-decoration: none;
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

			echo "<h2>" . $subject . "</h2>";
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

				<label for="address">Address:</label>
				<input type="text" name="address" required="required" />

				<label for="city">City:</label>
				<input type="text" name="city" required="required" />

				<label for="state">State:</label>
				<select name="state" required="required">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>				

				<label for="zip">ZIP:</label>
				<input type="text" name="zip" required="required" />

				<label for="email">Email:</label>
				<input type="email" name="email" required="required" />

				<label for="phone">Phone Number:</label>
				<input type="text" name="phone" required="required" />

				<label for="content">Content:</label>
				<div id="textBox">
					<textarea name="content" rows="10" cols="50"></textarea>
				</div>

				<input type="submit" name="submit" value="Submit" style="float: right; margin-bottom: 5em" />
				<input type="reset" name="clearForm" value="Clear Form" style="margin-right: 1em; float: right;" />

				<input type="checkbox" /><input type="radio" /><input type="checkbox" /><input type="radio" />
				<br />
				<input type="radio" /><input type="checkbox" /><input type="radio" /><input type="checkbox" />
			</form>
		</main>
	<?php
		}
	?>
	</div>

	<footer>
		<p style="float: left;">&copy;Renaissance Villas Owners Association. All rights reserved.</p>
		<a href="mailto:admin@RenaissanceVillas.com" style="float: right;">Contact Us!</a>
	</footer>
</body>
</html>