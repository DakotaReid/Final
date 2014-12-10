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
	<title>Add Post</title>
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
			toolbar1: "insertfile undo redo | styleselect | bold italic | bullist numlist | outdent indent | link image | media preview",
			image_advtab: true
		});
	</script>

	<?php
		include ("dbConnectFromForm.php");

		$timezone = new DateTimeZone('America/Chicago');

		$subject = $_POST['subject'];
		$content = $_POST['content'];
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
					<a href="adminOptions.php">Admin Options</a>
				</li>
				<li>
					<a href="addPost.php" class="active">Add Post</a>
				</li>
				<li>
					<a href="displayPosts.php">Display/Modify Posts</a>
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
			if(!$link) {
				die("<h2>Connect Error: " . mysqli_connect_error() . "</h2>");
			}
			else if(isset($_POST['addPost'])) {
				$sql = "INSERT INTO bulletin (";
				$sql .= "subject, ";
				$sql .= "content, ";
				$sql .= "date_posted ";

				$sql .= ") VALUES (";
				$sql .= "'$subject',";
				$sql .= "'$content',";
				$sql .= "'$date_posted'";
				$sql .= ");";

				if(mysqli_query($link, $sql)) {
					echo "<h1>Your post has been added.</h1>";
					include ("bulletinBoard.php");
				}
				else {
					echo "<h2>You have encountered a problem.</h2>";
					echo "<h3 style='color: red'>" . mysqli_error($link) . "</h3>";
				}

				$sql = "SELECT * FROM members";
				$result = mysqli_query($link, $sql);

				if(!$result) {
					echo mysqi_error($link);
				}

				while($row = mysqli_fetch_array($result)) {
					$to = $row['member_email'];
					$subject = "There is a new post on the bulletin board.";
					$body = "There is a new post on the bulletin board.";
					$headers = "From: admin@RenaissanceVillas.com";

					mail($to, $subject, $body, $headers);
  				}

				mysqli_close($link);
			}
			else {
		?>
			<h1>Add a new Post</h1>

			<form name="postForm" method="post" action="addPost.php">
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
			<a href="adminOptions.php" class="return">Return to Admin Options</a>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>