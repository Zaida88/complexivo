<div class="content">
  <?php
  $item = "id_label";
  $value = $_GET["idLabel"];
  $label = LabelController::ctrShowLabel($item, $value);
  ?>
  <div class="d-flex justify-content-start mb-3 go">
    <button type=" button" class="btn btn-dark back" idLanguages="<?php echo $label["idLanguage"]; ?>"><i
        class="fa-solid fa-arrow-left"></i>&nbsp;Atrás</button>
  </div>
  <h1 class="card-title" style="margin-bottom: 0;"><b> Ejercicios de
      <?php echo $label["name_label"]; ?>
    </b></h1>
  <input type="hidden" value="<?php echo $_GET['idLabel']; ?>" id="idLabels">
  <input type="hidden" value="<?php echo $_SESSION["rol"]; ?>" id="rol">

  <?php
  if ($_SESSION["rol"] == 3) { ?>
    <div class="d-flex justify-content-end go me-3">
      <button type="button" class="btn btn-primary createExercise"><i class="fa-solid fa-plus"></i>&nbsp;
        <b>Agregar Ejercicio</b>
      </button>
    </div>
  <?php }
  ?>

  <div class="d-flex justify-content-center mt-3">
    <div class="box-body" style="width:90%;">
      <table class="table table-striped table-sm table-responsive bg-body-secondary exercises" style="width:100%;">
        <thead class="table-dark">
          <tr>
            <th style="width:5%;">#</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <?php
            if ($_SESSION["rol"] == 3) { ?>
              <th style="width:22%;">Opciones</th>
            <?php } else { ?>
              <th style="width:23%;">Opciones</th>
            <?php } ?>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>


<div class="modal fade" id="createExerciseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:550px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar Ejercicio</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class="col-form-label">Nombre:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="name_exercise" id="name_exercise"
              class="form-control" required>
            <input type="hidden" name="id_label" id="id_label" value="<?php echo $label['id_label']; ?>"
              class="form-control" required>
          </div>

          <div class="mb-2">
            <label class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="description_exercise" id="description_exercise"
              rows="6" class="form-control" required></textarea>
          </div>

          <label class="col-form-label">Nivel:</label>
          <select class="form-select mb-3" aria-label="Default select example" name="level">
            <option selected value="1">Principiante</option>
            <option value="2">Intermedio</option>
            <option value="3">Avanzado</option>
          </select>

          <div class="row">
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de ejemplo:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg">
                  <div class="card-body bg-body-tertiary">
                    <div class="file-select" id="src-file2">
                      <input type="file" class="newPhoto" name="img_example_exercise" accept="image/*" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de resultado:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg2">
                  <div class="card-body bg-body-tertiary">
                    <div class="file-select" id="src-file2">
                      <input type="file" class="newPhoto2" name="img_result_exercise" accept="image/*" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

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
          $createExercise = new ExerciseController();
          $createExercise->ctrCreateExercise();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateExerciseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:550px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Ejercicio</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class="col-form-label">Nombre:</label>
            <input onkeypress="return event.charCode != 34" type="text" name="nameExercise" id="nameExercise"
              class="form-control" required>
            <input type="hidden" name="idExercise" id="idExercise" class="form-control">
            <input type="hidden" name="id_label" id="id_label" value="<?php echo $label['id_label']; ?>"
              class="form-control">
          </div>

          <div class="mb-2">
            <label class="col-form-label">Descripcion:</label>
            <textarea onkeypress="return event.charCode != 34" name="descriptionExercise" id="descriptionExercise"
              rows="6" class="form-control" required></textarea>
          </div>

          <label class="col-form-label">Nivel:</label>
          <select class="form-select mb-3" aria-label="Default select example" name="levels" id="showLevel">
            <option value="1">Principiante</option>
            <option value="2">Intermedio</option>
            <option value="3">Avanzado</option>
          </select>

          <div class="row">
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de ejemplo:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg">
                  <div class="card-body bg-body-tertiary">
                    <div class="file-select" id="src-file2">
                      <input type="file" class="newPhoto" name="imgExampleExercise" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de resultado:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg2">
                  <div class="card-body bg-body-tertiary">
                    <div class="file-select" id="src-file2">
                      <input type="file" class="newPhoto2" name="imgResultExercise" accept="image/*">
                    </div>
                  </div>
                </div>
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

<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:550px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Detalle de Ejercicio</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class="col-form-label">Nombre:</label>
            <input type="text" id="detail_nameExercise" class="form-control" readonly>
          </div>

          <div class="mb-2">
            <label class="col-form-label">Descripcion:</label>
            <textarea id="detail_descriptionExercise" rows="6" class="form-control" readonly></textarea>
          </div>

          <div class="row">
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de ejemplo:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg">
                </div>
              </div>
            </div>
            <div class="col col-sm-6">
              <div class="mb-4">
                <label class="col-form-label">Imagen de resultado:</label>
                <div class="card ms-2" style="width: 13rem;">
                  <img src="assets/img/exercises/default.png" class="card-img-top previewImg2">
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
          </div>
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

<script src="assets/js/admin/list-exercises.js"></script>