<div class="content">
<link rel="stylesheet" href="assets/css/users.css">
  <div class="row justify-content-end">
    <div class="col-auto">
      <button type="button" class="showLanguage btn btn-warning" data-bs-toggle="modal" 
        data-bs-target="#showLenguajesModal" data-bs-id="<?php $language["id_language"]; ?> ">
         <i class="fa-solid fa-circle-info"></i>&nbsp;<b>DETALLES</b>
      </button>            
    </div>
  </div>
  <h1><b>Lenguajes</b></h1>
  <div class="row">
    <div class="col">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th style="width:15%;">Lenguaje</th>
            <th style="width:10%;">Logo</th>
            <th style="width:5%;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $item = null;
          $value = null;
          $languages = DashboardAdminController::ctrShowLanguages($item, $value);

          foreach ($languages as $languages)
          {?>
          <tr>
            <td>
              <?php echo $languages['name_language'];?>
            </td>
            <td>
              <div class="cord" style="width: 8rem;">
               <img src="<?php echo $languages['logo_language'];?>" class="card-img-top previewImg" alt="">
              </div> 
            </td>
            <td>
              <div class="btn-group languages" >
                <button class="btn btn-info updateLanguage" idlanguage="<?php echo $languages['id_language']; ?>"
                        data-bs-toggle="modal" data-bs-target="#updateLenguajesModal">
                        <i class="fa-solid fa-pen-to-square"></i>
                </button>                
              </div>
            </td>
          </tr>
          
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--=====================================
  MODAL MOSTRAR LENGUAJE
  ======================================-->
  <div class="modal fade" id="showLenguajesModal" tabindex="-1" aria-labelledby="showLenguajesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showLenguajesModalLabel"><b>Destalles de los Lenguajes</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <?php
              $item = null;
              $value = null;
              $languages = DashboardAdminController::ctrShowLanguages($item, $value);
              foreach ($languages as $key => $language) {
                echo '
                  
                    <div class="mb-3">
                      <h3><b>' . $language["name_language"] . '</b></h3>
                    </div>

                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Descripcion:</label>
                      <p>' . $language["description_language"] . '</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondry" data-bs-dismiss="modal"></button>
                    </div>
                  
                ';
              }
            ?>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">SALIR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!--=====================================
  MODAL EDITAR LENGUAJE
  ======================================-->
  <div class="modal fade" id="updateLenguajesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Lenguaje</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form role="form" method="post">
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="nameLanguage" id="nameLanguage" class="form-control" required>
              <input type="hidden" name="idLanguage" id="idLanguage" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="descriptionLanguage" id="descriptionLanguage" class="form-control" required>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateLanguage">Guardar</button>
          </div>
          <?php
          $updateLanguage = new DashboardAdminController();
          $updateLanguage->ctrUpdateLanguages();
          ?>
        </form>
        </div>
      </div>
    </div>
  </div>

<script src="assets/js/dashboard-admin.js"></script>
