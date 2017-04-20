<?php

	//Stat of the global variable SESSION :
	session_start();

	if (isset($_SESSION['account'])){
		if(!empty($_GET['mail'])){
			//add of the script in the "connexion_BDD.php" file :
		 	include '../Connection_To_BDD/connection_BDD.php';
		 	$select = $bdd->prepare('SELECT Mail FROM users WHERE Mail = ?;');
		 	$select->bindParam(1, $_GET['mail']);
		 	$select->execute();

		 	if(!empty($r = $select->fetch())){
		 		header('Location: Profile_page.php');
		 	}
		 	else {
			 	$update = $bdd->prepare('UPDATE `users` SET `mail`= ? WHERE mail = ?;');
			 	//Put the variable "log" to the global variable SESSION['account'] :
				$log = $_SESSION['account'];
				$mail = $_GET['mail'];
			
				//We replace the information in the prepared statment by the "log" variable :
		 		$update->bindParam(1, $mail);
		 		$update->bindParam(2, $log);
				//Execution of the prepared statment :
				$update->execute();
				$_SESSION['account'] = $_GET['mail'];
				
				header('Location: Profile_page.php');
			}	
		}
		else{
			echo 'You don\'t have enter a new mail';
			header('Location: Profile_page.php');
		}
	}
	else{
		echo 'Variables undefined';
	}
?>