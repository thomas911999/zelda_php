<?php
  session_start();
  unset($_SESSION["delete"]);
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
    <link href="topic.css" rel="stylesheet">
    <link href="../init.css" rel="stylesheet">
    <link href="../perso_jeux.css" rel="stylesheet">

    <!-- <link href="../user.css" rel="stylesheet"> -->
  </head>
  <body>
    <?php
    require "body_topic.php";
    ?>
    <div class="bg-body">
    <div class="container ">

    <h1 class="text-center mb-3 pt-3 fs-1 fw-bold" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'>
                 Jeux de la license zelda </h1>
      <?php

        require "../config.php";
         $bdd = connect();

         //requête sql //


         $sql = "select * from jeux";




         if (isset($_GET["search"]) and $_GET["search"] != "")
         {
             $search = $_GET["search"];
            $result = $bdd->prepare("select * from jeux where nom like lower(:search) ");
            $search = '%'.$search.'%';
            $result->bindParam(':search', $search);
            $result->execute();
         } 
         else 
         {
           $sql = $bdd->prepare("select * from topic ORDER BY date_ajout");
            $sql->execute();
        //    $result = $bdd->query($sql);

        // $bdd = connect();
         }
         ?>
             <div class=" zone_topic col-11 basket_produit mx-auto p-2 px-5">
                <p class="text-center m-2  text-light p-2" style="font-size: 1.75rem;"> Forum de discution </p>
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
                                        $message = $bdd->prepare("SELECT * FROM message WHERE Id_topic = :topic");
                                        $message->execute(array(":topic" => "$id_topic"));
                                        $nb_message = $message->rowCount();

                                        $user = $bdd->prepare("SELECT pseudo FROM utilisateur WHERE Id_utilisateur = :id_utlisateur");
                                        $user->execute(array(":id_utlisateur" => "$id_utilisateur"));
                                        $auteur = $user->fetch(PDO::FETCH_OBJ)->pseudo;
                                ?>
                                    <tr data-href="message.php?topic=<?=$id_topic?>">
                                      <th scope="row" style="font-weight: normal;"> <?= $topic->libelle?>
                                        </th>
                                        <td><?= $auteur ?>
                                        </td>
                                        <td><?= $topic->date_ajout?></td> 
                                        <td><?= $nb_message?> 
                                        <?php
                                            if (isset($_SESSION["user"]) && $_SESSION["user"] == $auteur)
                                            {
                                                                                                ?>
                                                <a href='supprimer_topic.php?id=<?=$id_topic?>' id="<?=$id_topic?>" onclick="myFunction() "
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
                                document.getElementById(<?= $id_topic ?>).href = "topic_accueil.php";                              
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
                <?php
                    if (isset($_SESSION["user"]))
                    {
                        ?>
                            <div class=" CR8 mt-3 col-11  mx-auto p-3 pb-0 mb-3 " style="background-color: #3b2989;color: white;">
                                <p class="text-center fs-2"> Ajout d'un nouveau topic </p>
                                <form action="ajout_topic.php" method="POST" >
                                        <div class="mb-3 ">
                                            <label for="exampleFormControlTextarea1" class="form-label fs-5">Sujet</label>
                                            <input class="form-control" type="text" name="topic" required></input>
                                        </div>
                                    <div class="mb-3 ">
                                        <label for="exampleFormControlTextarea1" class="form-label fs-5">Message</label>
                                        <textarea class="form-control" name="message" rows="3"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4 mt-4">
                                        <input type="submit" class="btn btn-mygreen me-2" value="ajouter" name="submit" style="color:white !important;"></input>
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