<?php
  session_start();
  unset($_SESSION["autorisation"]);
  unset($_SESSION["admin"]);
  unset($_SESSION["idPersonnage"]);
  // session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link rel="icon" type="image/png" href="../Images/logo-modified.png"/>
    <link href="../init.css" rel="stylesheet">
    <link href="../index.css" rel="stylesheet">
    <link href="../config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link href="../perso.css" rel="stylesheet">
    <script src="../alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    <style> @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap') </style> 
    <style> @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Lora:ital@1&family=Merriweather+Sans:ital,wght@1,400;1,500&display=swap');</style>  
    </script>

  </head>
  <body>
    <?php
    require "bodyperso.php";
    ?>
    <div class="bg-body">
      
    <div class="container ">

    <?php
    if (!empty($_SESSION["success"]))
        {
            
            ?>
            <div class="alert alert-success" role="alert" dismiss="alert" aria-label="Close">
                <?php echo $_SESSION["success"] ?>
        </div>
            <?php
          $_SESSION["success"] = "";
        }
        ?>

    <h1 class="text-center mb-3 pt-3 fs-1 fw-bold" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'>
                 Personnages de la license zelda </h1>
      <?php

        require "../config.php";
         $bdd = connect();

         //requête sql //

        
        //  $sql = "select * from personnage";
         $currentPage = (int)($_GET["page"] ?? 1);
         $persPage = 8;
         $offset = $persPage * ($currentPage - 1);


         if (isset($_GET["search"]) and $_GET["search"] != "")
         {
             $search = $_GET["search"];
             $count = (int)$bdd->query("SELECT COUNT(*) FROM personnage where nom like lower('%$search%')")->fetch(PDO::FETCH_NUM)[0];
             $page = ceil( $count / $persPage);
             $req2 = "select * from personnage where Nom like lower('%$search%') LIMIT $persPage OFFSET $offset";
             $result = $bdd->query($req2);
         } 
         else 
         {
            $count = (int)$bdd->query("SELECT COUNT(*) FROM personnage")->fetch(PDO::FETCH_NUM)[0];
            $page = ceil( $count / $persPage);
            $sql = "select * from personnage LIMIT $persPage OFFSET $offset";
            $result = $bdd->query($sql);

        // $bdd = connect();
         }

         echo "<div class='d-table mx-auto'>";
         echo "<div style='display: table-cell; vertical-align: middle;'>";
         for ($i = 1 ; $i <= $page; $i++)
         {
            if (isset($_GET["search"]) and $_GET["search"] != "")
            {
              $search = $_GET["search"];
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='personnage.php?search=$search&page=$i' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
            else 
            {
              if ($i == $currentPage)
                echo "<a class='me-3 page p-1 pe-2 ps-2'>$i</a>";
              else
                echo "<a href='personnage.php?&page=$i' class='me-3 page p-1 pe-2 ps-2'>$i</a> ";
            }
         }
         echo "</div>";
         echo "</div>";

         ?>

      <div class="row  row-cols-xl-2 row-cols-lg-2 row-cols-md-2  row-cols-sm-1 row-cols-1 align-content-center justify-content-center">
          <?php
          while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
          {
          
            ?>
            <div class='col  p-2 d-flex justify-content-center mb-2 mt-2'>
              <div class='CR8 text-center '>
              <?php echo "<h1 class='text-center m-2 fs-6 perso-uppercase '>" .$produit->Nom . " </h1>" ?>
                <div class="card text-center w-100 " style='height: 18rem;'>
                  <img src=<?= "../$produit->photo"?> class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>
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
                  <form action="perso_jeux.php?id=<?php echo $produit->IdPersonnage; ?>" method="POST" class="w-100">
                    <button class='btn btn-primary h-100 w-70 p-2 '>
                        Voir plus de détail <i class="bi bi-card-list"></i>
                    </button>
                  </form>
                </div>           
              </div>
            </div>

          
            <?php
          }   
            ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>