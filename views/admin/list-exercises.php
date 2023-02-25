<link rel="stylesheet" href="assets/css/admin/exercise.css">
<div class="content">
  <?php
  $item = "id_label";
  $value = $_GET["idLabel"];
  $label = LabelController::ctrShowLabel($item, $value);
  ?>
  <div class="d-flex justify-content-start mb-3 go">
    <button type=" button" class="btn btn-dark back" idLanguages="<?php echo $label["idLanguage"]; ?>">&#129044;Atrás</button>
  </div>
  <h1 class="card-title" style="margin-bottom: 0;"><b> Ejercicios de
      <?php echo $label["name_label"]; ?>
    </b></h1>
  <input type="hidden" value="<?php echo $_GET['idLabel']; ?>" id="idLabels">

  <div class="d-flex justify-content-end go me-3">
    <button type="button" class="btn btn-primary createExercise"><i class="fa-solid fa-plus"></i>&nbsp;
    <b>Agregar Ejercicio</b>
    </button>
  </div>

  <div class="d-flex justify-content-center mt-3">
    <div class="box-body" style="width:90%;">
      <table class="table table-striped table-sm table-responsive bg-body-secondary exercises" style="width:100%;">
        <thead class="table-dark">
          <tr>
            <th style="width:5%;">#</th>
            <th>Nombre</th>
            <th style="width:22%;">Opciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>


<div class="modal fade" id="createExerciseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar Ejercicio</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="mb-2">
            <label class="col-form-label">Nombre del ejercicio:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="name_exercise" id="name_exercise" class="form-control" required>
            <input type="hidden" name="idLanguage" id="idLanguage" value="<?php echo $language['id_language']; ?>"
              class="form-control" required>
          </div>

          <div class="mb-4">
            <label class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="description_exercise" id="description_exercise" rows="6"  class="form-control" required></textarea>
          </div>

          <div class="card mt-3 ms-2" style="width: 13rem;">
            <img src="<?php echo $_SESSION["photo_user"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["photo_user"]; ?>">
            <div class="card-body bg-body-tertiary">
              <div class="file-select" id="src-file2">
                <input type="file" class="newPhoto" name="newPhoto" accept="image/*" required>
              </div>
            </div>
          </div><br>

          <div class="input-group mb-2 cards">
            <span class="input-group-text" id="basic-addon1">Cantidad de tarjetas a crear:</span>
            <input id="option" type="number" class="form-control" aria-describedby="basic-addon1" required>
            <button for="inputGroupSelect02" type="button" class="btn btn-primary createCards">Crear</button>
          </div>

          <div class="input-group mb-3 d-inline">
            <div id="code">
              <div id="createdCard"></div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="createExercise">Guardar</button>
          </div>
          <?php
          $createCard = new ExerciseController();
          $createCard->ctrCreateExercise();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="updateExerciseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Ejercicio</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del Ejercicio:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="nameExercise" id="nameExercise" class="form-control" required>
            <input type="hidden" name="idExercise" id="idExercise" class="form-control" required>
            <input type="hidden" name="language" id="language" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="descriptionExercise" id="descriptionExercise" class="form-control" rows="6" required></textarea>
          </div>

          <div class="card mt-3 ms-2" style="width: 13rem;">
            <img src="<?php echo $_SESSION["photo_user"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["photo_user"]; ?>">
            <div class="card-body bg-body-tertiary">
              <div class="file-select" id="src-file2">
                <input type="file" class="newPhoto" name="newPhoto" accept="image/*" required>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="updateExercise">Guardar</button>
          </div>
          <?php
          $updateExercise = new ExerciseController();
          $updateExercise->ctrUpdateExercise();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<?php

$deleteExercise = new ExerciseController();
$deleteExercise->ctrDeleteExercise();

?>

<script src="assets/js/admin/list-exercises-admin.js"></script>