<?php
	session_start();
	//if(isset($_SESSION['account'])){
		require('../Connection_To_BDD/connection_BDD.php');
		$select = $bdd->prepare('SELECT `idcart`, `cartName`, `cartProdPrice` FROM `cart_product` WHERE mail = ?;');

		// $name = $_SESSION['account'];
		$name = 'wilou@gmail.com';
		$select->bindParam(1, $name);
		$select->execute();

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
        <link rel="stylesheet" href="Pannier_page.css" />
        <!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script type="text/javascript">
        	jQuery(function($){
				$(\'#checkout\').hide();
				$(\'#valid\').hide();

        	});
        </script>
        <script src="Pannier_page.js"></script>
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
                        <a href="../Agenda_page/Agenda_page.php" class="selected">Schedule</a>
                        <a href="../Shop/Shop.html" class="selected">Shop</a>
                        <a href="../Pinned_Gallery/pinned_gallery.html" class="selected">Pinned pictures</a>
                    </nav>

                    <a href="../homepage/homepage.html" id="logout" class="log">Log out</a>
                    <a href="../Profile_page/Profile_page.php" class="log">Your account</a>

            </div>

            <div id="white_bar">
                    <nav>
                        <a href=""><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
                        <a href=""><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
                        <a href=""><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
                        <a href="../Pannier_page/Pannier_page.html"><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
                    </nav>
            </div>
        </header>

		<p id="para">My cart</p>
        <!-- Add a block of elements -->
        <div id="my_cart">
        	<!-- Add a block for the payment -->
        	

    		<!-- Add a block of elements for the products -->
           	<div id="product" class="pannier">';
           	while($r = $select->fetch()){
           		$select2 = $bdd->prepare('SELECT `Amount` , `prodPic` FROM `product` WHERE Name = ?;');
           		$select2->bindParam(1, $r['cartName']);
           		$select2->execute();
	           	$r2 = $select2->fetch();
	           	$k=0;
	           		echo	
	           		'<!-- Add a block of elements for the product 1 -->
		        	<div class="product">
		        		<!-- Add an image of the product -->
		        	   	<img class="img_prod" src="'.$r2['prodPic'].'" alt="'. $r['cartName'].'">
		        	<!-- Add a block of inline elements -->
		            <span>
		            	<!-- Add a form to put a scroll menu and choose how many product 1 we want -->
		            	<form class="form">
		            		<!-- Create a scroll menu with 6 values -->
		            		<select id="'. $r['idcart'].'_select" name="number" onchange="price('. $r['idcart'] .', '. $r['cartProdPrice'].')" class="select">';
		            		for($k=0; $k <= $r2['Amount']; $k++){
		            			if($k==1){
		            				echo '<option value="'. $k .'" selected>'. $k .'</option>';
		            			}
		            			else{
		            			echo '<option value="'. $k .'">'. $k .'</option>';
		            			}
		            		}
		            		echo '	<!-- End of the scroll menu -->
		            		</select>
		            	<!-- End of the form -->
		            	</form>
		            	<!-- Add a paragraph to show the name of the product 1 -->
		            	<p class="carac">'. $r['cartName'] .'</p>
		            	<!-- Add a paragraph to show the price of the product 1 -->
		            	<p class="price"> Price : <span id="'. $r['idcart'] .'_span">'. $r['cartProdPrice'].'</span> €</p>
		            	<!-- Add a button to delete the choice of the product 1 -->
		            	<a href="delete.php?id='.$r['idcart'].'"><button class="button" type="button">Delete</button></a>
		            </span>	
		           	</div>';
	       	}
	       		
	        	echo '<p id="total">Total price : <span id="total_price"></span> €</p>';
	        	echo '<script>total()</script>';
	        	
	        echo '</div>

	        <div id="paypal" class="pannier">
	        	<!-- Add a "big" paragraph like Title 1 in World -->
	           	<h1>Paypal payment</h1>
	           	<!-- Creation of a form to pay -->
	           	<form id="form_pay" method="POST">
	           		<!-- Label to inform the user about the next textbox -->
	           		<label for="account">Email / Account name</label><br>
	           		<!-- Textbox to recover the email / account name of the user -->
	           		<input type="text" name="account" id="account"><br>
	           		<!-- Label to inform the user about the next textbox -->
	           		<label for="password">Password</label><br>
	           		<!-- Textbox to recover the password of the user (password crypted) -->
	           		<input type="password" name="password" id="password"><br>
	           		<!-- Button to submit the form -->
	           		<input id="submit" type="button" value="Proceed to checkout" onclick="hide()">
	           	<!-- End of the form -->
	           	</form>
	        <!-- End of the block for the payment -->
    		</div>
        <!-- End of the block -->
        </div>
        <div id="checkout">
        	<img src="../Images/chargement.gif" alt="load">
        </div>

        <div id="valid">
        	<p>Your order has been successfully sent, thank you for your purchase !</p>
        	<a href="drop.php"><button type="button">Back to the homepage</button></a>
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
</html>';
	// }
?>