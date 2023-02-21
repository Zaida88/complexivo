<link rel="stylesheet" href="assets/css/exercise.css">
<div class="content justify-content-center">
  <div class="d-flex justify-content-center">
    <h1 class="card-title"><b>Realizar ejercicio</b></h1>
  </div>
  <div class="content d-flex justify-content-center">
    <?php
    $table = "exercises";
    $item = "id_exercise";
    $value = $_GET["idExercise"];
    $result = ExerciseModel::mdlShowExercise($table, $item, $value);
    foreach ($result as $key => $values) { ?>
      <div class="card border border-secondary rounded-4" style="width: auto;">
        <div class="card-body bg-body-secondary rounded-4">
          <h3 class="card-title d-flex justify-content-center" style="margin-bottom: -15px;">
            <?php echo $values["name_exercise"]; ?>
          </h3><br>
          <p class="card-text">
            <?php echo $values["description_exercise"]; ?>
          </p>
        <?php } ?>
        <textarea style="display: none;" id="idLanguages" ><?php echo $values['idLanguage']; ?></textarea>
        <div class="d-flex justify-content-center">
          <div class="card" style="width: auto;">
            <div class="card-body container bigBox" id="result">
              <?php
              $table = "codes";
              $item = "idExercise";
              $value = $_GET["idExercise"];
              $result = ExerciseModel::mdlShowExercise($table, $item, $value);
              shuffle($result);
              foreach ($result as $key => $values) { ?>
                <div class="btn btn-secondary box" draggable="true">
                  <?php echo $values["name_code"]; ?>
                  <input id="idCode" style="display: none;" value="<?php echo $values["number_code"]; ?>">
                </div>
              <?php } ?>
            </div>
          </div>
        </div><br>
        <div class="d-flex justify-content-center go">
        <button type="button" class="btn btn-secondary me-3 back">Cancelar</button>
          <button class="btn btn-primary" onclick="check()">Verificar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/exercise-cards.js"></script>

<div class="modal fade" id="modalCorrect" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="incorrectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
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