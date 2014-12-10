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
	<title>Edit Post</title>
	<link rel="icon" href="../../images/form_edit.ico" />
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
			toolbar1: "insertfile undo redo | styleselect | bold italic | bullist numlist | outdent indent | link image | media preview",
			image_advtab: true
		});
	</script>

	<?php
		include ("dbConnectFromForm.php");

		$post_num = $_GET['post_num'];
		$subject = $_POST['subject'];
		$content = $_POST['content'];

		$updatePostNum = $_GET['post_num'];
		$sql = "SELECT * FROM bulletin WHERE post_num = $updatePostNum";
		$result = mysqli_query($link,$sql);

		if(!$result) {
			echo "<h1>You have encountered a problem with your update.</h1>";
			die( "<h2>" . mysqli_error($link) . "</h2>") ;
		}

		$row = mysqli_fetch_array($result);
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
			<h1>Update Post</h1>

			<form name="postForm" method="post" action="editPost.php?post_num=<?php echo $updatePostNum; ?>">
				<label for="subject">Subject:</label>
				<input type="text" name="subject" size="45" value="<?php echo $row['subject']; ?>" required="required" />

				<label for="content">Content:</label>
				<div id="textBox">
					<textarea name="content" rows="10" cols="50"><?php echo $row['content']; ?></textarea>
				</div>

				<input type="submit" name="updatePost" value="Edit Post" style="float: right;" />
				<input type="reset" name="clearForm" value="Clear Form" style="margin-right: 1em; float: right; display: none;" />
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