<?php session_start(); ?>

<?php
	if($_SESSION['validUser'] != "yes") {
		header("Location: index.php");
	}
?>

<?php
	include ("dbConnectFromForm.php");

	$sql = "SELECT * FROM bulletin ORDER BY post_num DESC";
	$result = mysqli_query($link, $sql);

	if(!$result) {
		echo mysqi_error($link);
	}
?>

<div id="postContainer">
<?php
	while($row = mysqli_fetch_array($result)) {
		$subject = $row['subject'];
  		$content = $row['content'];
		$timezone = new DateTimeZone('America/Chicago');
		$date_posted = new DateTime($row['date_posted'], $timezone);
		$date_posted = $date_posted->format('m\/d\/Y');

		echo "<div class='post'>";
		echo "<span class='subject'><h2>" . $subject . "</h2></span>";
		echo "<span class='content'><p>" . $content . "</p></span>";
  		echo "<span class='datePosted'>Date Posted: " . $date_posted . "</span>";
		if(isAdmin()) {
			echo "<a href='deletePost.php?post_num=" . $row['post_num'] ."'>Delete</a>";
			echo "<a href='editPost.php?post_num=" . $row['post_num'] ."'>Edit</a>";
		}
		echo "</div>";
  	}
	mysqli_close($link);
?>
</div>