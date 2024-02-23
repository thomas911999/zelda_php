<?php
    
    session_start();
    if (isset($_SESSION["user_id"]))
    {
        require "../function.php";
        $id = valid_donnees($_GET["id"]);
        $topic = valid_donnees($_GET["topic"]);

        require "../config.php";
        $bdd = connect();

        $remove_msg = $bdd->prepare("DELETE FROM message
                                        WHERE Id_Message = :Id_msg");
        $remove_msg->execute(array(":Id_msg" => "$id"));

        header("Location: message.php?topic=$topic");
    }
    else
        header("Location: ../index.php");

?>