<?php
	session_start();
	//if(isset($_SESSION['account'])){
			require('../Connection_To_BDD/connection_BDD.php');

			$select = $bdd->prepare('SELECT `cartName`, `mail` FROM `cart_product`;');
			$insert = $bdd->prepare('INSERT INTO `purchase_history`(`Buyer`, `dateOfPurchase`, `product`) VALUES (?,?,?);');
			$drop = $bdd->prepare('DROP TABLE cart_product');
			$create = $bdd->prepare('
			CREATE TABLE cart_product(
	        idcart        int (11) Auto_increment  NOT NULL ,
	        cartName      Varchar (255) NOT NULL ,
	        cartProdPrice Int NOT NULL ,
	        mail          Varchar (255) NOT NULL ,
	        PRIMARY KEY (idcart )
			)ENGINE=InnoDB;');

			$date = date('Y-m-d');

			$select->execute();
			while($r = $select->fetch()){
				$insert->bindParam(1, $r['mail']);
				$insert->bindParam(2, $date);
				$insert->bindParam(3, $r['cartName']);
				$insert->execute();
			}
			$drop->execute();
			$create->execute();

			header('Location: ../homepage/homepage.php');		
	// }
?>