<?php
  session_start();
  unset($_SESSION["autorisation"]);
  unset($_SESSION["admin"]);
    if (isset($_GET["id"]))
        $_SESSION["idPersonnage"] = $_GET["id"];
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
    <link href="../perso.css" rel="stylesheet">
    <link href="../config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link href="../perso_jeux.css" rel="stylesheet">
    <script src="../alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    <style> @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap') </style> 
    </script>

  </head>
  <body>
    <?php
    require "bodyperso.php";
    ?>
    <div class="bg-body">
    <div class="container ">

    <?php

        require "../config.php";
        $id = $_SESSION["idPersonnage"];
        $bdd = connect();
        $sql = $bdd->prepare("SELECT * FROM personnage WHERE idPersonnage = :id ");
        $sql->execute(array(":id" => "$id"));
        $personnage = $sql->fetch(PDO::FETCH_OBJ);
    ?>

    <h1 class="text-center mb-3 pt-3 fs-1 fw-bold" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'>
                 <?= $personnage->Nom ?> </h1>

                 <div class="card text-center w-80 radius-bottom-none mx-auto " style='height: 25rem;'>
                  <img src=<?= "../$personnage->photo" ?> class='img-card-fluid  p-2' style='flex: auto; height: 25rem;'>
                </div> 
                <div class='col d-flex justify-content-center mb-2 '>
                    <div class='CR5 text-center w-80 mx-auto'>
                        <div class="d-table align-middle ">
                            <?php
                                $id = $personnage->IdPersonnage ;
                                $jeux_perso = "SELECT jeux.nom, histoire from appartenir NATURAL JOIN jeux 
                                            WHERE idPersonnage = $id";
                                $res = $bdd->query($jeux_perso);
                                $console = "";
                                $i = 0;
                                while ($his = $res->fetch(PDO::FETCH_OBJ))
                                {
                                    ?>
                                    <div class="mt-3">
                                        <h1 class="p-3 fst-italic pb-0" style='color: #3b2989;'><?= $his->nom ?></h1>
                                        <p class="px-4" style="text-align: justify;"> <?= $his->histoire ?> </p>
                                    </div>
                                    <?php    
                                } 
                            ?>
                        </div>      
                    </div>
                </div>
        <?php

         //requête sql //

         if (isset($_GET["search"]) and $_GET["search"] != "")
         {
              $search = $_GET["search"];         
              $req2 ="SELECT * FROM jeux WHERE IdJeux IN ( SELECT IdJeux FROM appartenir WHERE idPersonnage = $id AND jeux.nom like lower('%$search%'))";
              $result = $bdd->query($req2);
         } 
         else 
         {
            $sql = "SELECT * FROM jeux WHERE IdJeux IN ( SELECT IdJeux FROM appartenir WHERE idPersonnage = $id )";
           $result = $bdd->query($sql);
         }
          ?>

       <div class="row  row-cols-xl-2 row-cols-lg-2 row-cols-md-2  row-cols-sm-1 row-cols-1 align-content-center justify-content-center pt-5 mt-5"
             style="border-top: 4px dashed #3b2989;">
         <h1 class="mb-5 pt-3 fs-1 fw-bold row w-100 text-center d-block" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'> Apparition de 
                  <?= $personnage->Nom ?> dans les jeux </h1>
           <?php
           
           while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
           {
           
             ?>
             <div class='col  p-2 d-flex justify-content-center mb-2 mt-2'>
               <div class='CR8 text-center '>
               <?php echo "<p class='text-center m-2 fs-5 '>" .$produit->nom . " </p>" ?>
                 <div class="card text-center w-100 " style='height: 18rem;'>
                   <img src=<?= "../$produit->photo" ?> class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>
                 </div> 
                 <div class="d-table align-middle ">
                 <?php
                         $id = $produit->IdJeux ;
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
                   <?php echo "<p class='text-justify txt-trunc m-3 mt-1'>" . $produit->Description . " </p> " ?>
                 </div>
                 <div class='d-md-flex justify-content-center mb-3'>
                   <form action="../jeux_perso.php?id=<?php echo $produit->IdJeux?>" method="POST" class="w-100">
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