<link rel="stylesheet" href="assets/css/exercise.css">
<div class="content justify-content-center">
  <div class="d-flex justify-content-center">
    <h1 class="card-title" style="margin-bottom: 0;">Realizar ejercicio</h1>
  </div><br>
  <div class="content d-flex justify-content-center">
    <?php
    $table = "exercises";
    $item = "id_exercise";
    $value = $_GET["idExercise"];
    $result = ExerciseModel::mdlShowExercise($table, $item, $value);
    foreach ($result as $key => $values) { ?>
      <div class="card" style="width: auto;">
        <div class="card-body">
          <h3 class="card-title d-flex justify-content-center" style="margin-bottom: -15px;">
            <?php echo $values["name_exercise"]; ?>
          </h3>
          <p class="card-text">
            <?php echo $values["description"]; ?>
          </p><br>
        <?php } ?>
        <div class="d-flex justify-content-center">
          <div class="card" style="width: auto;">
            <div class="card-body container" id="result">
              <?php
              $table = "codes";
              $item = "id_exercise";
              $value = $_GET["idExercise"];
              $result = ExerciseModel::mdlShowExercise($table, $item, $value);
              shuffle($result);
              foreach ($result as $key => $values) { ?>
                <div class="btn btn-secondary box" draggable="true">
                  <?php echo $values["name"]; ?>
                  <input id="idCode" style="display: none;" value="<?php echo $values["number"]; ?>">
                </div>
              <?php } ?>
            </div>
          </div>
        </div><br>
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary" onclick="check()">Verificar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/exercise-cards.js"></script>

<div class="modal fade" id="modalCorrect" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border border-success bg-success-subtle">

      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Correcto</h1>
        </div>
        <div class="modal-footer">
          <button type="submit" name="code" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
        </div>
        <?php
        $saveStatus = new ExerciseController();
        $saveStatus->ctrSaveStatus($value, $_GET["idLanguage"]);
        ?>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="incorrectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border border-danger-subtle bg-danger-subtle">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Incorrecto</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Intentar nuevamente</button>
      </div>
    </div>
  </div>
</div>
