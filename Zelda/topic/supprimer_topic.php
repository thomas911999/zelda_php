<?php
    
    session_start();
    unset($_SESSION["delete"]);
    if (isset($_SESSION["user_id"]))
    {
        require "../function.php";
        $id = valid_donnees($_GET["id"]);

        require "../config.php";
        $bdd = connect();

        $remove_msg = $bdd->prepare("DELETE FROM message
                                        WHERE Id_topic = :Id_topic");
        $remove_msg->execute(array(":Id_topic" => "$id"));

        $remove_topic = $bdd->prepare("DELETE FROM topic WHERE Id_topic = :Id_topic");
        $remove_topic->execute(array(":Id_topic" => "$id"));
        header("Location: topic_accueil.php");
    }
    else
        header("Location: ../index.php");

?>