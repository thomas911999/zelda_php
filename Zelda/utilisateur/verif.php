
<?php
        session_start(); 

        // unset($_SESSION["autorisation"]);
        // unset($_SESSION["admin"]);
        // session_destroy();       
            $login = $_POST["pseudo"];
            $mdp = $_POST["password"];

            $mdp = md5($mdp);                     
            require "../config.php";
            $bdd = connect();

            // $sql = "select * from admin where (login = ':pseudo' OR email = ':email')  AND password = '$mdp'";
            $sql = $bdd->prepare("select Id_utilisateur as id, pseudo from utilisateur where ( pseudo = :pseudo OR email = :pseudo)  AND mdp = :mdp");
            $sql->execute(array("pseudo" => "$login", "mdp" => "$mdp" ));

            $nb_lignes = $sql->rowCount();            
            if ($nb_lignes == 0)
            {
                $erreur = "Pseudo , email ou mot de passe incorrect  , veuillez réésayer !";
                  header("Location: indexuser.php?erreur=$erreur");
            }
            else
            {
                $log = $sql->fetch(PDO::FETCH_OBJ);
                $_SESSION["user"] = $log->pseudo;
                $_SESSION["user_id"] = $log->id;
                $_SESSION["autorisation"] = "OK";
                header("Location: ../index.php");
            }
 ?>