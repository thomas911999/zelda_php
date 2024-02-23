<?php
    session_start();


    require "../config.php";

    $bdd = connect();
    $user_id = $_SESSION["user_id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenon"];
    $path = $_POST["img"];
    if (!empty($_FILES["image"]["name"]))
    {
        echo "toto";
        $image = $_FILES["image"];
        $image_nom = $image["name"];
        $path = "Images/profil/$image_nom";
        move_uploaded_file($image["tmp_name"], "../$path");
    }
     
        $sql = $bdd->prepare("update utilisateur 
        SET nom= :nom, prenom= :prenon , photo= :photo
        WHERE Id_utilisateur= :id");

        $sql->execute(array(":nom" => "$nom", ":prenon" => "$prenom", ":photo" => "$path", ":id" => "$user_id"));
 
        header("Location: ../index.php");

?>