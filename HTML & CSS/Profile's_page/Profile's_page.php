<?php

	session_start();
	//add of the script in the "connexion_BDD.php" file :
 	include 'connexion_BDD.php';
 	$select = $bdd->prepare('SELECT ? FROM users WHERE Mail= ?;');

 	if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
 		$surename = "surename";
 		$name = "name";
 		$email = "mail";
 		$log = $_SESSION['login'];
 		$test = "wilou@gmail.com";
 		//$studies = "studies";
 		$PP = "profilepic";

 		$select->bindParam(1, $surename);
 		$select->bindParam(2, $test);
 		$select->execute();
 		$surename = $select->fetch();

 		$select->bindParam(1, $name);
 		$select->bindParam(2, $test);
 		$select->execute();
 		$name = $select->fetch();

 		$select->bindParam(1, $email);
 		$select->bindParam(2, $test);
 		$select->execute();
 		$email = $select->fetch();

 		// $select->bindParam(1, $studies);
 		// $select->bindParam(2, $test);
 		// $select->execute();
 		// $studies = $select->fetch();

 		$select->bindParam(1, $PP);
 		$select->bindParam(2, $test);
 		$select->execute();
 		$PP = $select->fetch();

 	}
 	else{
 		echo 'Variables undefined';
 	}
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
        <link rel="stylesheet" href="Profile's_page.css" />
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
                        <a href="" class="selected">Gallery</a>
                        <a href="../Agenda's_page/Agenda's_page.html" class="selected">Schedule</a>
                        <a href="" class="selected">Shop</a>
                        <a href="" class="selected">Pinned Pictures</a>
                    </nav>

                    <a href="../Logout/Logout.php" id="logout" class="log">Logout</a>
                    <a href="Profile's_page.html" class="log">Your Account</a>

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
        

        <!-- Add an article -->
        <article>
            <!-- profile picture of the person logged in -->
            <?php '<img id="PP" src='. $PP .' alt="Profile picture">'; ?>
            <!-- Button to change the picture -->
            <button type="button">Edit</button>
            <!-- Carriage return to separate the picture from the information -->
            <br><br><br><br>
            <!-- Information about the first name of the person logged in and a button to change the information -->
            <?php echo '<p>First name : '. $surename .'<button class="button2" type="button">Edit</button></p>'; ?>
            <!-- Carriage return to separate information and give a better visibility -->
            <br><br>
            <!-- Information about the last name of the person logged in and a button to change the information -->
            <?php echo '<p>Last name : '. $name .'<button class="button2" type="button">Edit</button></p>'; ?>
            <!-- Carriage return to separate information and give a better visibility -->
            <br><br>
            <!-- Information about the email of the person logged in and a button to change the information -->
            <?php echo '<p>Email : '. $email .'<button class="button2" type="button">Edit</button></p>'; ?>
            <!-- Carriage return to separate information and give a better visibility -->
            <br><br>
            <!-- Information about the studies of the person logged in and a button to change the information -->
           <!--  <?php //echo '<p>Studies : '. $studies .'<button class="button2" type="button">Edit</button></p>'; ?> -->
            <!-- Carriage return to separate information and give a better visibility -->
            <br><br>
            <!-- Link to change the password of the person logged in -->
            <p>Do you want to <a href="../Change_pass/Change_password.html">edit</a> your password ?</p>
        <!-- End of the article -->
        </article>

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