<?php
  session_start();
  unset($_SESSION["autorisation"]);
  unset($_SESSION["admin"]);
  unset($_SESSION["idjeux"]);
  // session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zelda</title>
    <link href="init.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Images/logo-modified.png"/>
    <link href="index.css" rel="stylesheet">
    <link href="config/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
 <style> @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap') </style> 
    <style> @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Lora:ital@1&family=Merriweather+Sans:ital,wght@1,400;1,500&display=swap')</style>  
    </script>

  </head>
  <body>
    <?php
    require "body.php";
    ?>
    <div class="bg-body">
    <div class="container ">

    <h1 class="text-center mb-3 pt-3 fs-1 fw-bold" style='text-shadow: -1px 0 gold, 0 1px gold, 1px 0 gold, 0 -1px gold;'>
                 Jeux de la license zelda </h1>
      <?php

        require "config.php";
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
           $result = $bdd->prepare("select * from jeux");
           $result->execute();
        // $bdd = connect();
         }
         ?>

      <div class="row  row-cols-xl-2 row-cols-lg-2 row-cols-md-2  row-cols-sm-1 row-cols-1 align-content-center justify-content-center">
          <?php
          while ($produit = $result->fetch(PDO::FETCH_OBJ)) 
          {
          
            ?>
            <div class='col  p-2 d-flex justify-content-center mb-2 mt-2'>
              <div class='CR8 text-center '>
              <?php echo "<h1 class='text-center m-2 fs-5 fst-italic fw-bold' >" .$produit->nom . " </h1>" ?>
                <div class="card text-center w-100 " style='height: 18rem;'>
                  <img src=<?= $produit->photo ?> class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>
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
                        echo "<p class='m-3 mb-0 text-start'> <b>Compatible:</b> $console </p>" ;
                    ?>
                  <?php echo "<p class='text-justify txt-trunc mx-3 '>" . "<b> Description: </b>" . $produit->Description . " </p> " ?>
                </div>
                <div class='d-md-flex justify-content-center mb-3'>
                  <form action="jeux_perso.php?id=<?php echo $produit->IdJeux?>" method="POST" class="w-100">
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