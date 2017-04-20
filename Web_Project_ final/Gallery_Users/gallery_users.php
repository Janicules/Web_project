<?php
include ('bdd_connect.php');
session_start();
 if(isset($_SESSION['account'])){
 	$log = $_SESSION['account'];

    include("bdd_connect.php");
    $cesi = $conn->prepare('SELECT `Status` FROM `users` WHERE Mail = ?;');

    $cesi->bindParam(1, $log);
    $cesi->execute();
    $r = $cesi->fetch();
    if($r['Status'] == 1){
		echo '
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
				<link rel="stylesheet" href="gallery_users.css" />
				<!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
			<!-- End of the metadata page  -->

			</head>

			<body>

				<header id="header">
					<!-- Create a block of elements -->
					<div id="red_bar">

						<a href="https://exia.cesi.fr/"><img src="../Images/logopng.png" alt="Logo of Exia CESI"></a>

						<nav>
						    <!-- Links with same properties thanks to the attribute "class" -->
						    <a href="../Gallery_Users/gallery_users.php" class="selected">Gallery</a>
						    <a href="../Agenda_page/Agenda_page.php" class="selected">Schedule</a>
						    <a href="../shop_cesi/all.php" class="selected">Shop</a>
						    <a href="../Pinned_Gallery/pinned_gallery.php " class="selected">Pinned pictures</a>
						</nav>

						<a href="../Logout/Logout.php" id="logout" class="log">Log out</a>
						<a href="../Profile_page/Profile_page.php" class="log">Your account</a>

					</div>

					<div id="white_bar">
						<nav>
						    <a href="http://www.facebook.com"><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
						    <a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
						    <a href="http://www.youtube.com"><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
						    <a href="../Pannier_page/Pannier_page.php"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
						</nav>

					</div>

				</header>

			<div id=topbar>
			<p>GALLERY</p>
			</div>


			<article id=artgal>
			';

			$get_images = $conn->prepare('SELECT picUrl FROM gallery WHERE idUser=:id');

			$get_images->execute(array(
				':id' => 1));
				
				
				
			while($resultat = $get_images->fetch()){
				echo "<div class='gallery'>";
				echo "<img src=".$resultat['picUrl']." width=300 height=200>";
				echo "<input class='desc' type='text' id='text' name='text' value='Cool'>";
				echo "<button action='like.php' method='post' type='submit'>Like</button>";
				echo "</div>";
			 
			}	
			echo '


			</article>


			<div id="upbar">
				<form id="up" action="ajax.php" method="post">
				
				<!-- Creates a textbox to enter one\'s url pic -->
			    <input class="textzone" type="text" id="text" name="text"><br><br>
			    <!--<input class="textzone" type="text" id=text name="textboxUp" value="" >-->
				<button class="myButton" type="submit">Upload</button>
				
				</form>
			</div>

			<!-- Add a footer for the page -->
			<footer>
			    <!-- Link to send a mail to the webmaster -->
			    <a class="links" href="mailto:">Contact</a>
			    <!-- Link to see the condition of use -->
			    <a class="links" href="../Conditionofuse/conditions.html">Condition of use</a>
			    <!-- Link to see the privacy notice -->
			    <a class="links" href="../Privacypolicy/privacypolicy.html">Privacy policy</a>
			    <!-- End of the footer -->
			</footer>
				<!-- End of the corpse of the page -->


				
			</body>

			</html>';
	}
	else if($r['Status'] == 0){
			echo '
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
				<link rel="stylesheet" href="gallery_users.css" />
				<!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
			<!-- End of the metadata page  -->

			</head>

			<body>

				<header id="header">
					<!-- Create a block of elements -->
					<div id="red_bar">

						<a href="https://exia.cesi.fr/"><img src="../Images/logopng.png" alt="Logo of Exia CESI"></a>

						<nav>
						    <!-- Links with same properties thanks to the attribute "class" -->
						    <a href="../Gallery_Users/gallery_users.php" class="selected">Gallery</a>
						    <a href="../Agenda_page/Agenda_page.php" class="selected">Schedule</a>
						    <a href="../Shop/all.php" class="selected">Shop</a>
						    <a href="../Pinned_Gallery/pinned_gallery.php " class="selected">Pinned pictures</a>
						</nav>

						<a href="../Logout/Logout.php" id="logout" class="log">Log out</a>
						<a href="../Profile_page/Profile_page.php" class="log">Your account</a>

					</div>

					<div id="white_bar">
						<nav>
						    <a href="http://www.facebook.com"><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
						    <a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
						    <a href="http://www.youtube.com"><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
						    <a href="../Pannier_page/Pannier_page.php"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
						</nav>

					</div>

				</header>

			<div id=topbar>
			<p>GALLERY</p>
			</div>


			<article id=artgal>
			';

			$get_images = $conn->prepare('SELECT picUrl FROM gallery WHERE idUser=:id');

			$get_images->execute(array(
				':id' => 1));
				
				
				
			while($resultat = $get_images->fetch()){
				echo "<div class='gallery'>";
				echo "<img src=".$resultat['picUrl']." width=300 height=200>";
				echo "<input class='desc' type='text' id='text' name='text' value='Cool'>";
				echo "<button action='like.php' method='post' type='submit'>Like</button>";
				echo "</div>";
			 
			}	
			echo '


			</article>


			<div id="upbar">
				<form id="up" action="ajax.php" method="post">
				
				<!-- Creates a textbox to enter one\'s url pic -->
			    <input class="textzone" type="text" id="text" name="text"><br><br>
			    <!--<input class="textzone" type="text" id=text name="textboxUp" value="" >-->
				<button class="myButton" type="submit">Upload</button>
				
				</form>
			</div>

			<!-- Add a footer for the page -->
			<footer>
			    <!-- Link to send a mail to the webmaster -->
			    <a class="links" href="mailto:">Contact</a>
			    <!-- Link to see the condition of use -->
			    <a class="links" href="../Conditionofuse/conditions.html">Condition of use</a>
			    <!-- Link to see the privacy notice -->
			    <a class="links" href="../Privacypolicy/privacypolicy.html">Privacy policy</a>
			    <!-- End of the footer -->
			</footer>
				<!-- End of the corpse of the page -->


				
			</body>

			</html>';
	}
}
else{
	header('Location: ../shopfail/shopfail.html');
}
?>