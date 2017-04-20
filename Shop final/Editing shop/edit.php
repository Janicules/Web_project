<?php
include("bdd_connect.php");
$upd_prod=$conn->prepare("UPDATE product SET Name = ?, prodPrice = ? WHERE product.idProduct = ?;");

$upd_prod->bindParam(1, $_GET['name']);
$upd_prod->bindParam(2, $_GET['price']);
$upd_prod->bindParam(3, $_GET['id']);
$upd_prod->execute();
header('Location: all.php');

?>