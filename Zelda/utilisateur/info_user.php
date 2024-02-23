<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link href="../init.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Images/logo-modified.png"/>
    <link href="../index.css" rel="stylesheet">
    <link href="../config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link href="../topic/topic.css" rel="stylesheet">    
    <link href="user.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
    $champ = 1;
    require "bodyuser.php";
    ?>
    <div class="container">
        <?php
            require "../config.php";

            require "../topic/edit_msg.php";

            $bdd = connect();

            $user_id = $_SESSION["user_id"];
            $user_information = $bdd->prepare("SELECT * FROM utilisateur WHERE Id_utilisateur = :user");
            $user_information->execute(array(":user" => $user_id));

            $user = $user_information->fetch(PDO::FETCH_OBJ);
            $nom = $user->nom;
            $prenon = $user->prenom;
            $email = $user->email;
            $pseudo = $user->pseudo;
            

            $photo = $user->photo;          
        ?>
    <div class="row justify-content-center mt-3 mb-3">
            <div class="CR8 w-70 mt-4 pt-3 px-3 pb-2" style="background: transparent;border: none;color: #3b2989;">
                <h1 class="mb-3 text-center m-2 fs-2 mt-4">Information du profil </h1>

                <div class="row pt-3 px-3 pb-2"  style="background: #68897354;border-radius: 15px;">
                <div class="col-2 d-table">
                    <div class="d-table-cell align-middle">
                        <img src="../<?=$photo?>" alt="" class="p-1 rounded-circle"
                            style="height: 120px; width: 120px">
                    </div>
                </div>
                    <div class="col-10 d-table">
                        <div class="d-table-cell align-middle">
                            <div class="row">
                            <p class="p-2 mb-0 text-start fs-5 col-3 px-2 me-2" >Nom: <?= $nom?> </p>
                            <p class="p-2 mb-0 text-start fs-5 col-3 px-2 me-2" >Prenom: <?= $prenon?> </p>
                            <p class="p-2 mb-0 text-start fs-5 col-3 px-2 me-2" >Pseudo: <?= $pseudo?> </p>
                            </div>
                            <div class="row">
                            <p class="p-2 mb-0 text-start fs-5 col-3"> email : <?= $email ?> </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div>
                    <p class="fs-3 my-5 topictitle">Mes topics</p>
                    <?php

                        $user_id = $_SESSION["user_id"];
                        $sql = $bdd->prepare("select * from topic   WHERE  Id_utilisateur = :user ORDER BY date_ajout");
                        $sql->execute(array(":user" => $user_id));

                        
                    ?>
                        <table class="table mb-5 text-center mx-auto">
                            <thead>
                                <tr class = " m-0">
                                    <th scope="col" class="col-6">Sujet</th>
                                    <th scope="col" class ="col-1">Auteur</th>
                                    <th scope="col" class="col-3">Date</th>
                                    <th scope="col" class = "col-2"> messages</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($topic = $sql->fetch(PDO::FETCH_OBJ))
                                    {
                                        $id_topic = $topic->Id_topic;
                                        $id_utilisateur = $topic->Id_utilisateur;
                                        $message = $bdd->prepare("SELECT * FROM topic WHERE Id_topic = :topic");
                                        $message->execute(array(":topic" => "$id_topic"));
                                        $nb_message = $message->rowCount();

                                        $user = $bdd->prepare("SELECT pseudo FROM utilisateur WHERE Id_utilisateur = :id_utlisateur");
                                        $user->execute(array(":id_utlisateur" => "$id_utilisateur"));
                                        $auteur = $user->fetch(PDO::FETCH_OBJ)->pseudo;
                                    ?>
                                    <tr data-href="../topic/message.php?topic=<?=$id_topic?>">
                                      <th scope="row" style="font-weight: normal;"> <?= $topic->libelle?>
                                        </th>
                                        <td><?= $auteur ?>
                                        </td>
                                        <td><?= $topic->date_ajout?></td> 
                                        <td><?= $nb_message?> 
                                        <?php
                                            if (isset($_SESSION["user"]))
                                            {
                                                                                                ?>
                                                <a href='info_user.php' id="<?=$id_topic?>" onclick="myFunction() "
                                                                                                 style='color: black; text-decoration: none;'>
                                                                             &nbsp; <i class='bi bi-x-square-fill'></i> </a>
                                                                             <?php
                                            }
                                        ?> 
                                    </td>
                                    </tr> 
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                            function myFunction() {
                            if (!confirm("Voulez vous supprimez ce topic!"))
                            {
                                document.getElementById(<?=$id_topic ?>).href = "info_user.php";                              
                            }
                        }

                        document.addEventListener("DOMContentLoaded" , () => {
                            const rows = document.querySelectorAll("tr[data-href]");

                            rows.forEach(row => {
                                row.addEventListener("click" , () => {
                                    window.location.href = row.dataset.href;
                                })
                                
                            });
                        })
                    </script>
                    </div>  
                </div>

                <div>
                    <p class=" fs-3 my-5 topictitle">Mes messages<p>
                    <div class=" col-11 basket_produit mx-auto p-2 px-5 mt-5">
                            <?php

                        $user_id = $_SESSION["user_id"];
                        $sql = $bdd->prepare("select * from message WHERE  Id_utilisateur = :user ORDER BY  h_message ");
                        $sql->execute(array(":user" => $user_id));

                        
                    ?>
                        <table class="table mb-5 text-center mx-auto">
                            <thead>
                                <tr class = " m-0">
                                    <th scope="col" class="col-6">contenu</th>
                                    <th scope="col" class ="col-1">Auteur</th>
                                    <th scope="col" class="col-3">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($topic = $sql->fetch(PDO::FETCH_OBJ))
                                    {
                                        $id_utilisateur = $topic->Id_utilisateur;
                                        $message = $bdd->prepare("SELECT * FROM message WHERE Id_Utilisateur = :topic");
                                        $message->execute(array(":topic" => "$id_utilisateur"));

                                        $user = $bdd->prepare("SELECT pseudo FROM utilisateur WHERE Id_utilisateur = :id_utlisateur");
                                        $user->execute(array(":id_utlisateur" => "$id_utilisateur"));
                                        $auteur = $user->fetch(PDO::FETCH_OBJ)->pseudo;
                                        $id_topic = $topic->Id_topic;

                                       // data-href="../topic/message.php?topic=<?=$id_topic"
                                    ?>
                                    <tr data-href="../topic/message.php?topic=<?=$id_topic?>">
                                      <th scope="row" style="font-weight: normal;"> <?= $topic->contenu?>
                                        </th>
                                        <td><?= $auteur ?>
                                        </td>
                                        <td><?= $topic->h_message?> 
                                        <!-- <?php
                                                                                                        if (isset($_SESSION["user"]) && $_SESSION["user"] == $auteur)
                                                                                                        {
                                                                                                            ?>
                                                                                                            <a href="supprimer_msg.php?id=<?=$topic->Id_Message?>&topic=<?= $id_topic?>" onclick="myFunction()"
                                                                                                            style='color: black; text-decoration: none;'>
                                                                                                            &nbsp; <i class='bi bi-x-square-fill'></i> </a>
                                                                                                            <a data-bs-toggle="modal" data-bs-target=<?php echo "#figure-modal$topic->Id_Message"?> style='color: black; text-decoration: none;'>
                                                                                                            &nbsp; <i class="bi bi-pencil-square"></i> </a>
                                                                                                            
                                                                                                            <?php
                                                                                                        }
                                        ?>  -->
                                    </td>
                                        <?php modif_msg_user($topic) ?>
                                    </tr> 
                            <?php
                            }
                            ?>
                        </tbody>


                     <script>
                            function myFunction() {
                            if (!confirm("Voulez vous supprimez ce topic!"))
                                document.getElementById(<?= $id_topic ?>).href = "../topic/topic_accueil.php";                              
                            }

                        document.addEventListener("DOMContentLoaded" , () => {
                            const rows = document.querySelectorAll("tr[data-href]");

                            rows.forEach(row => {
                                row.addEventListener("click" , () => {
                                    window.location.href = row.dataset.href;
                                })
                                
                            });
                        })
                    </script> 
                             
                    </div> 
                    
                </div>
            </div>
        </div>

    </div>
  </body>
</html>
