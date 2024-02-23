<?php

function modif_msg($msg)
{
    ?>
    <div class="modal fade modal text-center" id=<?php echo "figure-modal$msg->Id_Message"?> tabindex="-1" aria-labelledby="Modal-figure" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                      <div class="modal-header " style="background: #2a9dee;/*! color: white; */border-bottom: 1px;">
                        <h1 class="modal-title fs-5 w-100 text-center " id="Modal-figure" >Modification du message  </h1>
                        <button type="button" class="btn-close border-top-0" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body mod2 w-100 px-5 py-2 ">
                          <form class="fs-5 form" action=<?php echo "modif_msg.php?change=$msg->Id_Message&topic=$msg->Id_topic"?> method="POST" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label  class="form-label">Contenu</label>
                                <textarea class="form-control" type="text" name="msg" ><?= $msg->contenu ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <input type="submit" class="btn btn-mygreen w-30 me-3" name=<?php echo "$msg->Id_Message" ?>  value="Enregistrer" style="color: white !important;"></input>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    <?php
}

function modif_msg_user($msg)
{
    ?>
    <div class="modal fade modal text-center" id=<?php echo "figure-modal$msg->Id_Message"?> tabindex="-1" aria-labelledby="Modal-figure" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                      <div class="modal-header " style="background: #2a9dee;/*! color: white; */border-bottom: 1px;">
                        <h1 class="modal-title fs-5 w-100 text-center " id="Modal-figure" >Modification du message  </h1>
                        <button type="button" class="btn-close border-top-0" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="modal-body mod2 w-100 px-5 py-2 ">
                          <form class="fs-5 form" action=<?php echo "../topic/modif_msg.php?change=$msg->Id_Message&topic=$msg->Id_topic"?> method="POST" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label  class="form-label">Contenu</label>
                                <textarea class="form-control" type="text" name="msg"  ><?= $msg->contenu ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end mb-2"> 
                                <input type="submit" class="btn btn-mygreen w-30 me-3" name=<?php echo "$msg->Id_Message" ?>  value="Enregistrer" style="color: white !important;"></input>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    <?php
}
?>