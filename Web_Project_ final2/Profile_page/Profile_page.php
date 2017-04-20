<?php
    //Start of the global variable SESSION :
	session_start();
    //If globals variables are sets :
    if (isset($_SESSION['account'])) {
    	//add of the script in the "connexion_BDD.php" file :
     	include '../Connection_To_BDD/connection_BDD.php';

        //Realization of a prepared statment :
     	$select = $bdd->prepare('SELECT Firstname, Lastname, mail, profilepic AS PP, studies FROM users WHERE mail = ? ;');

        $select_purchase = $bdd->prepare('SELECT `Buyer`, `dateOfPurchase`, `product` FROM `purchase_history` WHERE Buyer = ?; ');

        //Put the variable "log" to the global variable SESSION['account'] :
        $log = $_SESSION['account'];
        //We replace the information in the prepared statment by the "log" variable :
        $select->bindParam(1, $log);
        //Execution of the prepared statment :
        $select->execute();
        // We stock the result in the variable "var" :
        $var = $select->fetch();

        $select_purchase->bindParam(1, $log);
        $select_purchase->execute();
        echo ' ';
        //Display the html page :
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
                <link rel="stylesheet" href="Profile_page.css" />
                <!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script type="text/javascript">
                    jQuery(function($){
                        $(\'#histo\').hide();
                    });
                </script>
            <!-- End of the metadata page  -->
            </head>

            <body>
                <script src="Profile_page.js"></script>
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
                

                <!-- Add an article -->
                <article id="profile_div">
                    <!-- profile picture of the person logged in -->
                    <img id="PP" src='. $var['PP'] .' alt="Profile picture"> 
                    <!-- Button to change the picture -->
                    <form enctype="multipart/form-data" id="form" method="get" action="img.php">
                        <input id="my_button" onclick="edit()" type="button" value="Edit" name="file">
                        <input type="submit" value="submit" id="submit">
                    </form>
                    <!-- Carriage return to separate the picture from the information -->
                    <br><br><br><br>
                    <!-- Information about the first name of the person logged in and a button to change the information -->
                    <p>First name : '. $var['Firstname'] .'<button id="first_button" class="button2" onclick="first()" type="button">Edit</button></p>
                    <form method="get" action="first.php">
                        <input type="text" name="first" id="first">
                        <input type="submit" value="submit" id="submitf">
                    </form>
                    <!-- Carriage return to separate information and give a better visibility -->
                    <br><br>
                    <!-- Information about the last name of the person logged in and a button to change the information -->
                    <p>Last name : '. $var['Lastname'] .'<button id="last_button" onclick="last()" class="button2" type="button">Edit</button></p>
                    <form method="get" action="last.php">
                        <input type="text" name="last" id="last">
                        <input type="submit" value="submit" id="submitl">
                    </form>
                    <!-- Carriage return to separate information and give a better visibility -->
                    <br><br>
                    <!-- Information about the email of the person logged in and a button to change the information -->
                    <p>Email : '. $var['mail'] .'<button id="mail_button" onclick="mail()" class="button2" type="button">Edit</button></p>
                    <form method="get" action="mail.php">
                        <input type="email" name="mail" id="mail">
                        <input type="submit" value="submit" id="submitm">
                    </form>
                    <!-- Carriage return to separate information and give a better visibility -->
                    <br><br>
                    <!-- Information about the studies of the person logged in and a button to change the information -->
                    <p>Studies : '. $var['studies'] .'<button id="studies_button" onclick="studies()" class="button2" type="button">Edit</button></p>
                    <form method="get" action="studies.php">
                        <input type="text" name="studies" id="studies">
                        <input type="submit" value="submit" id="submits">
                    </form>
                    <!-- Carriage return to separate information and give a better visibility -->
                    <br><br>
                    <!-- Link to change the password of the person logged in -->
                    <p style="margin-left: 10%;">Do you want to <a href="../Change_pass/Change_password.php">edit</a> your password ?</p>
                <!-- End of the article -->
                <button class="button" type="button" onclick="hide()">See your purchase history</button>
                </article>
                <article id="histo">
                    <table>
                        <thead>
                            <tr>
                                <th>Buyer</th><th>Product</th><th>Date</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($r = $select_purchase->fetch()) {
                        echo '<tr>
                                    <td>';
                                        echo $r['Buyer'];
                        echo '      </td>
                                    <td>';
                                        echo $r['product'];
                        echo'          </td>
                                        <td>';
                                        echo $r['dateOfPurchase'];
                        echo '      </td>
                                    </tr>';
                        }echo '
                        </tbody>
                    </table>
                <button class="button" type="button" onclick="show()">Back to the profile page</button>    
                </article>

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
    // If they are not sets :
 	else{
 		header('Location: ../shopfail/shopfail.html');
 	}
?>