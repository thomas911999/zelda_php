<?php

    require "../function.php";
    $msg = valid_donnees($_POST["msg"]);
    $id_message = valid_donnees($_GET["change"]);
    $id_topic = valid_donnees($_GET["topic"]);

    require "../config.php";

    $bdd = connect();

    $update_msg = $bdd->prepare("UPDATE message 
                        SET contenu = :msg
                        WHERE Id_Message = :id_msg");
    $update_msg->execute(array(":msg" => "$msg", ":id_msg" => "$id_message"));
    header("Location: ../topic/message.php?topic=$id_topic");
?>