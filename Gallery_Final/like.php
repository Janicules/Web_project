<?php

session_start();
include("bdd_connect.php");


    // Tests if every variable is defined
				$like = $conn->prepare("INSERT INTO gallery VALUES (,,,1,) WHERE picUrl = $resultat  ;");
				if (!$like->execute()) {
					print_r($delete->errorInfo());
				}
                
                // refresh of the current page
                echo '<meta http-equiv="refresh" content="0;URL=gallery_users.php">';
          
               
  
?>