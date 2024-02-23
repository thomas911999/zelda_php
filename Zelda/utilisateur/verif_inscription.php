<?php

    require "../config.php";

    require "../function.php";
    
    $nom = valid_donnees($_POST["nom"]);
    $prenon = valid_donnees($_POST["prenon"]);
    $pseudo = valid_donnees($_POST["pseudo"]);
    $email = valid_donnees($_POST["email"]);
    $mdp = valid_donnees($_POST["mdp"]);

    $mdp = md5($mdp);

    $bdd = connect();

    $same = $bdd->prepare("SELECT email,pseudo from utilisateur WHERE email = :email OR pseudo = :pseudo");
    $same->execute(array(":email" => "$email", ":pseudo" => "$pseudo"  ));
    $nb_lignes = $same->rowCount();

    if ($nb_lignes == 0)
    {
        $sql = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,email,mdp,pseudo,photo)
                     VALUES(:nom, :prenon, :email , :mdp, :pseudo,'Images/profil/img-default.jpg');");
        $sql->execute(array(":nom"=>"$nom",
        ":prenon"=>"$prenon", ":email" => "$email", ":mdp" => "$mdp" , ":pseudo" => "$pseudo"  ));
     header("Location: ../index.php");
    }
     else
     {
         $erreur = "Pseudo ou email déja utilisé , veuillez en choisir un autre !";
         header("Location: inscription.php?erreur=$erreur"); 
     }
?>