<div class="content">
  
<link rel="stylesheet" href="assets/css/lenguajes.css">

  <h1 class="d-flex justify-content-center"><b>Lenguajes</b></h1><br>
  <div class="row-1">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardAdminController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) {
      echo 
      '<div class="col-sm-3 mb-1 mb-sm-3 languages">
        <div>
          <a idLanguage="' . $language["id_language"] . '" btnShowLanguage  href="' . $language["route"] . '" style="text-decoration: none; color: black;" >
            <div class="card">
              <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 220px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;"><b>' . $language["name"] . '</b></h5>
                </div>
              </div>
              <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#updateLenguajesModal"><i class="fa-solid fa-pen-to-square" ></i>Editar</button>
            </div>
          </a>
        </div>
      </div>';
    }
    ?>
  </div>
</div>

<!--=====================================
  MODAL EDITAR LENGUAJES
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
              <input type="text" class="form-control" name="name" value="<?php echo $language["name"]; ?>"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" class="form-control" name="descripion" value="<?php echo $language["description"]; ?>"
                required>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateLenguaje">Guardar</button>
            </div>
            <?php
            $updateLenguaje = new UsersController();
            $updateLenguaje->ctrUpdateUser();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>