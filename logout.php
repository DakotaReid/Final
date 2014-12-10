<?php session_start(); ?>

<?php
	if($_SESSION['validUser'] != "yes") {
		header("Location: index.php");
	}
	else {
		session_destroy();
		header("Location: index.php");
	}
?>