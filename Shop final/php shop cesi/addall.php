<?php
include("bdd_connect.php");
$upd_cartprod=$conn->prepare("INSERT INTO `cart_product` (`cartName`, `cartProdPrice`, `mail`) VALUES (? , ? , 'user')");
$upd_cartprod->bindParam(1, $_GET['nameprod']);
$upd_cartprod->bindParam(2, $_GET['price']);
$upd_cartprod->execute();

header('Location: all.php');

?>


