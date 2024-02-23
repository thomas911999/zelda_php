  <nav class="navbar navbar-expand-lg nav-color border-bottom-gold ">
      <div class="container-fluid">
        <a class="navbar-brand justify-content-end  mt-2 " href="#"> <img src="../Images/logo-modified.png" style="height: 40px"> </a>
        <button class="navbar-toggler nav-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon nav-icon "> </i>
          </span>
        </button>
        <div class="  collapse navbar-collapse " id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <!-- <li class="nav-item">
                    <a class="nav-link active text-light p-2  me-2 fs-6 mt-2" href="ajout.php">Link</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link active text-gray p-2  me-2  mt-2 fw-bold" href="../index.php">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-gray p-2  me-2  mt-2 fw-bold" href="admin.php">Admin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-gray p-2  me-2  mt-2 fw-bold" href="../personnages/personnage.php">Personnage</a>
                  </li>
                  <?php if (isset($_SESSION["user"]))
                    { 
                    ?>
                        <li class="nav-item dropdown">
                            <a class=" d-block dropdown-toggle text-gray mt-2 p-2 me-2 fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                            Mon compte
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="modif.php">Voir mes topics &nbsp;<i class="bi bi-trash-fill"></i></a></li>
                                <li><a class="dropdown-item" href="../utilisateur/deco.php">Déconnexion &nbsp;<i class="bi bi-plus-circle-fill text-end"></i></a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li class="nav-item">
                        <a class="nav-link active text-gray p-2  me-2  mt-2 fw-bold" href="../utilisateur/indexuser.php">Utilisateur</a>
                      </li>
                      <?php
                    }
                 ?>
                  <li class="nav-item">
                    <a class="nav-link active text-gray p-2  me-2  mt-2 fw-bold" href="../topic/topic_accueil.php">Forum</a>
                  </li>
<!--                   
                    <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="search">
                  <!-- <button class="btn btn-outline-dark text-light" type="submit">Search</button> -->
            <button  type="submit" style="border-radius: 7px;">Rechercher</button> 
          </form>
        </div>
      </div>
    </nav>