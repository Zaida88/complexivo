<link rel="stylesheet" href="assets/css/client/exercise.css">
<div class="container-fluid" style="margin-top: -15px;">
  <div class="row text-white text-center">
    <div class="col-sm  bg-dark-subtle">
      <div class="justify-content-center">
        <div class="d-flex justify-content-start go mt-2">
          <button type=" button" class="btn btn-dark back"
            idLabel="<?php echo $_GET["idLabel"]; ?>">&#129044;Atras</button>
        </div>
        <div class="d-flex justify-content-center">
          <h2 class="card-title text-dark mt-2"><b>Realizar ejercicio</b></h2>
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
                <h4 class="card-title d-flex justify-content-center text-dark" style="margin-bottom: -15px;">
                  <?php echo $values["name_exercise"]; ?>
                </h4><br>
                <p class="card-text text-dark">
                  <?php echo $values["description_exercise"]; ?>
                </p>
              <?php } ?>
              <p class="d-flex justify-content-start text-dark"><b>Ejemplo:</b></p>
              <img src="<?php echo $values["img_example_exercise"] ?>" class="img-fluid me-5" alt="img">
              <div class="d-flex justify-content-center mt-2 go">
                <button class="btn btn-primary" onclick="check()">Verificar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm bg-body-secondary">
      <div class="pt-5 ps-1 pe-1">
        <?php
        $item = "id_language";
        $value = $_GET["idLanguage"];
        $resultLanguage = DashboardAdminController::ctrShowLanguage($item, $value);
        ?>
        <p class="text-dark mt-2" style="text-align:justify;">
          <?php echo $resultLanguage["start_code_language"] ?>
        </p>
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
        <p class="text-dark mt-2" style="text-align:justify;">
          <?php echo $resultLanguage["end_code_language"] ?>
        </p>
      </div>
    </div>

  </div>
</div>

<script src="assets/js/client/exercise-cards.js"></script>

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