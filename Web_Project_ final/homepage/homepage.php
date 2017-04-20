<?php
include('connection_BDD.php');
$getimg=$connexion->prepare("SELECT picUrl from gallery");
$getimg->execute();
$get=$getimg->fetchAll();
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
        <title>BDE CESI - Homepage</title>
        <!-- Bond the HTML page to a CSS page -->
        <link rel="stylesheet" href="homepage.css" />
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
                    </nav>

                    <a href="../Createaccount/Createaccount.html" id="" class="log">Sign up</a>
                    <a href="../login/login.html" class="log">Log in</a>

            </div>

            <div id="white_bar">
                    <nav>
                        <a href="http://www.facebook.com"><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
                        <a href="http://www.twitter.com"><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
                        <a href="http://www.youtube.com"><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
                    </nav>

            </div>

        </header>
        

        <!-- Add an article -->
        
        <div id="mainframe">
            <h2 id="title2">
                Activities
            </h2>
            
            <div id="div_img">
                    
                    <button id="gauche" onClick="gauche()"><</button><img id="carou" src="../Images/logo.png" alt="carou"/><button id="droite" onClick="droite()">></button>
                     
            <script src="scriptcar.js"></script>
            <script type="text/javascript">
                change = 0;
                function carrousel(){
                                        if(change == 0) {
                                            document.getElementById("carou").src = <?php echo "'".$get[0]['picUrl']."'" ?>;
                                            change = 1;
                                        }
                                        else if(change == 1){
                                            document.getElementById("carou").src = <?php echo "'".$get[1]['picUrl']."'" ?>;
                                            change = 2;
                                        }
                                        else if(change ==2){
                                            document.getElementById("carou").src = <?php echo "'".$get[2]['picUrl']."'" ?>;
                                            change = 0;
                                        }
                                    }
                function interval(){
                    time = setInterval(carrousel, 2000);
                }
                window.onload = interval;</script>
            
            </div>
            
                <img src="../Images/hsplitter.png" id="hsplitter" alt="splitter"> 
            
            <h2 id="title3">
            About the CESI BDE 
            </h2> <br>
            <p>
                The CESI BDE, or "Bureau des Etudiants" in french, is the student society of said school, which is elected by its students. Its purpose is to organize a wide range of extra scholar activities such as sports, huge meals, paintball, cultural events, parties, etc. and, of course, to welcome the new students as well as interacting with other school's associations.
            </p>
            <p> 
                You, as a member of the CESI school, are more than welcome to join our association. The more the merrier, and you will benefit preferential rates on various activities!
            </p><br><br>

            <p id="para">
            If you're not registered yet, you can <a href="../Createaccount/Createaccount.html">create an account</a>.
            </p>

        </div>
        

        <!-- Add a footer for the page -->
        <footer>
            <!-- Link to send a mail to the webmaster -->
            <a class="links" href="mailto:">Contact</a>
            <!-- Link to see the condition of use -->
            <a class="links" href="../Conditionsofuse/conditions">Condition of use</a>
            <!-- Link to see the privacy notice -->
            <a class="links" href="../Privacypolicy/privacypolicy">Privacy policy</a>

            <!-- End of the footer -->
        </footer>
    <!-- End of the corpse of the page -->
    </body>
<!-- Closing the html markup -->
</html>