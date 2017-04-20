<?php
session_start();
if(isset($_SESSION['account'])){
	$log = $_SESSION['account'];
	include("bdd_connect.php");
	$cesi = $conn->prepare('SELECT `Status` FROM `users` WHERE Mail = ?;');

    $cesi->bindParam(1, $log);
    $cesi->execute();
    $r = $cesi->fetch();
    if($r['Status'] == 1){
		$upd_cartprod=$conn->prepare("INSERT INTO `cart_product` (`cartName`, `cartProdPrice`, `mail`) VALUES (? , ? , ?)");
		$upd_cartprod->bindParam(1, $_GET['nameprod']);
		$upd_cartprod->bindParam(2, $_GET['price']);
		$upd_cartprod->bindParam(3, $log);
		$upd_cartprod->execute();

		header('Location: hoodies.php');
	}
	else{
		header('Location: ../Afterlogin/afterlogin.php');
	}
}
else{
	header('Location: ../shopfail/shopfail.html');
}
?>


