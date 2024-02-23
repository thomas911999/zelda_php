<?php

    session_start();
    unset($_SESSION["user"]);
    unset($_SESSION["user_id"]);
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
  </head>
  <body>
    <?php
    require "bodyadmin.php";
?>
    <div class="container">
    <form class="fs-5 form m-3" action="" method="POST">
        <!-- <h1> Bienvenue <?= $_SESSION["admin"] ?> sur la page admin </h1> -->
        <input type="submit" class="btn btn-mygreen " value="deconnection" name="close"></input>
    </form>

    <!-- <?php
        if (isset($_POST["close"]) || $_SESSION["autorisation"] != "OK")
        {
            unset($_SESSION["autorisation"]);
            session_destroy();
            header("Location: ../index.php");
        }
    ?> -->
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
             Jeux de la license zelda </h1>
  <?php

    require "../config.php";
     $bdd = connect();

     //requête sql //


     $sql = "select * from jeux";




     if (isset($_GET["search"]) and $_GET["search"] != "")
     {
         $search = $_GET["search"];
         $req2 = "select * from jeux where nom like lower('%$search%') ";
         $result = $bdd->query($req2);
     } 
     else 
     {
       $sql = "select * from jeux";

       $result = $bdd->query($sql);

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
          <?php echo "<p class='text-center m-2 fs-5 '>" .$produit->nom . " </p>" ?>
            <div class="card text-center w-100 " style='height: 18rem;'>
              <?php echo "<img src='../$produit->photo' class='img-card-fluid  p-2' style='flex: auto; height: 18rem;'>" ?>
            </div> 
            <div class="d-table align-middle ">
              <?php echo "<p class='text-justify txt-trunc m-3'>" . $produit->Description . " </p> " ?>
            </div>
            <div class='d-md-flex justify-content-center mb-3'>
              <form action="panier/ajout_panier.php?id=<?php echo $produit->id?>" method="POST" class="w-100">
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