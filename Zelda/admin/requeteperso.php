<?php

function modif_modal2($produit)
{
    ?>
<div class="modal fade modal text-center" id=<?php echo "figure-modal2$produit->IdPersonnage"?> tabindex="-1" aria-labelledby="Modal-figure" aria-hidden="true">
                  <div class="modal-dialog" style="--bs-modal-width: 600px;">
                    <div class="modal-content">
                      <div class="modal-header text-black">
                        <h1 class="modal-title fs-5 w-100 text-center text-dark" id="Modal-figure" >Modification de l'article : <strong><?php echo "$produit->Nom"?></strong> </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body CR8 w-100 p-5 pb-1">
                          <form class="fs-5 form" action=<?php echo "adminperso.php?change=$produit->IdPersonnage"?> method="POST" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label  class="form-label">nom de l'article</label>
                                <input class="form-control" type="text" name="nom" value='<?php echo "$produit->Nom"?>' ></input>
                            </div>
                            <div class="mb-4 ">
                                <label for="exampleFormControlTextarea1" class="form-label">image du produit</label>
                                <input type="hidden" name="img" value=<?php echo $produit->photo?>></input>
                                <input class="form-control mb-3" type="file" name="image"></input>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <input type="submit" class="btn btn-primary w-30 me-3" name=<?php echo "$produit->IdPersonnage" ?>  value="Enregistrer"></input>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                      </div>
                      <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      </div> -->
                    </div>
                  </div>
                </div>
    <?php   
}

function supprimer($pop,$bdd)
{
    $req2 = "select * from produit
                    WHERE id=$pop";
           $result = $bdd->query($req2);
        $produit = $result->fetch(PDO::FETCH_OBJ);

          ?>
              <div class="alert alert-warning alert-dismissible fade show mx-auto pe-3 pb-0">
                <strong>Attention!</strong> Vous êtes sur le point de supprimer un article. <br>
                article : <?php echo $produit->nom ?> <br>
                prix : <?php echo $produit->prix ?> € <br>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <form action=<?php echo "modif.php?pop=".$produit->id?> method="post" class="mb-3">
                <div class="d-flex justify-content-end">
                <button class='btn btn-warning ' type="submit" name =<?php echo $produit->id."confirmer" ?> data-toggle="modal" data-target="#exampleModalCenter"> supprimer </button>
                </div>
              </form>
            </div>
            <?php
                if (isset($_POST[$produit->id . "confirmer"]))     
                {
                  try {
                    $supprimer = "delete from produit
                    WHERE produit.id = $pop";
                    $result = $bdd->exec($supprimer);
                    header("Location: accueilAdmin.php");
                    
                  } catch (PDOException $e) {
                    echo "erreur dans la requête <br>" . $e->getMessage();
                  }
                }               
}

?>