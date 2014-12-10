<?php
	$hostname = "localhost";
	$username = "Dakota";
	$password = "vSVPJ.45jd";
	$database = "hoa";
	$link = mysqli_connect($hostname, $username, $password, $database);

	if(!$link) {
		die("Connect Error (' . mysqli_connect_errno() . ') " . mysqli_connect_error());		
	}
?>