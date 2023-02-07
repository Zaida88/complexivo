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
              <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 245px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;">' . $language["name"] . '</h5>
                </div>
              </div>
              
              <b>EDITAR</b>
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
  MODAL EDITAR USUARIO
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
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" name="username" value="<?php echo $language["name"] ; ?>"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" class="form-control" name="firstName" value="<?php echo $language["description"]; ?>"
                required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateLenguajes">Guardar</button>
            </div>
            <?php
            $updateLenguajes = new DashboardAdminController();
            $updateLenguajes->ctrUpdateLenguajes();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>