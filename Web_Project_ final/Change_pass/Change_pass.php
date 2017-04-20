<?php
    //Start of the global variable SESSION :
    session_start();
    //If globals variables are sets :
    if (isset($_SESSION['account'])) {
            if(!empty($_POST['password']) AND !empty($_POST['new_password']) AND !empty($_POST['conf_new_password'])){
            //add of the script in the "connexion_BDD.php" file :
            include '../Connection_To_BDD/connection_BDD.php';

            //Realization of a prepared statment :
            $select = $bdd->prepare('SELECT Password FROM users WHERE mail = ? ;');
            $log = $_SESSION['account'];
            $select->bindParam(1, $log);
            $select->execute();
            
            $hash = $select->fetch();
            $password = htmlspecialchars($_POST['password']);
            $new_pass = htmlspecialchars($_POST['new_password']);
            $conf_new_pass = htmlspecialchars($_POST['conf_new_password']);

            if (password_verify($password, $hash['Password']) AND $new_pass == $conf_new_pass) {
                $update = $bdd->prepare('UPDATE `users` SET `Password`= ? WHERE `Mail` = ?;');
                $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
                $update->bindParam(1, $hashed);
                $update->bindParam(2, $log);
                $update->execute();

                header('Location: ../Profile_page/Profile_page.php');
            }

            else {
                header('Location: Change_password.php');
            }
        }
        else{
            header('Location: Change_password.php');
        }
    }
    else{
        header('Location: ../Afterlogin/afterlogin.php');
    }
?>