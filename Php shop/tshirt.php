<?php
session_start();
include("bdd_connect.php");
$get_tshirts=$conn->prepare("SELECT * FROM `product` WHERE `product`.`Object`= 'Tshirt' ");
$get_tshirts->execute();
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BDE Cesi</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script type="text/javascript" src="menu.js"></script>
<style>
.product {
    width: 50%;
    border: 5px solid#c2242a;
    padding: 75px;
    margin-left: 15%;
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
	margin-top: 10%;
}
@media all and (max-width: 712px) {
	/* Reduce the font size of the navigation elements of the shop's page */
	.tab{
		font-size:14px;
	}	
}
@media all and (max-width: 1213px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:14px;
	}
	.aaa{
		width: 200px;
		height: 200px;
	}
}
@media all and (max-width: 880px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:12px;
	}
	.aaa{
		width: 150px;
		height: 150px;
	}
}
@media all and (max-width: 708px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:10px;
	}
	.aaa{
		width: 100px;
		height: 100px;
	}
	.choise{
		margin-top: -15%;
	}
}
@media all and (max-width: 540px) {
	/* Reduce the font size of text and the size of image */
	.choise{
		font-size:9px;
	}
	.aaa{
		width: 75px;
		height: 75px;
	}
	.choise{
		margin-top: -15%;
	}
	.tab{
		font-size:10px;
	}
	.tabplace{
		margin-left: 5%;
	}
	.product{
		margin-left:5%;
	}
}
@media all and (max-width: 384px) {
	.choise{
		font-size:8px;
		margin-top: -30%;

	}
	.aaa{
		width: 50px;
		height: 50px;
		margin-top: -5%;
		margin-left: -20%;

	}
	.tab{
		font-size:8px;
	}
	.tabplace{
		margin-left: 1%;
	}
	.product{
		margin-left:1%;
		padding: 75px 65px;
	}

}
</style>
</head>

<body>

<header id="header">
			<!-- Create a block of elements -->
			<div id="red_bar">

					<img src="../Image/logo.png" alt="Logo of Exia CESI">

					<nav>
						<!-- Links with same properties thanks to the attribute "class" -->
						<a href="" class="selected">Gallery</a>
						<a href="" class="selected">Schedule</a>
						<a href="" class="selected">Shop</a>
						<a href="" class="selected">Pinned Pictures</a>
					</nav>

					<a href="" id="logout" class="log">Logout</a>
					<a href="" class="log">Your Account</a>

			</div>

			<div id="white_bar">
					<nav>
						<a href=""><i class="fa fa-facebook-square"></i>&nbsp Facebook</a>
						<a href=""><i class="fa fa-twitter-square"></i>&nbsp Twitter</a>
						<a href=""><i class="fa fa-youtube-square"></i>&nbsp Youtube</a>
						<a href=""><i class="fa fa-shopping-cart"></i>&nbsp Cart</a>
					</nav>

			</div>

</header>
<div class="tabplace">
<nav>
	<a href="all.html" class="tab" style="color:#fff">All</a>
	<a href="tshirt.html" class="tab" style="color:#fff">T-shirts</a>
	<a href="mugs.html" class="tab" style="color:#fff">Mugs</a>
	<a href="keychains.html" class="tab" style="color:#fff">Keychains</a>
	<a href="hoodies.html" class="tab" style="color:#fff">Hoodies</a>
</nav>
</div>
<div class="product">
<?php
	while ($row=$get_tshirts->fetch()){
	echo'<div style ="margin-right: 10%">
	<span class="choise" style="float: right; text-align;">
	<h1>'.$row["Object"].'</h1>
		Price : '.$row["prodPrice"].' euros</br></br>
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
		    <SELECT name="quantity" size="1">
		    <OPTION>1
		    <OPTION>2
		    <OPTION>3
		    <OPTION>4
		    </SELECT>
		    </FORM></br>

	<a href="#" class="button" style="color:#fff">Add to cart</a>
	</span>	
	<img class="aaa" src="'.$row["prodPic"].'" width="300px" height="300px"/>
	</div>';
	}	
?>
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
</body>
</html>
