<?php 
//start of the global variable SESSION
session_start();
if(isset($_SESSION['account'])){
    $log = $_SESSION['account'];
    //adding the script in the connexion_BDD.php file
    include 'connection_BDD.php';

    $cesi = $connexion->prepare('SELECT `Status` FROM `users` WHERE Mail = ?;');
    $cesi->bindParam(1, $log);
    $cesi->execute();
    $r = $cesi->fetch();

    if($r['Status'] == 1){
    	//creation of a prepared statement
    	$getimg=$connexion->prepare("SELECT picUrl from gallery");
    	$getimg->execute();
    	$get=$getimg->fetchAll();

    	//creation of a prepared statement
    	$gettimg=$connexion->prepare("SELECT picUrl from gallery ORDER BY datePic");
    	//execute the prepared statement
    	$gettimg->execute();
    	//stocks the result in a "gett" variable
    	$gett=$gettimg->fetchAll();
        

        //display the HTML page with an echo

        echo '<!-- Creation of a HTML document -->
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
                <link rel="stylesheet" href="afterlogin.css" />
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
                                <a href="../Gallery_teamcesi/gallery_teamcesi.php" class="selected">Gallery</a>
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
                

                <!-- Add an article -->
                
                <div id="mainframe">
                    <h2 id="title2">
                        Activities
                    </h2>

                    <div id="div_img">
                            
                            <button id="gauche" onClick="gauche()"><</button><img id="carou" src="'.$get[0]['picUrl'].'" alt="carou"/><button id="droite" onClick="droite()">></button>
                             
                    <script src="scriptcar.js"></script>    
                    <script type="text/javascript">
                        change1 = 0;
                        function carrousel(){
                                                if(change1 == 0) {
                                                    document.getElementById("carou").src = "'.$get[0]['picUrl'].'";
                                                    change1 = 1;
                                                }
                                                else if(change1 == 1){
                                                    document.getElementById("carou").src =  "'.$get[1]['picUrl'].'";
                                                    change1 = 2;
                                                }
                                                else if(change1 ==2){
                                                    document.getElementById("carou").src = "'.$get[2]['picUrl'].'";
                                                    change1 = 0;
                                                }
                                            }
                        function interval(){
                            time = setInterval(carrousel, 2000);
                        }
                        window.onload = interval;</script>
                        </div>
                    
                        <img src="../Images/hsplitter.png" id="hsplitter" alt="splitter"> 
                    
                    <h2 id="title3">
                    Confirmed events
                    </h2> 
                   
                    <img id="carousel" src="'.$get[2]['picUrl'].'" alt="carousel"/>
                             
                    <script src="scriptcarou.js"></script>
                    <script type="text/javascript">
                        change = 0;
                        function carousel(){
                                                if(change == 0) {
                                                    document.getElementById("carousel").src =  "'.$gett[2]['picUrl'].'";
                                                    change = 1;
                                                }
                                                else if(change == 1){
                                                    document.getElementById("carousel").src =  "'.$gett[1]['picUrl'].'";
                                                    change = 2;
                                                }
                                                else if(change ==2){
                                                    document.getElementById("carousel").src =  "'.$gett[0]['picUrl'].'";
                                                    change = 0;
                                                }
                                            }
                        function interval(){
                            time = setInterval(carousel, 2000);
                        }
                        window.onload = interval;</script>

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
        </html>
        <script>gauche();</script>';
    }
    else if($r['Status'] == 0){
        //creation of a prepared statement
        $getimg=$connexion->prepare("SELECT picUrl from gallery");
        $getimg->execute();
        $get=$getimg->fetchAll();

        //creation of a prepared statement
        $gettimg=$connexion->prepare("SELECT picUrl from gallery ORDER BY datePic");
        //execute the prepared statement
        $gettimg->execute();
        //stocks the result in a "gett" variable
        $gett=$gettimg->fetchAll();
        

        //display the HTML page with an echo

        echo '<!-- Creation of a HTML document -->
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
                <link rel="stylesheet" href="afterlogin.css" />
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
                

                <!-- Add an article -->
                
                <div id="mainframe">
                    <h2 id="title2">
                        Activities
                    </h2>

                    <div id="div_img">
                            
                            <button id="gauche" onClick="gauche()"><</button><img id="carou" src="'.$get[0]['picUrl'].'" alt="carou"/><button id="droite" onClick="droite()">></button>
                             
                    <script src="scriptcar.js"></script>    
                    <script type="text/javascript">
                        change1 = 0;
                        function carrousel(){
                                                if(change1 == 0) {
                                                    document.getElementById("carou").src = "'.$get[0]['picUrl'].'";
                                                    change1 = 1;
                                                }
                                                else if(change1 == 1){
                                                    document.getElementById("carou").src =  "'.$get[1]['picUrl'].'";
                                                    change1 = 2;
                                                }
                                                else if(change1 ==2){
                                                    document.getElementById("carou").src = "'.$get[2]['picUrl'].'";
                                                    change1 = 0;
                                                }
                                            }
                        function interval(){
                            time = setInterval(carrousel, 2000);
                        }
                        window.onload = interval;</script>
                        </div>
                    
                        <img src="../Images/hsplitter.png" id="hsplitter" alt="splitter"> 
                    
                    <h2 id="title3">
                    Confirmed events
                    </h2> 
                   
                    <img id="carousel" src="'.$get[2]['picUrl'].'" alt="carousel"/>
                             
                    <script src="scriptcarou.js"></script>
                    <script type="text/javascript">
                        change = 0;
                        function carousel(){
                                                if(change == 0) {
                                                    document.getElementById("carousel").src =  "'.$gett[2]['picUrl'].'";
                                                    change = 1;
                                                }
                                                else if(change == 1){
                                                    document.getElementById("carousel").src =  "'.$gett[1]['picUrl'].'";
                                                    change = 2;
                                                }
                                                else if(change ==2){
                                                    document.getElementById("carousel").src =  "'.$gett[0]['picUrl'].'";
                                                    change = 0;
                                                }
                                            }
                        function interval(){
                            time = setInterval(carousel, 2000);
                        }
                        window.onload = interval;</script>

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
        </html>
        <script>gauche();</script>';
    }
}

//if variables aren't set
else {
    header('Location: ../shopfail/shopfail.html');;
}
?>
