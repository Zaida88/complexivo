<link rel="stylesheet" href="assets/css/admin/exercise.css">
<div class="content">
  <div class="d-flex justify-content-center">
    <?php
    $item = "id_language";
    $value = $_GET["idLanguage"];
    $language = DashboardAdminController::ctrShowLanguages($item, $value);
    echo '<div>
  <h1 class="card-title" style="margin-bottom: 0;"><b> Etiqueta de ' . $language["name_language"] . '</b></h1>
        </div>';
    ?>
  </div>

  <input type="hidden" value="<?php echo $_GET['idLanguage']; ?>" id="idLanguages">

  <div class="d-flex justify-content-end go">
    <button type="button" class="btn btn-primary createLabels">
        <b>Agregar Etiqueta</b>
    </button>
  </div>

  <div class="d-flex justify-content-center mt-3">
    <div class="box-body" style="width:90%;">
      <table class="table table-striped table-sm table-responsive bg-body-secondary labels" style="width:100%;">
        <thead class="table-dark">
          <tr>
          <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th style="width:23%;">Opciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

</div>

<div class="modal fade" id="createLabelsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Nueva Etiqueta</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="mb-2">
            <label class="col-form-label">Nombre de la etiqueta:</label>
            <input type="text" name="name_exercise" id="name_exercise" class="form-control" required>
            <input type="hidden" name="idLanguage" id="idLanguage" value="<?php echo $language['id_language']; ?>"
              class="form-control" required>
          </div>
          <div class="mb-4">
            <label class="col-form-label">Descripcion:</label>
            <input type="text" name="description_exercise" id="description_exercise" class="form-control" required>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="createLabels">Guardar</button>
          </div>
          <?php
          $createLabels = new LabelController();
          $createLabels->ctrCreateLabel();
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
        <form role="form" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de la Etiqueta:</label>
            <input type="text" name="nameExercise" id="nameExercise" class="form-control" required>
            <input type="hidden" name="idLabel" id="idLabel" class="form-control" required>
            <input type="hidden" name="language" id="language" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <input type="text" name="descriptionExercise" id="descriptionExercise" class="form-control" required>
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

</div>

<?php
$deleteLabel = new LabelController();
$deleteLabel->ctrDeleteLabel();
?>
<script src="assets/js/admin/label-admin.js"></script>