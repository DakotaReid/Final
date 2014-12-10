<?php
	function displayAdminOptions() {
		
	}

	function displayLoginForm() {
		echo "<form id='loginForm' method='post' action='index.php' style='display: none'>";
		echo	"<label for='user'>Username:</label>";
		echo	"<input name='loginUsername' type='text' name='user' required='required' />";
		echo	"<label for='pass'>Password:</label>";
		echo	"<input name='loginPassword' type='password' name='pass' required='required' />";
		echo	"<input name='submitLogin' value='Login' type='submit' style='margin-bottom: 0; float: right;' />";
		echo	"<input name='resetLogin' value='Clear' type='reset' style='margin-right: 1em; margin-bottom: 0; float: right;' />";
		echo "</form>";
	}

	function displayInvalidUserOrPass() {
		echo "<form id='loginForm' method='post' action='index.php' style='display: none'>";
		echo "<h5 style='color: red'>Invalid username or password</h5>";
		echo	"<label for='user'>Username:</label>";
		echo	"<input name='loginUsername' type='text' name='user' required='required' />";
		echo	"<label for='pass'>Password:</label>";
		echo	"<input name='loginPassword' type='password' name='pass' required='required' />";
		echo	"<input name='submitLogin' value='Login' type='submit' style='margin-bottom: 0; float: right;' />";
		echo	"<input name='resetLogin' value='Clear' type='reset' style='margin-right: 1em; margin-bottom: 0; float: right;' />";
		echo "</form>";
	}

	function isValidUser() {
		if($_SESSION['validUser'] == "yes") {
			return true;
		}
		else if(isset($_POST['submitLogin'])) {
			include ("dbConnectAdmin.php");

			$inUsername = $_POST['loginUsername'];
			$inPassword = $_POST['loginPassword'];
			
			$sql = "SELECT * FROM members WHERE member_name = '" . $inUsername . "' AND member_password = '" . $inPassword . "'";

			$result = mysqli_query($link, $sql) or die("<h1>There was an issue while trying to login.</h1>");

			if(mysqli_num_rows($result) == 1) {
				$_SESSION['validUser'] = "yes";
				$_SESSION['username'] = $_POST['loginUsername'];
				$_SESSION['password'] = $_POST['loginPassword'];

				return true;
			}
			else {
				return false;
			}
			mysqli_close($link);
		}
		return false;
	}

	function displayOptionsOrForm() {
		if(isValidUser()) {
			displayAdminOptions();
		}
		else {
			if(!isset($_POST['submitLogin'])) {
				displayLoginForm();
			}
			else {
				displayInvalidUserOrPass();
			}
		}
	}

	function isAdmin() {
		if(($_SESSION['username'] == "Admin") || ($_SESSION['username'] == "Dakota")) {
			return true;
		}
		else {
			return false;
		}
	}
?>