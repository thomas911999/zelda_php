<?php

    session_start();

    require "../function.php";
    require "../config.php";

    $titre = valid_donnees($_POST["topic"]);

    $pseudo = $_SESSION["user"];
    $id_user = $_SESSION["user_id"];

    $bdd = connect();
    $topic = $bdd->prepare("INSERT INTO topic(date_ajout,libelle,Id_utilisateur)
                                VALUES (CURRENT_TIMESTAMP(), :titre, :id_user)");
    $topic->execute(array(":titre" => "$titre" , ":id_user" => "$id_user"));

    if (isset($_POST["message"]))
    {
        $msg = valid_donnees($_POST["message"]);
        $id_topic = $bdd->lastInsertId();
        $sql = $bdd->prepare("INSERT INTO message(Id_topic,Id_utilisateur,contenu,h_message)
                            VALUES (:id_topic,:user,:msg, CURRENT_TIMESTAMP())");
        $sql->execute(array(":id_topic" => "$id_topic",":user" => "$id_user", ":msg" => "$msg"));
        header("Location: topic_accueil.php");
    } 	
    

?>