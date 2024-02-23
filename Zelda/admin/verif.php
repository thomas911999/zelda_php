
<?php
        session_start(); 
        // unset($_SESSION["autorisation"]);
        // unset($_SESSION["admin"]);
        // session_destroy();       
        if (isset($_POST["close"]) || empty($_POST["login"]) || empty($_POST["password"]))
            header("Location: ../index.php");
        else
        {
            $login = $_POST["login"];
            $pwd = $_POST["password"];

            $pwd = md5($pwd);
            $sql = "select * from admin where login = '$login' AND password = '$pwd'";                      
            require "../config.php";
            $bbd = connect();
            $result = $bbd->query($sql);
            $nb_lignes = $result->rowCount(); 
            $log = $result->fetch(PDO::FETCH_OBJ);           
            if ($nb_lignes == 0)
                 header("Location: ../index.php");
            else
            {
                $_SESSION["admin"] = $log->login;
                $_SESSION["autorisation"] = "OK";
                 header("Location: accueilAdmin.php");
            }
        }
 ?>