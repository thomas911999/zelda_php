<?php
  session_start();
  unset($_SESSION["autorisation"]);
  unset($_SESSION["admin"]);
    if (isset($_GET["id"]))
        $_SESSION["idjeux"] = $_GET["id"];
  // session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link rel="icon" type="image/png" href="Images/logo-modified.png"/>
    <link href="init.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <link href="perso.css" rel="stylesheet">
    <link href="config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="perso_jeux.css" rel="stylesheet">
    <script src="alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    <style> @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap') </style> 
    </script>

  </head>
  <body>
    <?php
    require "body.php";
    ?>
    <div class="bg-body">
    <div class="container ">

    <?php

        require "config.php";
        $id = $_SESSION["idjeux"];
        $bdd = connect();
        $sql = $bdd->prepare("SELECT * FROM jeux WHERE IdJeux = :id");
        $sql->execute(array(":id" => "$id"));
        $jeux = $sql->fetch(PDO::FETCH_OBJ);
    ?>

    <h1 class="text-center mb-3 pt-3 fs-1 fw-bold" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'>
                 <?= $jeux->nom ?> </h1>

                 <div class="card text-center w-80 radius-bottom-none mx-auto " style='height: 25rem;'>
                  <img src=<?= $jeux->photo ?> class='img-card-fluid  p-2' style='flex: auto; height: 25rem;'>
                </div> 
                <div class='col d-flex justify-content-center mb-2 '>
              <div class='CR5 text-center w-80 mx-auto'>
                <!-- <div class="card text-center w-100 " style='height: 18rem;'>
                  <img src=<?= $jeux->photo ?> class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>
                </div>  -->
                <div class="d-table align-middle ">
                <?php
                        $id = $jeux->IdJeux ;
                        $jeux_console = "SELECT IdConsole, nom from console NATURAL JOIN compatible 
                                    WHERE idJeux = $id ORDER BY Date_Sortie";
                                    
                        $res = $bdd->query($jeux_console);
                        $console = "";
                        $i = 0;
                        while ($cons = $res->fetch(PDO::FETCH_OBJ))
                        {
                                if ($i == 0)
                                {
                                  $console = "$console" . "$cons->nom";
                                  $i++;
                                }
                                else
                                $console = "$console" . ", $cons->nom";
                                
                        } 
                        echo "<p class='m-3 mb-0 text-start'> <b>Compatible :</b> $console </p>" ;
                    ?>
                  <?php echo "<p class=' m-3 mt-1' style='text-align: justify;'>" . $jeux->Description . " </p> " ?>
                </div>
                <div class='d-md-flex justify-content-center mb-3'>
                  <!-- <form action="panier/ajout_panier.php?id=<?php echo $jeux->IdJeux?>" method="POST" class="w-100">
                    <button class='btn btn-mygreen h-100 w-70 p-2 '>
                        Voir plus de détail <i class="bi bi-card-list"></i></i>
                    </button>
                  </form> -->
                </div>           
              </div>
            </div>
      <?php

         //requête sql //


        //  $sql = "SELECT * from personnage WHERE idPersonnage IN (SELECT idPersonnage FROM appartenir WHERE IdJeux = $id)";
      //  $sql = "SELECT idPersonnage, Nom, Sexe , photo, histoire 
      //           from personnage NATURAL JOIN appartenir WHERE IdJeux = $id";
          $currentPage = (int)($_GET["page"] ?? 1);
          $persPage = 6;
          $offset = $persPage * ($currentPage - 1);



         if (isset($_GET["search"]) and $_GET["search"] != "")
         {
              $search = $_GET["search"];
              $sql_count = $bdd->prepare("SELECT COUNT(*) from personnage 
              NATURAL JOIN appartenir WHERE IdJeux = :id AND personnage.nom like (:search)");
              $sql_count->bindParam(':id', $id);
              $search = '%'.$search.'%';
              $sql_count->bindParam(':search', $search);
              $sql_count->execute();
              $count = (int) $sql_count->fetch(PDO::FETCH_NUM)[0];
              // $count = (int)$bdd->query("SELECT COUNT(*) from personnage 
              //            NATURAL JOIN appartenir WHERE IdJeux = $id AND personnage.nom like ('%$search%')")->fetch(PDO::FETCH_NUM)[0];
              $page = ceil( $count / $persPage);      
              $req2 ="SELECT idPersonnage, Nom, Sexe , photo, histoire from personnage 
                         NATURAL JOIN appartenir WHERE IdJeux = $id AND personnage.nom like ('%$search%') LIMIT $persPage OFFSET $offset";
              $result = $bdd->query($req2);
         } 
         else 
         {

            $count = (int)$bdd->query("SELECT COUNT(*) from personnage 
            NATURAL JOIN appartenir WHERE IdJeux = $id ")->fetch(PDO::FETCH_NUM)[0];
            $page = ceil( $count / $persPage);  
            $sql = "SELECT idPersonnage, Nom, Sexe , photo, histoire 
            from personnage NATURAL JOIN appartenir WHERE IdJeux = $id LIMIT $persPage OFFSET $offset";

           $result = $bdd->query($sql);

        // $bdd = connect();
         }

         ?>

      <div class="row  row-cols-xl-2 row-cols-lg-2 row-cols-md-2  row-cols-sm-1 row-cols-1 align-content-center justify-content-center pt-5 mt-5"
            style="border-top: 4px dashed #3b2989;">
        <h1 class="mb-5 pt-3 fs-1 fw-bold row w-100 text-center d-block" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'> Personnages de 
                 <?= $jeux->nom ?> </h1>
          <?php
          
         if ($count > $persPage)
         {
          echo "<div class='w-100 mb-3'>";
          echo "<div class='d-table mx-auto'>";
          echo "<div style='display: table-cell; vertical-align: middle;' class='ps-3'>";
         for ($i = 1 ; $i <= $page; $i++)
         {
            if (isset($_GET["search"]) and $_GET["search"] != "")
            {
              $search = $_GET["search"];
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='jeux_perso.php?search=$search&page=$i&id=$id' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
            else 
            {
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='jeux_perso.php?&page=$i&id=$id' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
         }
         echo "</div>";
         echo "</div>";
         echo "</div>";

        }
         
          while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
          {
          
            ?>

            <div class='col  p-2 d-flex justify-content-center mb-2 mt-2' >
              <div class='CR8 text-center ' style="border-color: #ffd700;">
              <?php echo "<p class='text-center m-2 fs-5 '>" .$produit->Nom . " </p>" ?>
                <div class="card text-center w-100 " style='height: 18rem;'>
                  <img src=<?= "$produit->photo"?> class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>
                </div> 
                <div class="d-table align-middle mx-auto w-70">
                  <?php
                      $perso_sexe = "SELECT libelle FROM typesexe JOIN personnage on personnage.Sexe = typesexe.idSexe Where idSexe = '$produit->Sexe'";
                      $type_sex = $bdd->query($perso_sexe);
                      $type_obj = $type_sex->fetch(PDO::FETCH_OBJ);
                  ?>
                  <?php echo "<p class='mt-3 mb-0' style='text-align: left;'> <b>Sexe: </b>" . $type_obj->libelle . " </p> " ?>
                </div>
                <div class="d-table align-middle mx-auto w-70 perso-jeux">
                  <div class="d-table-cell align-middle mx-auto w-70">
                    <?php
                     echo "<p class='text-justify txt-trunc '> <b>Histoire: </b>" . $produit->histoire . " </p> ";

                        // $id = $produit->IdPersonnage ;
                        // $jeux_perso = "SELECT nom from jeux NATURAL JOIN appartenir 
                        //             WHERE idPersonnage = $id";
                        // $res = $bdd->query($jeux_perso);
                        // $jeux = "";
                        // $i = 0;
                        // while ($pers = $res->fetch(PDO::FETCH_OBJ))
                        // {

                        //         $jeux = "$jeux" . "$pers->nom<br>";
                        // } 
                        // echo "<p style='text-align: left; margin-left: auto;
                        // margin-right: auto;'> <b>Apparition :</b> $jeux </p>" ;
                    ?>
                    </div>
                </div>
                <div class='d-md-flex justify-content-center mb-3'>
                  <form action="personnages/perso_jeux.php?id=<?php echo $produit->idPersonnage?>" method="POST" class="w-100">
                    <button class='btn btn-primary h-100 w-70 p-2 '>
                        Voir plus de détail <i class="bi bi-card-list"></i>
                    </button>
                  </form>
                </div>           
              </div>
            </div>

          
            <?php
          }

          if ($count > $persPage)
          {          
          echo "<div class='w-100 my-5 mt-3'>";
          echo "<div class='d-table mx-auto'>";
          echo "<div style='display: table-cell; vertical-align: middle;' class='ps-3'>";
         for ($i = 1 ; $i <= $page; $i++)
         {
            if (isset($_GET["search"]) and $_GET["search"] != "")
            {
              $search = $_GET["search"];
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='jeux_perso.php?search=$search&page=$i&id=$id' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
            else 
            {
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='jeux_perso.php?&page=$i&id=$id' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
         }
         echo "</div>";
         echo "</div>";
         echo "</div>";

        }
            ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>