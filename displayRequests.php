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
		footer {
			width: 100%;
			position: fixed;
			bottom: 0;	
		}
	</style>
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
			<h1>Bulletin Board</h1>

			<?php include("bulletinBoardRequests.php"); ?>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>