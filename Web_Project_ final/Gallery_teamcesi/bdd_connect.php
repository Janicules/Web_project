<?php
	// CONNEXION À LA BASE

	try
	{
	  $conn = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');
	}
	  catch (Exception $e)
	{
	    die('Erreur de connexion : ' . $e->getMessage());
	}

?>
