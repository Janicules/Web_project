<?php
include ('bdd_connect.php');
session_start();
//$_SESSION['account'];
?>

<!-- Creation of a HTML document -->
<!DOCTYPE html>
<!-- Opening the HTML markup -->
<html>

<!-- Metadata page  -->
<head>
	<!-- Definition of character used -->
    <meta charset="utf-8" />
    <!-- Add a title to the page -->
    <title>BDE CESI</title>
    <!-- Bond the HTML page to a CSS page -->
	<link rel="stylesheet" href="pinned_gallery.css" />
	<!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<!-- End of the metadata page  -->

</head>

<body>

	<header id="header">
		<!-- Create a block of elements -->
		<div id="red_bar">

				<img src="p1.png" alt="Logo of Exia CESI">

				<nav>
					<!-- Links with same properties thanks to the attribute "class" -->
					<a href="gallery_users.php" class="selected">Gallery</a>
					<a href="" class="selected">Schedule</a>
					<a href="" class="selected">Shop</a>
					<a href="pinned_gallery.php" class="selected">Pinned Pictures</a>
				</nav>

				<a href="" class="log">Logout</a>
				<a href="" class="log">Your Account</a>

		</div>

		<div id="white_bar">
				<nav>
					<a href=""><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
					<a href=""><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
					<a href=""><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
					<a href=""><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
				</nav>

		</div>

	</header>

<div id=topbar>
<h3>Photo you've liked:</h3>
</div>
<article id=artgal>
  
</div>

<?php

$get_images = $conn->prepare('SELECT picUrl FROM gallery WHERE likePic >= :id');

$get_images->execute(array(
	':id' => 1));
	

	
while($resultat = $get_images->fetch()){
	echo "<div class='gallery'>";
	echo "<img src=".$resultat['picUrl']." width=300 height=200>";
	echo "<input type='checkbox' name='choix[]' value=''>";
	echo "<input type='text' id='text' name='text' value=''>";
	echo "</div>";
	
 
}	
?>	

</article>

<div id="upbar">
	<a href="#" class="Download">Download selected pictures</a>
</div>

<!-- Add a footer for the page -->
	    <footer>
	        <!-- Link to send a mail to the webmaster -->
	    	<a href="mailto:">Contact</a>
	        <!-- Link to see the condition of use -->
	    	<a class="links" href="">Condition of use</a>
	        <!-- Link to see the privacy notice -->
	    	<a class="links" href="">Privacy notice</a>
	        <!-- Link to get help -->
	    	<a class="links" href="">Help</a>
	        <!-- End of the footer -->
	    </footer>
	<!-- End of the corpse of the page -->

</body>

</html>
