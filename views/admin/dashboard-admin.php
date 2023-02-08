<div class="content" style="margin-bottom: 3%">
  <h1 class="d-flex justify-content-center">Lenguajes</h1><br>
  <div class="row">
    <?php
      $item = null;
      $value = null;
      $languages = DashboardAdminController::ctrShowLanguages($item, $value);
      foreach ($languages as $key => $language) {
        echo '
        <div class="col-sm-4 mb-5 mb-sm-0 go">
          <a style="padding: 0;" class="openLanguage btn" data-bs-toggle="modal"
          data-bs-target="#updateLenguajesModal" idLanguage="' . $language["id_language"] . '">
            <span class="visually-hidden">Danger: </span>
            <div class="card">
              <img src="' . $language["logo_language"] . '" class="card-img-top" alt="' . $language["name_language"] . '" style="width:100%;height: 245px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;">' . $language["name_language"] . '</h5>
                </div>
              </div>
              
              <b>EDITAR</b>
              <button type="button" class="float-sm-end btn btn-primary editbtn" data-bs-toggle="modal"
              data-bs-target="#showLenguajesModal">VER</button>
            </div>
          </a>
        </div>';
      }
    ?>
  </div>
</div>
<script>

</script>
<!--=====================================
  MODAL EDITAR LENGUAJE
  ======================================-->

  <div class="modal fade" id="updateLenguajesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Lenguaje</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">

            <input type="hidden" id="idLanguage" name="id_language">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="name_language" id="nameLanguage" class="form-control"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="description_language" id="descriptionLanguage" class="form-control" 
                required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateLenguajes">Guardar</button>
            </div>
            <?php
            $updateLenguajes = new DashboardAdminController();
            $updateLenguajes->ctrUpdateLanguages();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--=====================================
  MODAL MOSTRAR LENGUAJE
  ======================================-->

  <div class="modal fade" id="showLenguajesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Destalle Lenguaje <?$language["name_language"]?></b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="name" id="name" class="form-control"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="description" id="descripton" class="form-control" 
                required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">SALIR</button>
            </div>
            <?php
            $showLenguajes = new DashboardAdminController();
            $showLenguajes->ctrShowLanguages();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="assets/js/dashboard-admin.js"></script>
