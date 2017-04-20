<?php
	session_start();
	//if(isset($_SESSION['account'])){
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			require('../Connection_To_BDD/connection_BDD.php');
			$delete = $bdd->prepare('DELETE FROM `cart_product` WHERE idcart = ?');

			$delete->bindParam(1, $id);
			$delete->execute();

			header('Location: Pannier_page.php');
		}
		
	// }
?>