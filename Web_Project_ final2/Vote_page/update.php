<?php
	session_start();
	//if(isset($_SESSION['account'])){
		if(!empty($_GET['date']) && !empty($_GET['name']) && !empty($_GET['time'])){
			require('../Connection_To_BDD/connection_BDD.php');
			$date = $_GET['date'];
			$name = $_GET['name'];
			$timer = $_GET['time'];
			$updates = $bdd->prepare('UPDATE `activities` SET `Vote`= Vote+1 WHERE actDate = ? AND actName = ? AND actTime = ?;');

			$updates->bindParam(1, $date);
			$updates->bindParam(2, $name);
			$updates->bindParam(3, $timer);
			$updates->execute();

			header('Location: ../Afterlogin/afterlogin.php');
		}
	//}
?>