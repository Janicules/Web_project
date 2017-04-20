<?php
session_start();
include("bdd_connect.php");
$get_all_product=$conn->prepare("SELECT * from product");
$get_all_product->execute();
?>

<!DOCTYPE html>
<html>
<head>
<!-- Definition of character used -->
	<meta charset="utf-8">
<!-- Add a title to the page -->
	<title>BDE Cesi</title>
<!-- Bond the HTML page to a CSS page -->
	<link rel="stylesheet" href="style.css">
<!-- Bond the HTML page to a CSS page which allow to put icon in front of Facebook, Twitter,  YouTube and Cart -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
.product {
    width: 60%;
    border: 5px solid#c2242a;
    margin-left: 15%;
}
.square {
	width: 10%;
}
.postext{
	margin-right: 35%;
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
.choise{
	font-size: 14px;
}
.textedd{
	margin-left: 40%;
	font-family:arial;
	font-size: 25px;
}
.adpro{
	margin-left: 5%;
}
.posimg{
	margin-top: 5%;
	margin-left: 5%;
}
.button2{margin-top: 15%;margin-right: 50%;}
.posmenu1{
	margin-top: 10%;
	margin-right: 70%;
}
@media all and (max-width: 1181px) {
	/* Reduce the font size of the navigation elements of the shop's page */
	.button{
		font-size: 14px;
	}
	.obj{
		width:100px; 
		height:100px;
		margin-top: 10%;
	}
	.choise{
		font-size: 13px;
		margin-top: 10%;
	}
	.posmenu1{
		font-size: 12px;
		margin-top: 70%;
	}
	.posbutton{
		margin-top: 10%;
	}
}

@media all and (max-width: 1031px) {
	/* Reduce the font size of the navigation elements of the shop's page */
.textedd{
	font-size: 20px;
	}
.posmenu1{
	margin-top: 60%;
}
.choise{
		font-size: 9px;
	}
}
@media all and (max-width: 963px) {
	.product{
		width: 570px;
	}
}
</style>
</head>

<body>

<header id="header">
			<!-- Create a block of elements -->
			<div id="red_bar">

					<img src="Image/logo.png" alt="Logo of Exia CESI">

					<nav>
						<!-- Links with same properties thanks to the attribute "class" -->
						<a href="" class="selected">Gallery</a>
						<a href="" class="selected">Schedule</a>
						<a href="all.php" class="selected">Shop</a>
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
	<a class="tab" style="color:#fff">All</a>
	<a href="../php shop cesi/all.php" class="tab" style="color:#fff">Back to the shop</a>
</nav>
</div>
<div class="product">
<script type="text/javascript">
	
	function editmenu(idprod){

		location.href = 'editmenu.php?idprod='+idprod;
	}

</script>
	<div class="textedd">
		<a>Shop Editing</a>
	</div>
	<div class="adpro">
		<a href="#" class="button" style="color:#fff">Add a product</a>
	</div>
<?php
	while ($row=$get_all_product->fetch()){
	echo '<div>
	<input type="hidden" id="idprod" value="'.$row["idProduct"].'">
	<span class="posbutton" style="float: right;">
		<div class="button2">
		<a onclick="editmenu('. $row['idProduct'] .')" id="editprod" class="button" style="color:#fff">Edit</a>
		</div>
	</span>
	<div>
	<span class="posmenu" style="float: right;">
		<div class="posmenu1">
		Size 
			<FORM>
		    <SELECT name="size" size="1">
		    <OPTION>S
		    <OPTION>M
		    <OPTION>L
		    <OPTION>X
		    </SELECT>
		    </FORM>
		</div>
	</span>
	<div class="postext">
	<span class= "choise" style="float: right;">
	<div class= "desc">
	<h1>'.$row["Name"].'</h1></br>
	Price : <input type="integer" id="price" class="square" value="'.$row["prodPrice"].'" readonly> euros</br>
	</div>
	</span>
	<div class ="posimg">
		<img class="obj" src="'.$row["prodPic"].'" width="150px" height="150px"/>
	</div>
	</div>
	</div>
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
