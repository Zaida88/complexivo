<link rel="stylesheet" href="assets/css/admin/exercise.css">
<div class="content">
  <?php
  $item = "id_language";
  $value = $_GET["idLanguage"];
  $language = DashboardAdminController::ctrShowLanguages($item, $value);
  ?>
  <h1><b>Etiquetas de
      <?php echo $language["name_language"]; ?>
    </b></h1>
  <input type="hidden" value="<?php echo $_GET['idLanguage']; ?>" id="idLanguages">

  <div class="d-flex justify-content-end go">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLabelModal"><i
        class="fa-solid fa-plus"></i>&nbsp;
      <b>Nueva Etiqueta</b>
    </button>
  </div><br>

  <div class="d-flex justify-content-center mt-3">
    <div class="box-body" style="width:90%;">
      <table class="table table-striped table-sm table-responsive bg-body-secondary labels" style="width:100%;">
        <thead class="table-dark">
          <tr>
            <th style="width:5%;">#</th>
            <th>Nombre</th>
            <th style="width:24%;">Opciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="createLabelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar Etiqueta</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class="col-form-label">Nombre:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="name_label" class="form-control" required>
            <input type="hidden" name="idLanguage" id="idLanguage" value="<?php echo $_GET["idLanguage"]; ?>"
              class="form-control" required>
          </div>

          <div class="mb-2">
            <label class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="description_label" rows="6" class="form-control"
              required></textarea>
          </div>

          <div class="mb-4">
            <label class="col-form-label">Imagen:</label>
            <div class="card ms-2" style="width: 13rem;">
              <img src="assets/img/labels/default.png" class="card-img-top previewImg">
              <div class="card-body bg-body-tertiary">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newPhoto" name="img_label" accept="image/*" required>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="createLabel">Guardar</button>
          </div>
          <?php
          $createLabel = new LabelController();
          $createLabel->ctrCreateLabel();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateLabelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Etiqueta</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class="col-form-label">Nombre:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="name_label" id="name_label"
              class="form-control" required>
            <input type="hidden" name="idLanguages" value="<?php echo $_GET['idLanguage']; ?>" class="form-control" required>
            <input type="hidden" name="idLabel" id="idLabel" class="form-control" required>
          </div>

          <div class="mb-2">
            <label class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="description_label" id="description_label" rows="6"
              class="form-control" required></textarea>
          </div>

          <div class="mb-4">
            <label class="col-form-label">Imagen:</label>
            <div class="card ms-2" style="width: 13rem;">
              <img src="assets/img/labels/default.png" class="card-img-top previewImg">
              <div class="card-body bg-body-tertiary">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newPhoto" name="img_label" accept="image/*">
                </div>
                <input type="hidden" name="img_label" id="imgLabel">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="updateLabel">Guardar</button>
          </div>
          <?php
          $updateLabel = new LabelController();
          $updateLabel->ctrUpdateLabel();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

$deleteLabel = new LabelController();
$deleteLabel->ctrDeleteLabel();

?>

<script src="assets/js/admin/label-admin.js"></script>