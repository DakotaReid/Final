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
    <title>Display Posts</title>
	<link rel="icon" href="../../images/table.ico" />
	<link rel="stylesheet" href="files/HOA.css" />
	<style>
		#postContainer {
			margin-bottom: 1em;
		}
	</style>
	<script src="files/formControl.js"></script>
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
					<a href="requestPost.php">Request a Post</a>
				</li>
				<li>
					<a href="displayPostsForMembers.php" class="active">Display Posts</a>
				</li>
				<li id="login">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</nav>
	</header>

	<div id="container">
		<main>
			<h1>Bulletin Board</h1>

			<?php include("bulletinBoard.php"); ?>

			<a href="memberOptions.php" class="return">Return to Member Options</a>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>