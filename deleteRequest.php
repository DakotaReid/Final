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
	<title>Delete Post</title>
	<link rel="icon" href="../../images/table_delete.ico" />
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
		<?php
			include ("dbConnectFromForm.php");

			$deletePostNum = $_GET['post_num'];

			if(isset($_POST['confirmButton'])) {
				$sql = "DELETE FROM bulletin_request WHERE post_num = $deletePostNum";
	
				if(mysqli_query($link, $sql)) {
					echo "<h1>The post has been successfully deleted.</h1>";
					include("bulletinBoard.php");
				}
				else {
					echo "<h2>You have encountered a problem.</h2>";
					echo "<h3 style='color: red'>" . mysqli_error($link) . "</h3>";
				}

				mysqli_close($link);
			}
			else {
		?>
			<h1 style="margin-bottom: 0;">Are you sure that you want to delete this post?</h1>
			<h2 style="margin-top: 0;">(This cannot be undone!)</h2>

			<form style="float: left" name="confimation" method="post" action="deletePost.php?post_num=<?php echo $deletePostNum; ?>">
				<input type="submit" name="confirmButton" value="Yes" />
			</form>

			<form name="notConfirmed" method="post" action="bulletinBoard.php">
				<input type="submit" name="declineButton" value="No"  style="margin-left: 1em" />
			</form>
		<?php
			}
		?>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>