<div class="content">
  <div class="d-flex justify-content-center">
    <?php
    $item = "id_language";
    $value = $_GET["idLanguage"];
    $language = DashboardAdminController::ctrShowLanguages($item, $value);
    echo '<div>
  <h1 class="card-title" style="margin-bottom: 0;"><b> Ejercicios de ' . $language["name_language"] . '</b></h1>
        </div>';
    ?>
  </div><br>
  <div class="d-flex justify-content-end go">
    <button style="margin-top:-7px; margin-left:1px;"
      type="button" class="btn btn-primary createExercise"> <b>Agregar Ejercicio</b>
    </button>
  </div>
  <div class="row">
    <?php
    $item = "idLanguage";
    $value = $language["id_language"];
    $optionEx = "*";
    $exercise = ExerciseController::ctrListExercisesAdmin($item, $value, $optionEx);
    foreach ($exercise as $key => $values) { ?>
      <div class="card ms-4" style="width: 14rem;">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $values["name_exercise"]; ?>
          </h5>
          <div class="d-flex justify-content-center">
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateExerciseModal"
              idExercise="<?php echo $values['id_exercise']; ?>">Editar</button>
            &nbsp&nbsp
            <button class="btn btn-danger deleteExercise"
              idExercise="<?php echo $values['id_exercise']; ?>">Eliminar</button>
          </div>
        </div>
      </div>
    <?php } ?>
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

          <input type="hidden" id="id_user" name="id_user">

          <div class="mb-2">
            <label class="col-form-label">Nombre del ejercicio:</label>
            <input type="text" name="name_exercise" id="name_exercise" class="form-control" required>
            <input type="hidden" name="idLanguage" id="idLanguage" value="<?php echo $language['id_language']; ?>" class="form-control" required>
          </div>

          <div class="mb-4">
            <label class="col-form-label">Descripcion:</label>
            <input type="text" name="description_exercise" id="description_exercise" class="form-control" required>
          </div>

          <div class="input-group mb-2 cards">
            <span class="input-group-text" id="basic-addon1">Cantidad de tarjetas a crear:</span>
            <input id="option" type="number" class="form-control" aria-describedby="basic-addon1">
            <button for="inputGroupSelect02" type="button" class="btn btn-primary createCards"
              >Crear</button>
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

          <input type="hidden" id="id_user" name="id_user">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del Ejercicio:</label>
            <input type="text" name="name_exercise" id="name_exercise" class="form-control" value="" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <input type="text" name="description_exercise" id="description_exercise" class="form-control" value=""
              required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="updateCard">Guardar</button>
          </div>
          <?php
          $updateCard = new UsersController();
          $updateCard->ctrRenewUser();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/list-exercises-admin.js"></script>