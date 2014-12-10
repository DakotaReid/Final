<?php session_start(); ?>

<?php include ('loginFunctions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Dakota Reid" />
	<meta name="description" content="Renaissance Villas Owners Association About Us Page">
	<meta name="keywords" content="Renaissance, Villas, Owners, Association, About, Us, Page">
    <title>Renaissance Villas About Us</title>
    <link rel="stylesheet" href="files/HOA.css" />
	<style>
		#left {
			width: 500px;
			float: left;
		}

		#right {
			width: 500px;
			float: right;
		}
	</style>
	<script src="files/formControl.js"></script>
</head>
<?php
	if(!isset($_POST['submitLogin'])) {
?>
<body>
<?php
	}
	else {
?>
<body onload="toggle()">
<?php
	}
?>
	<header>
		<span class="logo">
			<a href="index.php"><img src="images/Renaissance_Villas.png" alt="logo" /></a>
		</span>

		<nav id="navBar">
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="aboutUs.php" class="active">About Us</a>
				</li>
				<li>
					<a href="articlesAndBylaws.php">Articles and Bylaws</a>
				</li>
				<li>
					<a href="contactUs.php">Contact Us</a>
				</li>
				<li id="login">
				<?php
					if(!isValidUser()) {
				?>
					<a href="javascript:toggle()">Login</a>
				<?php
					}
					else if(isAdmin()) {
				?>
					<a href="adminOptions.php">Admin Options</a>
				<?php
					}
					else {
				?>
					<a href="memberOptions.php">Member Options</a>
				<?php
					}
				?>
				</li>
			</ul>
		</nav>
	</header>

	<?php
		displayOptionsOrForm();
	?>

    <div id="container">
		<main>
			<h1>About Us</h1>

			<div id="left">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget nisl non erat blandit feugiat at eget lacus. Mauris gravida, ex vel ultricies porta, arcu nisl vehicula sem, sit amet vulputate sem felis a dui. Praesent cursus ipsum imperdiet massa feugiat, quis cursus dolor consequat. Nullam vitae volutpat mi, et feugiat mauris. Donec at efficitur lacus. Cras malesuada tincidunt nisl ut fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis nulla ante, mattis ut ex eget, dignissim venenatis turpis. Duis volutpat nibh sed laoreet vestibulum. Ut ornare dictum nulla, non viverra neque lacinia ac. Integer venenatis, massa non bibendum varius, tellus sapien mattis libero, vitae pellentesque sapien diam ac lectus. Curabitur at diam purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur eu neque vitae tellus commodo sagittis. Maecenas vulputate interdum ante, ac maximus dui malesuada quis. Etiam bibendum fermentum ultricies.</p>
				<p>In vehicula efficitur velit vel lobortis. Nullam vulputate turpis eu mi pulvinar ornare. Nunc hendrerit nulla non tristique sagittis. Quisque maximus vitae arcu sed iaculis. Nunc aliquet sem sed magna sollicitudin tempus vel at diam. Vestibulum vitae sapien odio. Maecenas a rutrum quam. Vestibulum sed nulla ac sem lobortis ultrices et in lacus. In hac habitasse platea dictumst. Nam pharetra ligula ac nibh ornare, vel pulvinar augue condimentum. Vestibulum et hendrerit ipsum. Suspendisse condimentum sem at porta fringilla. Aenean nec semper lorem. Cras maximus at tortor placerat iaculis.</p>
				<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut id congue turpis. Ut nec pretium dolor. In lorem lorem, tincidunt porttitor metus vitae, sodales pellentesque eros. Phasellus quis erat cursus, fringilla metus eget, facilisis magna. Aliquam erat volutpat. Fusce ut luctus enim, eget iaculis massa.</p>
				<p>In ut malesuada neque. Nulla pulvinar a tellus at consequat. Mauris congue mauris a sodales porttitor. Phasellus nibh est, eleifend et commodo tempor, iaculis a augue. Duis eget molestie dui. Mauris ut justo semper, bibendum enim iaculis, finibus orci. Vestibulum interdum luctus nunc vel pulvinar. Cras sit amet tempor arcu. Aliquam dolor velit, porttitor vitae pharetra in, interdum et mauris. Cras rutrum elit varius egestas porttitor. Fusce pretium tincidunt hendrerit.</p>
				<p>Aliquam eleifend sit amet nulla id viverra. Morbi rutrum volutpat elit, ac aliquam tellus sagittis non. In sollicitudin a dolor at mollis. Curabitur nec turpis iaculis, egestas tortor sit amet, finibus odio. Nam a leo sed purus finibus elementum non id nisi. Praesent ut blandit justo. Sed in libero vel mauris consequat porta eget mollis orci. Aenean libero lorem, vestibulum sit amet nulla a, cursus dignissim felis. Quisque maximus urna sit amet aliquet volutpat. Phasellus rhoncus ornare mauris, eget iaculis ligula fringilla id. Etiam dictum quam vel nibh accumsan, at laoreet arcu rhoncus. Morbi a ullamcorper dolor.</p>
            </div>

			<div id="right">
				<p>Donec condimentum pulvinar elit ac tincidunt. Suspendisse aliquet ligula non lorem fermentum condimentum. Nam blandit tempus ante, et suscipit est blandit condimentum. Nulla finibus ante et dui tempus facilisis. Cras justo lorem, bibendum nec volutpat sit amet, tincidunt fermentum arcu. Aenean pellentesque pretium aliquam. Integer dictum placerat varius. Aenean in tortor imperdiet, ultricies lacus sed, ullamcorper dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie, ante in finibus euismod, magna nibh dictum augue, id venenatis felis enim bibendum mi.</p>
				<p>Pellentesque sed neque maximus, malesuada ipsum sed, viverra diam. Nunc congue, ex nec sagittis lacinia, leo ante mattis mi, nec tempor ante odio quis orci. Sed eu arcu molestie, lacinia nibh ac, tristique neque. Aliquam sed felis id nibh volutpat accumsan. Sed nec tellus congue, faucibus magna ut, dictum ante. Integer in pretium ex, at eleifend lorem. Curabitur dignissim quam erat, sit amet sagittis nisl tincidunt at. Suspendisse sed odio sed leo molestie accumsan ac nec ante. Proin mattis tempus ex fringilla suscipit.</p>
				<p>Cras ut hendrerit elit, vitae malesuada purus. Curabitur eu ante ex. Donec cursus sem sed leo tincidunt viverra. Phasellus efficitur nisi odio, eu dictum urna auctor ac. Nulla quis turpis luctus mauris tincidunt dapibus non eu mi. Praesent urna massa, laoreet sit amet volutpat et, cursus eget leo. Aenean non blandit lectus, non tincidunt lacus. Pellentesque iaculis, nisl eu convallis scelerisque, tortor leo maximus metus, nec condimentum nisl velit vitae sapien. Donec sed quam tristique, vestibulum lectus eget, placerat mi. Curabitur volutpat pharetra ullamcorper. Mauris faucibus commodo odio. Integer eu hendrerit orci. Pellentesque diam libero, tristique in aliquam nec, sagittis eu purus.</p>
				<p>In nec ipsum a lorem hendrerit maximus. Cras varius felis vitae rhoncus vehicula. Morbi urna nisi, dignissim quis pretium eu, posuere vel tortor. Aenean venenatis non diam placerat consectetur. Morbi est mi, venenatis quis elit eu, interdum ornare leo. Suspendisse potenti. Aenean euismod metus vel viverra blandit. Integer eleifend molestie quam, sit amet mattis quam pellentesque et. Praesent magna diam, cursus ut iaculis ac, ullamcorper vel ipsum. Suspendisse pellentesque, ligula quis imperdiet efficitur, quam ligula fringilla nibh, quis vehicula nibh arcu ut purus. Quisque euismod justo a dolor luctus, id vulputate nisi dapibus. Morbi quis libero viverra, fermentum mi quis, eleifend ex. Aenean ut magna sed quam aliquam tempus. Quisque ac diam at arcu malesuada semper. Phasellus ultricies enim vel ligula fermentum convallis. Donec hendrerit, dui in blandit condimentum, magna est ornare enim, non tristique sapien ligula vitae turpis.</p>
				<p>Morbi aliquam mi nec quam consectetur finibus. Donec viverra lacus id cursus efficitur. Vestibulum sed semper mi. Ut non felis quis tortor tempor accumsan. Nam tempor pharetra dapibus. Sed ut malesuada sem. Nam facilisis pretium felis vel tristique. In id purus semper, iaculis risus sed, feugiat orci. Morbi lacinia, ante nec dapibus pretium, nisl neque eleifend sem, sit amet rhoncus diam magna eget orci. Nullam placerat dapibus orci, non convallis nisl venenatis sed. Phasellus eget vestibulum nunc, nec convallis lectus. In nisi nisi, mollis ut dui non, iaculis elementum ipsum. Integer est est, luctus blandit mauris ut, pharetra fermentum metus. Nullam ultricies dignissim nisi, eget mollis sem suscipit nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec dictum est ut mauris sodales, quis tempus tellus consequat.</p>
			</div>
		</main>

		<a href="#container" style="clear: both; display: block; margin-bottom: 1em;">To Top</a>
	</div>

	<footer>
		<p>&copy;Renaissance Villas Owners Association. All rights reserved.</p>
	</footer>
</body>
</html>
