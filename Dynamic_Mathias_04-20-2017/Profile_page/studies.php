<?php

	//Stat of the global variable SESSION :
	session_start();

	if (isset($_SESSION['account'])){
		if($studies != "EXIA" OR $studies != "GMSI" OR $studies != "RH"){
			//add of the script in the "connexion_BDD.php" file :
			include '../Connection_To_BDD/connection_BDD.php';

			$update = $bdd->prepare('UPDATE `users` SET `studies`= ? WHERE ?;');
			//Put the variable "log" to the global variable SESSION['account'] :
			$log = $_SESSION['account'];
			$studies = $_GET['studies'];

			//We replace the information in the prepared statment by the "log" variable :
	 		$update->bindParam(1, $studies);
	 		$update->bindParam(2, $log);
			//Execution of the prepared statment :
			$update->execute();

			header('Location: Profile\'s_page.php');
		}
		else{
			echo 'You don\'t have enter a new studies';
			header('Location: Profile\'s_page.php');
		}
	}
	else{
		echo 'Variables undefined';
	}
?>