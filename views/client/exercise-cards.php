<link rel="stylesheet" href="assets/css/client/exercise.css">
<div class="container-fluid" style="margin-top: -15px;">
  <div class="row text-white text-center">
    <div class="col-sm  bg-dark-subtle">
      <div class="justify-content-center">
        <div class="d-flex justify-content-start go mt-2">
          <button type=" button" class="btn btn-dark back"
            idLabel="<?php echo $_GET["idLabel"]; ?>">&#129044;&nbsp;Atrás</button>
        </div>
        <div class="d-flex justify-content-center">
          <h2 class="card-title text-dark mt-2"><b>Realizar ejercicio</b></h2>
        </div>
        <textarea style="display:none;" id="idExercises"><?php echo $_GET["idExercise"]; ?></textarea>
        <textarea style="display:none;" id="idUser"><?php echo $_SESSION["id_user"] ?></textarea>
        <div class="content d-flex justify-content-center">
          <?php
          $table = "exercises";
          $item = "id_exercise";
          $value1 = $_GET["idExercise"];
          $result = ExerciseModel::mdlShowExercise($table, $item, $value1);
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
              <img src="<?php echo $values["img_example_exercise"] ?>" class="img-fluid" alt="img">
              <div class="d-flex justify-content-center mt-2 go">
                <button class="btn btn-primary" onclick="check()">Verificar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm bg-body-secondary">
      <div class="pt-4 ps-1 pe-1" style="display:block;" id="exerciseContent">
        <?php
        $item = "id_language";
        $value2 = $_GET["idLanguage"];
        $resultLanguage = DashboardAdminController::ctrShowLanguage($item, $value2);
        ?>
        <p class="text-dark mt-2" style="text-align:justify;">
          <?php echo $resultLanguage["start_code_language"] ?>
        </p>
        <div class="card">
          <div class="card-body container bigBox" id="result">
            <?php
            $table = "codes";
            $item = "idExercise";
            $value3 = $_GET["idExercise"];
            $result = ExerciseModel::mdlShowExercise($table, $item, $value3);
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
      <div style="display:none; margin:25%;" id="resultIncorrect" class="result">
        <div class="alert alert-danger" role="alert">
          <b>¡Incorrecto!</b>
          <button type="button" class="btn btn-link recharge">¿Intentar nuevamente?</button>
        </div>
      </div>

      <div style="display:none;" id="resultCorrect">
      <div id="showMessage">

      </div>
        <div class="alert alert-success p-1 mt-4 result" role="alert" style="margin-right:25%;margin-left:25%;">
          <b>Correcto!</b><br>
          <button idLabel="<?php echo $_GET["idLabel"]; ?>" type="button" class="btn btn-link openAnother">¿Desea
            realizar otro ejercicio?</button>
        </div>
        <?php
        $table = "exercises";
        $item = "id_exercise";
        $value4 = $_GET["idExercise"];
        $result = ExerciseModel::mdlShowExercise($table, $item, $value4);
        foreach ($result as $key => $values) { ?>
          <p style="text-align:justify;" class="text-dark"><b>Resultado:</b></p>
          <img src="<?php echo $values["img_result_exercise"] ?>" class="img-fluid" alt="img"><br>
        <?php } ?>
      </div>
    </div>
  </div>

  <script src="assets/js/client/exercise-cards.js"></script>