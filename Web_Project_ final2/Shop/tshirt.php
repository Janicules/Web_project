<?php
session_start();
if(isset($_SESSION['account'])){
include("bdd_connect.php");
$get_tshirts=$conn->prepare("SELECT * FROM `product` WHERE `product`.`Category`= 'Tshirt' ");
$get_tshirts->execute();


echo '<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BDE Cesi</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script type="text/javascript" src="menu.js"></script><style>
.product {
    width: 50%;
    border: 5px solid#c2242a;
    padding: 75px;
    margin-left: 15%;
}
.square {
	width: 10%;
}
.choise {
	font-size:14px;
}
.button {
	  display: inline-block;
	  padding: 5px 15px;
	  cursor: pointer;
	  text-align: center;
	  text-decoration: none;
	  outline: none;
	  background-color: #c2242a;
	  border-radius: 15px;
	  
}
.button:hover {background-color: purple}

.button:active {
  	background-color: purple;
  	box-shadow: 0 5px #666;
  	transform: translateY(4px);
}
.tab {
	  display: inline-block;
	  padding: 5px 15px;
	  cursor: pointer;
	  text-align: center;
	  text-decoration: none;
	  border-color: 5px #000;
	  outline: none;
	  background-color: #c2242a;
	border: 2px inset black;
}
.tab:hover {background-color: purple}
.tabplace{
	margin-left: 15%;
}
@media all and (max-width: 712px) {
	/* Reduce the font size of the navigation elements of the shop\'s page */
	.tab{
		font-size:14px;
	}	
}
@media all and (max-width: 1213px) {
	/* Reduce the font size of text and the size of image */
	.aaa{
		width: 200px;
		height: 200px;
	}
}
@media all and (max-width: 1009px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:12px;
		margin-top: -5%;
		margin-right: -20%;
	}
	.aaa{
		width: 150px;
		height: 150px;
	}
}
@media all and (max-width: 873px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:10px;
	}
	.aaa{
		width: 100px;
		height: 100px;
	}
}
@media all and (max-width: 688px) {
	.product{
		width: 340px;
	}
	.choise{
		margin-right: -40%;
	}

}
</style>
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
<div class="tabplace">
<nav>
	<a href="all.php" class="tab" style="color:#fff">All</a>
	<a class="tab" style="color:#fff">T-shirts</a>
	<a href="mugs.php" class="tab" style="color:#fff">Mugs</a>
	<a href="keychains.php" class="tab" style="color:#fff">Keychains</a>
	<a href="hoodies.php" class="tab" style="color:#fff">Hoodies</a>
</nav>
</div>
<div class="product">
<script type="text/javascript">
	
	function add(name, price){

		location.href = \'addtshirt.php?nameprod=\'+name+\'&price=\'+price;
	}

</script>
';
	while ($row=$get_tshirts->fetch()){
	echo '<div style ="margin-right: 10%">
				<span class="choise" style="float: right; text-align;">
					<h1>'.$row["Name"].'</h1>
					<input type="hidden" id="nameprod" value="'.$row["Name"].'">
					Price : <input type="integer" id="price" class="square" value="'.$row["prodPrice"].'" readonly> euros</br>
				Size 
					<FORM>
				    <SELECT name="size" size="1">
				    <OPTION>S
				    <OPTION>M
				    <OPTION>L
				    <OPTION>X
				    </SELECT>
				    </FORM>

				Quantity
					<FORM>
				    <SELECT name="quantity" id="quantity" size="1">';
				    for($i=1; $i <= $row['Amount']; $i++){
	            			if($i==1){
	            				echo '<option value="'. $i .'" selected>'. $i .'</option>';
	            			}
	            			else{
	            			echo '<option value="'. $i .'">'. $i .'</option>';
	            			}
	            		}
				  	echo'</SELECT>
					</FORM></br>

				<a onclick="add(\''. $row['Name'] .'\','.$row["prodPrice"].')" id="addcart" class="button" style="color:#fff">Add to cart</a>
				</span>	
				<img class="aaa" src="'.$row["prodPic"].'" width="300px" height="300px"/>
				</div>';
	}	
echo'
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
</body>
</html>';
}
else{
	header('Location: ../shopfail/shopfail.html');
}
