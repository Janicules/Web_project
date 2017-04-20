<?php
 //Start of the global variable SESSION :
    session_start();
    //If globals variables are sets :
    if (isset($_SESSION['account'])) {
    	$log = $_SESSION['account'];

		include("bdd_connect.php");
		$selec=$conn->prepare("SELECT * FROM product WHERE product.idProduct = ? ;");
		$cesi = $conn->prepare('SELECT `Status` FROM `users` WHERE Mail = ?;');

		$cesi->bindParam(1, $log);
		$cesi->execute();
		$r = $cesi->fetch();
		if($r['Status'] == 1){
			$selec->bindParam(1, $_GET['idprod']);
			$selec->execute();

			echo '<!DOCTYPE html>
			<html>
			<head>
			<!-- Definition of character used -->
				<meta charset="utf-8">
			<!-- Add a title to the page -->
				<title>BDE Cesi</title>
			</head>
			<style>
			.frame{
				width: 400px;
				height: 300px;
				border: 5px solid#c2242a;
			}
			.prod{
				margin-top: 10%;
				margin-left: 20%;
			}
			.cost{
				margin-top: 15%;
				margin-left: 20%;
			}
			.posupd{
				margin-top: 15%;
				margin-left: 40%;
			}
			.button {
				  display: inline-block;
				  padding: 5px 15px;
				  cursor: pointer;
				  text-align: center;
				  text-decoration: none;
				  outline: none;
				  background-color: #c2242a;
				  border-radius: 15px;
				  
			}
			.button:hover {background-color: purple}

			.button:active {
			  	background-color: purple;
			  	box-shadow: 0 5px #666;
			  	transform: translateY(4px);
			}
			</style>

			<body>

			<div class="frame">';
				$row=$selec->fetch();
				echo'
				<div class="prod">
				<form action="edit.php" method="GET">
				<input type="hidden" id="idprod" name="id" value="'.$row["idProduct"].'">
					Product : <input type="text" id="nameprod" name="name" value="'.$row["Name"].'" required>
				</div>
				<div class="cost">
					Price : <input type="text" id="price" name="price" value="'.$row["prodPrice"].'" required> euros
				</div>
				<div class="posupd">
				<input type="submit" class="button" value="Update">
				</div>
				</form>
				</div>

			</div>

			</body>
			</html>';
		}
		else{
			header('Location: ../Afterlogin/afterlogin.php');
		}
	}
	else{
		header('Location: ../shopfail/shopfail.html');
	}
?>