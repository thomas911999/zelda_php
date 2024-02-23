<?php

    session_start();
    
    require "../function.php";

    require "../config.php";

    $bdd = connect();

    $id_topic = $_GET["topic"];

    if (isset($_POST["message"]) && !empty($_POST["message"]))
    {
        $msg = valid_donnees($_POST["message"]);
        $id_user = $_SESSION["user_id"];
        $new_message = $bdd->prepare("INSERT INTO message(Id_topic,id_utilisateur,contenu,h_message) 
                                        VALUES (:id_topic, :id_user, :contenu, CURRENT_TIMESTAMP())");
        $new_message->execute(array(":id_topic" => "$id_topic", ":id_user" => "$id_user", ":contenu" => "$msg"));
    }
    header("Location: message.php?topic=$id_topic");

?>