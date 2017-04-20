<?php 
	session_start();
	//if(isset($_SESSION['account'])){
		require('../Connection_To_BDD/connection_BDD.php');
		$selectact = $bdd->prepare('SELECT `actName` FROM `activities` GROUP BY actName;');
		$select = $bdd->prepare('SELECT actDate, actTime FROM `activities` WHERE actName = ?;');

		$selectact->execute();

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
        <link rel="stylesheet" href="Vote_page.css" />
        <!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- End of the metadata page  -->

    </head>

    <body>

        <header id="header">
            <!-- Create a block of elements -->
            <div id="red_bar">

                    <img src="../Images/logo.png" alt="Logo of Exia CESI">

                   	<nav>
                        <!-- Links with same properties thanks to the attribute "class" -->
                        <a href="../Gallery_Users/gallery_users.html" class="selected">Gallery</a>
                        <a href="../Agenda's_page/Agenda's_page.html" class="selected">Schedule</a>
                        <a href="../Shop/Shop.html" class="selected">Shop</a>
                        <a href="../Pinned_Gallery/pinned_gallery.html" class="selected">Pinned pictures</a>
                    </nav>

                    <a href="../homepage/homepage.html" id="logout" class="log">Log out</a>
                    <a href="../Profile's_page/Profile's_page.html" class="log">Your account</a>

            </div>

            <div id="white_bar">
                    <nav>
                        <a href=""><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
                        <a href=""><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
                        <a href=""><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
                        <a href="../Pannier's_page/Pannier's_page.html"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
                    </nav>
            </div>
        </header>

		<!-- Create a block of elements -->
		<div id="vote">
			<!-- Add a "big" paragraph like the title 1 in World -->
			<h1 id="title">Vote for an activity</h1>
			<!-- Create a form to ask to the user for what activity he wants to vote -->
			<form class="forms" method="GET" action="Vote_page.php">
				<input type="submit" id="submit" name="submit" value="See the date of the activity">
				<a href="Vote_page.php"><button type="button">Cancel</button></a><br>
				<!-- Label for the name of the activity -->
				<label  for="name">Choose an activity</label>
				<!-- Differents activities in a scroll menu -->
				<select class="label" name="name">
					<?php while($r = $selectact->fetch()){
						$k=0;
						if ($r['actName'] == 'Bowling'){
							$k = 1;
						}
						if($r['actName'] == 'Laser game'){
							$k = 2;
						}
						if($r['actName'] == 'Course à pied') {
							$k = 3;
						}
						if($r['actName'] == 'Afterwork') {
							$k = 4;
						}
						if($r['actName'] == 'Mini-golf') {
							$k = 5;
						}
						if($r['actName'] == 'Basketball') {
							$k = 6;
						}
						if($r['actName'] == 'Football') {
							$k = 7;
						}
						echo '<option value='. $k.'>'. $r['actName'].'</option>';
						}
					?>
				</select>
			</form>
			<?php 
				if(!empty($_GET['name'])){
					$activity = $_GET['name'];

					if ($_GET['name'] == 1){
						$activity = "Bowling";
					}
					if ($_GET['name'] == 2){
						$activity = "Laser game";
					}
					if ($_GET['name'] == 3){
						$activity = "Course à pied";
					}
					if ($_GET['name'] == 4){
						$activity = "Afterwork";
					}
					if ($_GET['name'] == 5){
						$activity = "Mini-gold";
					}
					if ($_GET['name'] == 6){
						$activity = "Basketball";
					}
					if ($_GET['name'] == 7){
						$activity = "Football";
					}

					$date = $bdd->prepare('SELECT actDate FROM `activities` WHERE actName = ? GROUP BY actDate;');

					$date->bindParam(1, $activity);
					$date->execute();

					echo '<div class="forms"><!-- Label for the date free -->
						<p>Select the date when you\'re free</p>
						<!-- Differents dates proposed for the activity selected -->';
						while($r = $date->fetch()){
								echo '<a href="Vote_page.php?date='. $r['actDate'].'&name='. $activity.'">'. $r['actDate'].'</a><br>';
						}
						echo '</div>';

				}

				if(!empty($_GET['date'])){
					$date = $_GET['date'];
					$name = $_GET['name'];
					$timer = $bdd->prepare('SELECT actTime, actDate, actName FROM activities WHERE actDate = ? AND actName = ?;');
					$timer->bindParam(1, $date);
					$timer->bindParam(2, $name);
					$timer->execute();

					echo '<div class="forms" id="time"><!-- Label for the date free -->
						<p>Select the date when you\'re free</p>
						<!-- Differents dates proposed for the activity selected -->';
						while($r = $timer->fetch()){
								echo '<a href="update.php?date='.$date.'&name='. $name.'&time='.$r['actTime'].'">'. $r['actTime'].'</a><br>';
						}
					echo '</div>';
				}
			?>
			<form class="forms">
				<!-- A button to vote for the activity selected with date and time prefered -->
				
			</form>
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
<!-- Closing the html markup -->
</html>