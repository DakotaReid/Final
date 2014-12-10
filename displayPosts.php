<?php session_start(); ?>

<?php
	include ('loginFunctions.php');

	if(!isValidUser() || !isAdmin()) {
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
		div.left {
			width: 45%;
			float: left;
		}

		div.right {
			width: 45%;
			float: right;
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
					<a href="adminOptions.php">Admin Options</a>
				</li>
				<li>
					<a href="addPost.php">Add Post</a>
				</li>
				<li>
					<a href="displayPosts.php" class="active">Display/Modify Posts</a>
				</li>
				<li>
					<a href="addMember.php">Add User</a>
				</li>
				<li>
					<a href="displayMembers.php">Display/Modify Users</a>
				</li>
				<li id="login">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</nav>
	</header>

	<div id="container">
		<main>
			<div class="left">
				<h1>Bulletin Board</h1>
				<?php include("bulletinBoard.php"); ?>
			</div>

			<div class="right">
				<h1>Bulletin Board Requests</h1>
				<?php include("bulletinBoardRequests.php"); ?>
			</div>

			<a href="adminOptions.php" class="return">Return to Admin Options</a>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>