<?php session_start(); ?>

<?php include ('loginFunctions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Dakota Reid" />
	<meta name="description" content="Renaissance Villas Owners Association Articles and Bylaws Page">
	<meta name="keywords" content="Renaissance, Villas, Owners, Association, Articles, Bylaws, Page">
    <title>Renaissance Villas Owners Association Articles and Bylaws</title>
    <link rel="stylesheet" href="files/HOA.css" />
	<style>
		iframe {
			width: 100%;
			height: 1000px;
			margin-bottom: 1em;
			border: none;
		}
	</style>
	<script src="files/formControl.js"></script>
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
					<a href="articlesAndBylaws.php" class="active">Articles and Bylaws</a>
				</li>
				<li>
					<a href="contactUs.php">Contact Us</a>
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
			<h1>Articles and Bylaws</h1>
			<iframe src="http://www.suncityhoa.org/wp-content/uploads/2013/11/Bylaws.pdf#zoom=100"></iframe>
        </main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>
