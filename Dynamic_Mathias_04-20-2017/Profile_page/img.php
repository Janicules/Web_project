<?php

	//Stat of the global variable SESSION :
	session_start();
	
	if (isset($_SESSION['account'])){
		if(!empty($_GET['file'])){
			//add of the script in the "connexion_BDD.php" file :
		 	include '../Connection_To_BDD/connection_BDD.php';

		 	$update = $bdd->prepare('UPDATE `users` SET `ProfilePic`= ? WHERE ?;');
		 	//Put the variable "log" to the global variable SESSION['account'] :
			$log = $_SESSION['account'];
			$file = $_GET['file'];
		
			//We replace the information in the prepared statment by the "log" variable :
	 		$update->bindParam(1, $file);
	 		$update->bindParam(2, $test);
			//Execution of the prepared statment :
			$update->execute();

			header('Location: Profile\'s_page.php');
		}
		else{
			echo 'You don\'t have enter a new picture';
			header('Location: Profile\'s_page.php');
		}
	}
	else{
		echo 'Variables undefined';
	}
?>