<link rel="stylesheet" href="assets/css/client/exercise.css">
<div class="container-fluid" style="margin-top: -15px;">
  <div class="row text-white text-center">
    <div class="col-sm  bg-dark-subtle">
      <div class="justify-content-center">
        <div class="d-flex justify-content-start go mt-2">
          <button type=" button" class="btn btn-dark back" idLabel="<?php echo $_GET["idLabel"]; ?>"
            idLanguage="<?php echo $_GET["idLanguage"]; ?>">Regresar</button>
        </div>
        <div class="d-flex justify-content-center">
          <h2 class="card-title text-dark mt-2"><b>Realizar ejercicio</b></h2>
        </div>
        <div class="content d-flex justify-content-center">
          <?php
          $table = "exercises";
          $itemEx = "idLabel";
          $itemEx2 = "number_exercise";
          $valueEx = $_GET["idLabel"];
          $valueEx2 = $_GET["numberExercise"];
          $result1 = ExerciseModel::mdlExercise($table, $itemEx, $valueEx, $itemEx2, $valueEx2); ?>
          <div class="card border border-secondary rounded-4" style="width: auto;">
            <div class="card-body bg-body-secondary rounded-4">
              <h4 class="card-title d-flex justify-content-center text-dark" style="margin-bottom: -15px;">
                <?php echo $result1["name_exercise"]; ?>
              </h4><br>
              <p class="card-text text-dark">
                <?php echo $result1["description_exercise"]; ?>
              </p>
              <p class="d-flex justify-content-start text-dark"><b>Ejemplo:</b></p>
              <img src="<?php echo $result1["img_example_exercise"] ?>" class="img-fluid" alt="img">
              <div class="d-flex justify-content-center mt-2 go">
                <button class="btn btn-primary" onclick="check()">Verificar</button>
              </div>
            </div>
          </div>
        </div>
        <textarea style="display:none;" id="idExercises"><?php echo $result1["id_exercise"]; ?></textarea>
        <textarea style="display:none;" id="idUser"><?php echo $_SESSION["id_user"] ?></textarea>
        <textarea style="display:none;" id="idLabel"><?php echo $_GET["idLabel"] ?></textarea>
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
            <div id="list">
              <?php
              $table = "codes";
              $item = "idExercise";
              $value3 = $result1["id_exercise"];
              $result = ExerciseModel::mdlShowExercise($table, $item, $value3);
              shuffle($result);
              foreach ($result as $key => $values) { ?>
                <div class="btn btn-secondary m-1">
                  <?php echo $values["name_code"]; ?>
                  <input id="idCode" style="display: none;" value="<?php echo $values["number_code"]; ?>">
                </div>
              <?php } ?>
            </div>
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
          <b>¡Correcto!</b><br>
          <?php
          $tableExs = "exercises";
          $itemExs2 = "idLabel";
          $valueExs2 = $_GET["idLabel"];
          $results = ExerciseModel::mdlExercises($tableExs, $itemExs2, $valueExs2);
          if ($result1["number_exercise"] < count($results)) { ?>
            <button idLabel="<?php echo $_GET["idLabel"]; ?>" numberExercise="<?php echo $result1["number_exercise"]; ?>"
              idLanguage="<?php echo $_GET["idLanguage"]; ?>" type="button"
              class="btn btn-secondary next">Siguiente</button>
          <?php } else { ?>
            <button idLanguage="<?php echo $_GET["idLanguage"]; ?>" type="button" class="btn btn-link openAnother">¿Desea
              aprender algo nuevo?</button>
          <?php } ?>
        </div>
        <p style="text-align:justify;" class="text-dark"><b>Resultado:</b></p>
        <img src="<?php echo $result1["img_result_exercise"] ?>" class="img-fluid" alt="img"><br>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
  <script src="assets/js/client/exercise-cards.js"></script>