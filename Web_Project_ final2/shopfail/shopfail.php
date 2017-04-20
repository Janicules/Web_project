<?php
    include("connection_BDD.php");


    //on teste si nos variables sont définies
    if(!empty($_POST['account']) AND !empty($_POST['password'])) {
            if (isset($_POST['account']) && isset($_POST['password'])) {

                $select = $connexion->prepare('SELECT Password, Mail FROM users WHERE Mail = ?;');

                $select->bindParam(1, $_POST['account']);
                $select->execute();

                $r = $select->fetch();
                $pass = $r['Password'];
                $account = $r['Mail'];
                // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
                if ($account == $_POST['account'] && password_verify($_POST['password'], $pass)) {
                    // dans ce cas, tout est ok, on peut démarrer notre session

                    // on la démarre :)
                    session_start ();
                    // on enregistre les paramètres de notre visiteur comme variables de session ($account et $password) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
                    $_SESSION['account'] = $_POST['account'];

                    // on redirige notre visiteur vers une page de notre section membre
                    header ('location: ../Afterlogin/afterlogin.php');
                }
                else {
                    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
                    echo '<body onLoad="alert(\'Member not found.\')">';
                    // puis on le redirige vers la page d'accueil
                    header ('location: ../login/login.php');
                }
            }
    }
    else {

        echo '<script type="text/javascript">
                        function show_alert() {
                        alert("One or more fields may be empty.");
                        }
                        show_alert();
                      </script>';
                header ('location: ../login/login.php');
    }
?>