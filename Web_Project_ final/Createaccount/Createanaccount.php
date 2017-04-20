<?php

session_start();
include("bdd_connect.php");

    // Tests if every variable is defined
    if(!empty($_POST['fname']) AND !empty($_POST['lname']) AND !empty($_POST['account']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['studies'])){

        $select = $conn->prepare('SELECT Mail FROM users WHERE Mail = ?;');
        $select->bindParam(1, $_POST['account']);
        $select->execute();
        if(!empty($r = $select->fetch())){
            header('Location: createaccount.html');
        }
        else{
            if($_POST['password'] == $_POST['password2'])
            {
                $fname = htmlspecialchars($_POST['fname']);
                $lname = htmlspecialchars($_POST['lname']);
                $account = htmlspecialchars($_POST['account']);
                $studies = htmlspecialchars($_POST['studies']);
                $status = 0;
                $img = $_POST['img'];

                //Password encryption

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $insert = $conn->prepare("INSERT INTO `users`(`Password`, `Lastname`, `Firstname`, `Mail`, `Status`, `ProfilePic`, `Studies`) VALUES (?, ?, ?, ?, ?, ?, ?);");
                $insert->bindParam(1, $password);
                $insert->bindParam(2, $lname);
                $insert->bindParam(3, $fname);
                $insert->bindParam(4, $account);
                $insert->bindParam(5, $status);
                $insert->bindParam(6, $img);
                $insert->bindParam(7, $studies);
                $insert->execute();



                
                // on enregistre les paramètres de notre visiteur comme variables de session ($account et $password) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
                $_SESSION['account'] = $_POST['account'];
                // on redirige notre visiteur vers une page de notre section membre
                echo '<meta http-equiv="refresh" content="0;URL=../Afterlogin/afterlogin.php">';
            }
            else
            {
                echo '<script type="text/javascript">
                        function show_alert() {
                        alert("Your passwords don\'t match.");
                        }
                        show_alert();
                      </script>';
                echo '<meta http-equiv="refresh" content="0;URL=createaccount.html">';
               

            }
        
        }   
    }

    else {
        echo 'Form variables are not declared.';
        echo '<meta http-equiv="refresh" content="0;URL=createaccount.html">';
    }
?>