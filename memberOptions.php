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
    <title>Member Options</title>
	<link rel="icon" href="../../images/shield.ico" />
    <link rel="stylesheet" href="files/HOA.css" />
	<style>
		ul {
			list-style: none;
		}

		li {
			margin-bottom: 1em;
		}

		main {
			float: left;
		}

		#weatherWidget {
			width: 215px;
			float: right;
		}

		#link_get_widget {
			display: none;
		}

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
					<a href="memberOptions.php" class="active">Member Options</a>
				</li>
				<li>
					<a href="requestPost.php">Request a Post</a>
				</li>
				<li>
					<a href="displayPostsForMembers.php">Display Posts</a>
				</li>
				<li id="login">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</nav>
	</header>

	<div id="container">
		<main>
			<ul id="options">
			<?php if(isAdmin()) { ?>
				<li>
					<a href="adminOptions.php">Admin Options</a>
				</li>
			<?php } ?>
				<li>
					<a href="memberOptions.php">Member Options</a>
				</li>
				<li>
					<a href="requestPost.php">Request a Post</a>
				</li>
				<li>
					<a href="displayPostsForMembers.php">Display Posts</a>
				</li>
				<li>
					<a href="index.php">Return to Homepage</a>
				</li>
			</ul>
		</main>

		<div id="weatherWidget">
			<a href="http://www.accuweather.com/en/us/ankeny-ia/50023/weather-forecast/333083" class="aw-widget-legal"></a>
			<!-- By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy. -->
			<div id="awcc1418058676155" class="aw-widget-current"  data-locationkey="333083" data-unit="f" data-language="en-us" data-useip="false" data-uid="awcc1418058676155"></div>
			<script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
		</div>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>