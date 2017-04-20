<?php 
session_start();
    if(isset($_SESSION['account'])){

echo '<!-- Creation of a HTML document -->
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
        <link rel="stylesheet" href="Event_Creation.css" />
        <!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script src="Event_Creation.js"></script>
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

		<!-- Creation of a block which contains a form -->
		<div id="form">
			<!-- Add a "big" paragraph as a title 1 in World -->
			<h1>Creation of an event :</h1>
			<!-- Button to add another form for an event -->
			<button id="button" type="button" onclick= "newForm()">Add another event</button>
			<!-- Creation of a form -->
			<form id="gwenochou" method="get" action="Event_Creation_arg.php">
				<input class="submit" id="submit0" type="submit" name="submit" value="Submit">		
				<!-- Add a label to the scroll menu -->
				<label class="name2" for="name">Name of the event :</label>
				<!-- Creation of a scroll menu -->
				<select class="name" name="name0">
					<!-- Add differents activities in options -->
					<option value="1">Bowling</option>
					<option value="2">Afterwork</option>
					<option value="3">Mini-golf</option>
					<option value="4">Laser game</option>
					<option value="5">Basketball</option>
					<option value="6">Football</option>
				<!-- End of the scroll menu -->
				</select><br>
				<!-- Add a label to the textbox -->
				<label class="date2" for="date">Date of the event :</label>
				<!-- Add a textbox to choose a date -->
				<input type="date" class="date" name="date0" placeholder="2017-04-30"><br>
				<label class="time2" for="time">Time of the event :</label>
				<input type="time" class="time" name="time0" placeholder="18:00:00"><br>
				<input class="price" id="price0" type="button" value="Add price" onclick="price(0)"><br>
				<input type="text" id="gwenole" name="blc" value="0" hidden>
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
<!-- Closing the html markup -->
</html>';
}
else{
    header('Location: ../shopfail/shopfail.html');
}