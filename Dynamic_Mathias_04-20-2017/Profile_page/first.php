<?php

	//Stat of the global variable SESSION :
	session_start();

	if (isset($_SESSION['account'])){
		if(!empty($_GET['first'])){
			//add of the script in the "connexion_BDD.php" file :
		 	include '../Connection_To_BDD/connection_BDD.php';

			$update = $bdd->prepare('UPDATE `users` SET `Firstname`= ? WHERE mail = ?;');
		 	//Put the variable "log" to the global variable SESSION['account'] :
			$log = $_SESSION['account'];
			$first = $_GET['first'];

			//We replace the information in the prepared statment by the "log" variable :
	 		$update->bindParam(1, $first);
	 		$update->bindParam(2, $log);
			//Execution of the prepared statment :
			$update->execute();

			header('Location: Profile\'s_page.php');
		}
		else{
			echo 'You don\'t have enter a new firstname';
			header('Location: Profile\'s_page.php');
		}
	}
	else{
		echo 'Variables undefined';
	}
?>