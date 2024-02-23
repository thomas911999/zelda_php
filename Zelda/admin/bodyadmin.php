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
                    <a class="nav-link active text-light p-2  me-2 fs-6 mt-2" href="accueilAdmin.php">AccueilAdmin</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mt-2 fs-5 p-2 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gérer les catégories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="modif.php">Modifier mes jeux &nbsp;<i class="bi bi-database-fill"></i></a></li>
                        <li><a class="dropdown-item" href="adminperso.php">Modifier mes personnages &nbsp;<i class="bi bi-database-fill"></i></a></li>
                    </ul>
                  </li>

<!--                   
                    <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li> -->
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <!-- <button class="btn btn-outline-dark text-light" type="submit">Search</button> -->
            <button  type="submit" style="border-radius: 7px;">Search</button> 
          </form>
        </div>
      </div>
    </nav>