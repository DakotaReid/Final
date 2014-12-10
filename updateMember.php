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
	<title>Update Member</title>
	<link rel="icon" href="../../images/form_edit.ico" />
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

		$member_id = $_GET['member_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$updateMemberId = $_GET['member_id'];
		$sql = "SELECT * FROM members WHERE member_id = $updateMemberId";
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
					<a href="displayPosts.php">Display/Modify Posts</a>
				</li>
				<li>
					<a href="addMember.php">Add User</a>
				</li>
				<li>
					<a href="displayMembers.php" class="active">Display/Modify Users</a>
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
			if(isset($_POST['updateMember'])) {
				$sql = "UPDATE members SET " ;
				$sql .= "member_name='$username', ";
				$sql .= "member_password='$password', ";
				$sql .= "member_address='$address', ";
				$sql .= "member_phone='$phone', ";
				$sql .= "member_email='$email' ";
				$sql .= " WHERE (member_id='$member_id')";
	
				if(mysqli_query($link, $sql)) {
					echo "<h1>The member has been successfully updated.</h1>";
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
			<h1>Update Member</h1>

			<form name="memberForm" method="post" action="updateMember.php?member_id=<?php echo $updateMemberId; ?>">
				<label for="username">Username:</label>
				<input type="text" name="username" value="<?php echo $row['member_name']; ?>" required="required" />

				<label for="password">Password:</label>
				<input type="password" name="password" value="<?php echo $row['member_password']; ?>" required="required" />

				<label for="address">Address:</label>
				<input type="address" name="address" value="<?php echo $row['member_address']; ?>" required="required" />

				<label for="phone">Phone Number:</label>
				<input type="phone" name="phone" value="<?php echo $row['member_phone']; ?>" required="required" />

				<label for="email">Email:</label>
				<input type="email" name="email" value="<?php echo $row['member_email']; ?>" required="required" />

				<input type="submit" name="updateMember" value="Update Member" style="float: right;" />
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