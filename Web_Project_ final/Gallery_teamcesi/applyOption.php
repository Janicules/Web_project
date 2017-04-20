<?php

session_start();
include("bdd_connect.php");


    // Tests if every variable is defined
				$delete = $conn->prepare("DELETE FROM gallery WHERE picUrl = 'oui.jpg'  ;");
				if (!$delete->execute()) {
					print_r($delete->errorInfo());
				}
                
                // refresh of the current page
                echo '<meta http-equiv="refresh" content="0;URL=gallery_teamcesi.php">';
          
               
  
?>