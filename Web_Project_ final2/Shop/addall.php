<?php
session_start();
if(isset($_SESSION['account'])){
	$log = $_SESSION['account'];
	include("bdd_connect.php");
	$upd_cartprod=$conn->prepare("INSERT INTO `cart_product` (`cartName`, `cartProdPrice`, `mail`) VALUES (? , ? , ?)");
	$upd_cartprod->bindParam(1, $_GET['nameprod']);
	$upd_cartprod->bindParam(2, $_GET['price']);
	$upd_cartprod->bindParam(3, $log);
	$upd_cartprod->execute();

	header('Location: all.php');
}
else{
	header('Location: ../shopfail/shopfail.html');
}
?>


