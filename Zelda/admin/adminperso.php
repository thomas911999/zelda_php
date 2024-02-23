<?php
  session_start();
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link rel="icon" type="image/png" href="../Images/logo-modified.png"/>
    <link href="../init.css" rel="stylesheet">
    <link href="../index.css" rel="stylesheet">
    <link href="../config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
  </head>
  <body>
    <?php
    require "bodyadmin.php";

    
    // if ($_SESSION["autorisation"] != "OK")
    // {
    //     header("Location: ../index.php");
    // }
    ?>

    <div class="container ">

    <h1 class="text-center mb-3  fs-1 fw-bold"> Modification personnages zelda </h1>
      <?php
      
        require "../config.php";
        include("requeteperso.php");
         $bdd = connect();


         //requête sql //


         $sql = "select * from personnage";


        if (isset($_GET["change"]))
        {
            $nom = $_POST["nom"];
            $path = $_POST["img"];
            if (!empty($_FILES["image"]["name"]))
            {
            $image = $_FILES["image"];
            $image_nom = $image["name"];
            $path = "Images/personnages/$image_nom";
            move_uploaded_file($image["tmp_name"], "../$path");
            }
            // $description = $_POST["description"];
            $id = $_GET["change"];

              try {
                   
                          $sql = "update personnage
                          SET nom= '$nom', photo= '$path'
                          WHERE IdPersonnage = $id";
                            $bdd->exec($sql);  
                            // header("Location: accueilAdmin.php");
               
                        }
              catch (PDOException $e) {
                  echo "erreur dans la requête <br>" . $e->getMessage();
              
            }
        }

        // if (isset($_GET["pop"]))
        // {
        //     $pop = $_GET["pop"];
        //     supprimer($pop, $bdd);              

        // }

         if (isset($_GET["search"]) and $_GET["search"] != "")
         {
             $search = $_GET["search"];
             $req2 = "select * from personnage where nom like lower('%$search%') ";
             $result = $bdd->query($req2);
         } 
         else 
         {
           $sql = "select * from personnage";

           $result = $bdd->query($sql);

        // $bdd = connect();
         }
         ?>

      <div class="row  row-cols-xl-2 row-cols-lg-2 row-cols-md-2  row-cols-sm-1 row-cols-1 align-content-center">
          <?php
          while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
          {
          
            ?>
            <div class='col p-2 d-flex justify-content-center mb-2 mt-2'>
              <div class='CR8 text-center '>
              <?php echo "<p class='text-center m-2 fs-5 '>" .$produit->Nom . " </p>" ?>  
              <div class="card text-center w-100 " style='height: 18rem;'>
              <?php echo "<img src='../$produit->photo' class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>" ?>
                </div>
                <div class="d-table align-middle mx-auto w-70">
                  <?php
                      $perso_sexe = "SELECT libelle FROM typesexe JOIN personnage on personnage.Sexe = typesexe.idSexe Where idSexe = '$produit->Sexe'";
                      $type_sex = $bdd->query($perso_sexe);
                      $type_obj = $type_sex->fetch(PDO::FETCH_OBJ);
                  ?>
                  <?php echo "<p class='mt-3 mb-0' style='text-align: left;'> <b>Sexe : </b>" . $type_obj->libelle . " </p> " ?>
                </div>
                <div class="d-table align-middle mx-auto w-70 perso-jeux">
                  <div class="d-table-cell align-middle mx-auto w-70">
                    <?php
                        $id = $produit->IdPersonnage ;
                        $jeux_perso = "SELECT nom from jeux NATURAL JOIN appartenir 
                                    WHERE idPersonnage = $id";
                        $res = $bdd->query($jeux_perso);
                        $jeux = "";
                        $i = 0;
                        while ($pers = $res->fetch(PDO::FETCH_OBJ))
                        {

                                $jeux = "$jeux" . "$pers->nom<br>";
                        } 
                        echo "<p style='text-align: left; margin-left: auto;
                        margin-right: auto;'> <b>Apparition :</b> $jeux </p>" ;
                    ?>
                    </div>
                </div>
                <div class='d-md-flex justify-content-center mb-3'>
                  <button data-bs-toggle="modal" data-bs-target=<?php echo "#figure-modal2$produit->IdPersonnage"?>  class="btn btn-warning btn-default h-25 w-70 p-2" >modifier <i class="bi bi-database-fill"></i></button>
                </div>
                <div >
                <form action=<?php echo "adminperso.php?pop=".$produit->IdPersonnage?> method="post" class="mb-3">
                  <button class='btn btn-danger h-25 w-70 p-2' type="submit"  name =<?php echo $produit->IdPersonnage."supprimer"?> 
                      data-toggle="modal" data-target="#exampleModalCenter"> supprimer <i class="bi bi-trash-fill"></i>
                  </button>
                </form>
                </div>
                <?php
                modif_modal2($produit);
                ?>
              </div>
            </div>
            <?php
          }
            ?>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>