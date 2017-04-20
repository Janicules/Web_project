<?php

	//Stat of the global variable SESSION :
	session_start();

	// if (isset($_SESSION['account'])){
		if(isset($_GET['blc'])){
			$i = $_GET['blc'];
			for($j=0; $j <= $i; $j++){
				$n = 'name'.$j;
				$d = 'date'.$j;
				$t = 'time'.$j;
				$p = 'price'.$j;
				if(!empty($_GET[$n]) && !empty($_GET[$d]) && !empty($_GET[$t])){
					//add of the script in the "connexion_BDD.php" file :
				 	include '../Connection_To_BDD/connection_BDD.php';

				 	$insert = $bdd->prepare('INSERT INTO `activities` (`actName`, `actLocation`, `actPrice`, `actDate`, `Vote`, `actTime`) VALUES (?,?,?,?,?,?);');
					$name = $_GET[$n];
					$date = $_GET[$d];
					$vote = '0';
					$time = $_GET[$t];
					$price = '';
					$location = '';
					if(isset($_GET[$p])){
						$price = $_GET[$p];
					}
					else{
						$price = '0';
					}

					if($name == 2){
						$location = 'Orléans';
						$name = "Afterwork";
					}
					else if($name == 5){
						$location = 'Orléans';
						$name = "Basketball";
					}
					else if($name == 6){
						$location = 'Orléans';
						$name = "Football";
					}
					if($name == 1){
						$location = 'Olivet';
						$name = "Bowling";
					}
					else if($name == 4){
						$location = 'Saran';
						$name = "Laser game";
					}
					else if($name == 3){
						$location = 'La source';
						$name = "Mini-golf";
					}
				
					//We replace the information in the prepared statment by the "log" variable :
			 		$insert->bindParam(1, $name);
			 		$insert->bindParam(2, $location);
					$insert->bindParam(3, $price);
					$insert->bindParam(4, $date);
					$insert->bindParam(5, $vote);
					$insert->bindParam(6, $time);
					//Execution of the prepared statment :
					$insert->execute();
					
					header('Location: homepage.php');
				}
				else{
					header('Location: Event_Creation.html');
				}
			}
		}
		else{
			header('Location: Event_Creation.html');
		}
	// }
	// else{
	// 	echo 'Variables undefined';
	// }
?>