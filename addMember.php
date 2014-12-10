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
	<title>Add Member</title>
	<link rel="icon" href="../../images/table_add.ico" />
	<link rel="stylesheet" href="files/HOA.css" />
	<style>
		form {
			width: 324px;
		}

		label {
			display: block;
			width: 8em;
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

	<?php
		include ("dbConnectFromForm.php");

		$timezone = new DateTimeZone('America/Chicago');

		$username = $_POST['username'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
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
					<a href="displayPosts.php">Display/Modify Posts</a>
				</li>
				<li>
					<a href="addMember.php" class="active">Add User</a>
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
			else if(isset($_POST['addMember'])) {
				$sql = "INSERT INTO members (";
				$sql .= "member_name, ";
				$sql .= "member_password, ";
				$sql .= "member_address, ";
				$sql .= "member_phone, ";
				$sql .= "member_email ";

				$sql .= ") VALUES (";
				$sql .= "'$username',";
				$sql .= "'$password',";
				$sql .= "'$address',";
				$sql .= "'$phone',";
				$sql .= "'$email'";
				$sql .= ");";

				if(mysqli_query($link, $sql)) {
					echo "<h1>The member has been added.</h1>";
					include ("displayMembers.php");
				}
				else {
					echo "<h2>You have encountered a problem.</h2>";
					echo "<h3 style='color: red'>" . mysqli_error($link) . "</h3>";
				}

				mysqli_close($link);
			}
			else {
		?>
			<h1>Add a new Member</h1>

			<form name="memberForm" method="post" action="addMember.php">
				<label for="username">Username:</label>
				<input type="text" name="username" required="required" />

				<label for="password">Password:</label>
				<input type="password" name="password" required="required" />

				<label for="address">Address:</label>
				<input type="address" name="address" required="required" />

				<label for="phone">Phone Number:</label>
				<input type="phone" name="phone" required="required" />

				<label for="email">Email:</label>
				<input type="email" name="email" required="required" />

				<input type="submit" name="addMember" value="Add Member" style="float: right;" />
				<input type="reset" name="clearForm" value="Clear Form" style="margin-right: 1em; float: right;" />
			</form>
		<?php
			}
		?>
			<a href="index.php" class="return">Return to Admin Options</a>
		</main>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>