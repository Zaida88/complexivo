<link rel="stylesheet" href="assets/css/exercise.css">
<div class="content justify-content-center">
  <div class="d-flex justify-content-center">
    <h1 class="card-title" style="margin-bottom: 0;">Realizar ejercicio</h1>
  </div><br>
  <div class="content d-flex justify-content-center">
    <?php
    $table = "exercises";
    $item = "id";
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
                  <input style="display: none;" id="idCode" value="<?php echo $values["id"]; ?>">
                </div>
              <?php } ?>
            </div>
          </div>
        </div><br>

        <div class="float-sm-start" style="margin-left: 20%;">
          <a href="index.php?routes=language&idLanguage=1"><button type="button"
              class="btn btn-secondary">Cancelar</button></a>
        </div>
        <div class="float-sm-end" style="margin-right: 20%;">
          <button class="btn btn-primary" onclick="check()">Verificar</button>
        </div>
      </div>
    </div>

  </div>

</div>
<script src="assets/js/exercise.js"></script>