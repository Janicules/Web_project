<?php 
    session_start();
    if(isset($_SESSION['account'])){

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
        <link rel="stylesheet" href="Change_password.css" />
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

		<!-- Positioning the CESI logo -->
        <a href="https://exia.cesi.fr/"><img style="margin-left: 45%;" src="../Images/logopng.png" id="logocesi" alt="logo du CESI"></a><br>

        <!-- Creates a block containing all the div about the password information -->
        <div id="mainframe">
            <h2>Change password</h2> <br>
            <div>
                <!-- Creates a form to send all the login information-->
                <form id="old_pass" method="post" action="change_pass.php" > 
                    <label for="password">What was your old password ?</label><br>
                    <!-- Creates a textbox to enter one\'s email address-->
                    <input type="password" maxlength="50" name="password" id="password"><br><br><br><br>
                    <label for="new_password">What is your new password ?</label><br>
                    <!-- Creates a textbox to enter one\'s password -->
                    <input type="password" name="new_password" maxlength="50" id="new_password"><br><br><br><br>
                    <label for="conf_new_password">Confirm your new password</label><br>
                    <!-- Creates a textbox to enter one\'s password -->
                    <input type="password" name="conf_new_password" maxlength="50" id="conf_new_password">
                    <br><br><br>
                    <!-- Creates a clickable button for the user to log in -->
                    <input type="submit" value="Confirm" id="button_confirm"><br><br> 
                </form>
            </div>
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
?>