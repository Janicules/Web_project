<?php
//Test de la connexion à la base de données :
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=web_project;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        echo 'The DataBase is on hollydays, try again later';
        exit();
}
?>