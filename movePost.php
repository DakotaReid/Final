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
	<title>Move Post</title>
	<link rel="icon" href="../../images/form_edit.ico" />
	<link rel="stylesheet" href="files/HOA.css" />

	<?php
		include ("dbConnectFromForm.php");

		$post_num = $_GET['post_num'];

		$movePostNum = $_GET['post_num'];
		$sql = "SELECT * FROM bulletin_request WHERE post_num = $movePostNum";
		$result = mysqli_query($link, $sql);

		if(!$result) {
			echo "<h1>There was an error while processing your request.</h1>";
			die( "<h2>" . mysqli_error($link) . "</h2>") ;
		}

		$row = mysqli_fetch_array($result);

		$subject = $row['subject'];
		$content = $row['content'];
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
		<?php  ?>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>

	
	<div id="container">
		<main>
		<?php
			if(isset($_POST['updatePost'])) {
				$sql = "UPDATE bulletin SET " ;
				$sql .= "subject='$subject', ";
				$sql .= "content='$content' ";
				$sql .= " WHERE (post_num='$post_num')";
	
				if(mysqli_query($link, $sql)) {
					echo "<h1>The post has been successfully updated.</h1>";
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
			<!-- Code -->
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