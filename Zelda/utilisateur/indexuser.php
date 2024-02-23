<?php
    session_start();
    unset($_SESSION["autorisation"]);
    unset($_SESSION["admin"]);
    session_destroy();
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
    <link href="user.css" rel="stylesheet">
  </head>
  <body>
    <?php
    $champ = 1;
    require "bodyuser.php";
    ?>
    <div class="container">
    <h1 class="text-center mb-3  fs-1 fw-bold"> Espace utilisateur </h1>
    <div class="row justify-content-center mt-3 mb-3">
            <div class="CR8 w-70 mt-4">
                <h1 class="mb-3 text-center m-2 fs-2 mt-4">identifiant utlisateur</h1>
                <form class="fs-5 form" action="verif.php" method="POST">
                    <div class="mb-3 ">
                        <label  class="form-label">Pseudo ou email</label>
                        <input class="form-control" type="text" name="pseudo"></input>
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label">Mot de passe</label>
                        <input class="form-control" type="password" name="password"></input>
                    </div>
                    <p class="mt-4 fs-6"> <a href="inscription.php" > Pas encore incrit ? <br> Cliquez ici pour enregistrer votre compte </a> </p> 
                    <div class="d-flex justify-content-end mb-3">
                        <input type="submit" class="btn btn-mygreen me-2" value="s'identifier" name="submit"></input>
                        <!-- <input type="submit" class="btn btn-mygreen " value="annuler" name="close"></input> -->
                    </div>
                    <?php
                        if (isset($_GET["erreur"]))
                        {
                            $contenu = $_GET["erreur"];
                            echo "<p style='color: #bc0f0f;'> $contenu </p>";
                        }
                    ?>
                </form>
            </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>