<?php

session_start();
include("bdd_connect.php");


    // Tests if every variable is defined
    if(!empty($_POST['text'])){
                $picUrl = 'oui.jpg';
                $idPic = 0;
				$datePic = date("Y-m-d");
				$likePic = 0;
				$idUser = 1;
				$idAct = 1;

				$insert = $conn->prepare("INSERT INTO gallery VALUES (?, ?, ?, ?, ?, ?);");
				$insert->bindValue(1, $idPic);
				$insert->bindValue(2, $picUrl);
				$insert->bindValue(3, $datePic);
				$insert->bindValue(4, $likePic);
				$insert->bindValue(5, $idUser);
				$insert->bindValue(6, $idAct);
				if (!$insert->execute()) {
					print_r($insert->errorInfo());
				}
                
                // refresh of the current page
                echo '<meta http-equiv="refresh" content="0;URL=gallery_users.php">';
          
               
   }

    else {
        echo 'Form variables are not declared.';
        
    }
?>