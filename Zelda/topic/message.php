<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link rel="icon" type="image/png" href="../Images/logo-modified.png"/>
    <link href="../index.css" rel="stylesheet">
    <link href="../config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link href="../perso.css" rel="stylesheet">
    <link href="../init.css" rel="stylesheet">
    <link href="topic.css" rel="stylesheet">
    <link href="../perso_jeux.css" rel="stylesheet">

    <!-- <link href="../user.css" rel="stylesheet"> -->
  </head>
  <body>
    <?php
        require "body_topic.php";

        $id_topic = $_GET["topic"];
    ?>
    <div class="bg-body">
        <div class="container ">
        <?php
                require "../config.php";

                require "edit_msg.php";

                $bdd = connect();

                // if (isset($_POST["message"]))
                //     {
                //         $msg = valid_donnees($_POST["message"]);
                //         $id_user = $_SESSION["user_id"];
                //         $new_message = $bdd->prepare("INSERT INTO message(Id_topic,id_utilisateur,contenu,h_message) 
                //                                         VALUES (:id_topic, :id_user, :contenu, CURRENT_TIMESTAMP())");
                //         $new_message->execute(array(":id_topic" => "$id_topic", ":id_user" => "$id_user", ":contenu" => "$msg"));
                //     }
                
                $sql = $bdd->prepare("select * from message WHERE id_topic = :topic ORDER BY Id_Message");
                $sql->execute(array(":topic" => "$id_topic"));

                $sql2 = $bdd->prepare("select libelle from topic WHERE id_topic = :topic ");
                $sql2->execute(array(":topic" => "$id_topic"));
                $title = $sql2->fetch(PDO::FETCH_OBJ)
                ?>

                <div class=" zone_topic col-11 basket_produit mx-auto p-2 px-5 mt-5">
                <p class="text-center m-2  text-light p-2" style="font-size: 1.75rem;"> <?= $title->libelle ?></p>
                                <?php
                                    while ($topic = $sql->fetch(PDO::FETCH_OBJ))
                                    {
                                        $id_utilisateur = $topic->Id_utilisateur;
                                        $user = $bdd->prepare("SELECT pseudo, photo FROM utilisateur WHERE Id_utilisateur = :id_utlisateur");
                                        $user->execute(array(":id_utlisateur" => "$id_utilisateur"));
                                        $recup_user = $user->fetch(PDO::FETCH_OBJ);
                                        $auteur = $recup_user->pseudo;
                                         $photo = $recup_user->photo;
                                ?>
                                    <div class = "zone_flex w-100">
                                        <div class="zone_msg mb-4">
                                            <div class = "msg_head row mx-0" style="border-bottom: aliceblue 1px solid;">
                                                <div class="col-8 d-table">
                                                    <div class="d-table-cell align-middle">
                                                            <img src="../<?=$photo?>" alt="" class="p-1 rounded-circle"
                                                            style="height: 65px; width: 65px">
                                                                <p class="p-2 mb-0 fs-5" style="display: inline-block;" ><?=$auteur?>  </p>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-table">
                                                    <div class="d-table-cell align-middle">
                                                        <p class="p-2 mb-0 text-end fs-5" > <?=$topic->h_message?>
                                                        <?php
                                                            if (isset($_SESSION["user"]) && $_SESSION["user"] == $auteur)
                                                            {
                                                                ?>
                                                                <a href="supprimer_msg.php?id=<?=$topic->Id_Message?>&topic=<?= $id_topic?>"
                                                                style='color: black; text-decoration: none;'>
                                                                &nbsp; <i class='bi bi-x-square-fill'></i> </a>
                                                                <a data-bs-toggle="modal" data-bs-target=<?php echo "#figure-modal$topic->Id_Message"?> style='color: black; text-decoration: none;'>
                                                                &nbsp; <i class="bi bi-pencil-square"></i> </a>
                                                                
                                                                <?php
                                                            }
                                                        ?> 
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php modif_msg($topic); ?>
                                            </div>
                                            <div>
                                                <p class ="px-3 py-4 mb-0 fs-4"> <?=$topic->contenu?> </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                </div> 
                <?php
                if (isset($_SESSION["user"]))
                    {
                        ?>
                            <div class=" CR8 mt-3 col-11  mx-auto p-3 pb-0 mb-3 " style="background-color: #3b2989;color: white;">
                                <p class="text-center fs-2"> Ajout d'un nouveau message </p>
                                <form action="ajout_message.php?topic=<?=$id_topic?>" method="POST">
                                    <div class="mb-3 ">
                                        <label for="exampleFormControlTextarea1" class="form-label fs-5">Message</label>
                                        <textarea class="form-control" name="message" rows="3" ></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4 mt-4">
                                        <input type="submit" class="btn btn-mygreen me-2" value="ajouter" name="submit" style="color: white !important;"></input>
                        <!-- <input type="submit" class="btn btn-mygreen " value="annuler" name="close"></input> -->
                                    </div>
                                </form>
                            </div>
                        <?php
                    }
                ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

