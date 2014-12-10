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
    <title>Members Table</title>
	<style>
		table {
			margin-bottom: 1em;
		}

		tr,
		th,
		td {
			padding: .25em;
		}
	</style>
</head>

<body>
	<div id="membersContainer">
    <?php
		include ("dbConnectFromForm.php");

		$sql = "SELECT * FROM members";
		$result = mysqli_query($link, $sql);

		if(!$result) {
			echo mysqi_error($link);
		}
	?>

		<table border="1">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Email</th>
				<?php if(isAdmin()) { ?>
				<th>Delete</th>
				<th>Update</th>
				<?php } ?>
			</tr>

	<?php
		while($row = mysqli_fetch_array($result)) {
  			echo "<tr>";
  			echo "<td>" . $row['member_name'] . "</td>";
  			echo "<td>" . $row['member_address'] . "</td>";
  			echo "<td>" . $row['member_phone'] . "</td>";
			echo "<td>" . $row['member_email'] . "</td>";
			if(isAdmin()) {
				echo "<td><a href='deleteMember.php?member_id=" . $row['member_id'] ."'>Delete</a></td>";
				echo "<td><a href='updateMember.php?member_id=" . $row['member_id'] ."'>Update</a></td>";
			}
  			echo "</tr>";
  		}

		mysqli_close($link);
	?>
		</table>
	</div>
</body>
</html>