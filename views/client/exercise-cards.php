<link rel="stylesheet" href="assets/css/client/exercise.css">
<div class="container-fluid" style="margin-top: -15px;">
  <div class="row text-white text-center">
    <div style="background-color:black;" class="col-sm-3">
      <div class="justify-content-center">
        <div class="d-flex justify-content-start go mt-4">
          <button style="background-color:#B61717; color:white;" type=" button" class="btn back"
            idLabel="<?php echo $_GET["idLabel"]; ?>"
            idLanguage="<?php echo $_GET["idLanguage"]; ?>">
            <i class="fa-sharp fa-solid fa-arrow-left"></i>&nbsp;Regresar
          </button>
        </div>
        <div class="d-flex justify-content-center">
          <h2 class="card-title text-white mt-4"><b>Realizar ejercicio</b></h2>
        </div><br>
        <textarea style="display:none;" id="idExercises"><?php echo $_GET["idExercise"]; ?></textarea>
        <textarea style="display:none;" id="idUser"><?php echo $_SESSION["id_user"] ?></textarea>
        <div class="content d-flex justify-content-center">
          <?php
          $table = "exercises";
          $item = "id_exercise";
          $value1 = $_GET["idExercise"];
          $result = ExerciseModel::mdlShowExercise($table, $item, $value1);
          foreach ($result as $key => $values) { ?>
            <div class="card border rounded-4" style="width: auto;">
              <div class="card-body rounded-4" style="background-color:black;">
                <h4 class="card-title d-flex justify-content-center text-white" style="margin-bottom: -15px;">
                  <?php echo $values["name_exercise"]; ?>
                </h4><br>
                <p class="card-text text-white">
                  <?php echo $values["description_exercise"]; ?>
                </p>
              <?php } ?>
              <p class="d-flex justify-content-start text-white"><b>Ejemplo:</b></p>
              <img src="<?php echo $values["img_example_exercise"] ?>" class="img-fluid" alt="img">
              <div class="d-flex justify-content-center mt-5 go">
                <button class="btn btn-primary" onclick="check()"><b>Comprobar</b></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="background-color:black;" class="col-sm">
      <div class="pt-4 ps-1 pe-1" style="display:block;" id="exerciseContent">
        <?php
        $item = "id_language";
        $value2 = $_GET["idLanguage"];
        $resultLanguage = DashboardAdminController::ctrShowLanguage($item, $value2);
        ?>
        <p class="text-white mt-4" style="text-align:justify;">
          <?php echo $resultLanguage["start_code_language"] ?>
        </p>
        <div class="card">
          <div class="card-body container bigBox" id="result">
            <div id="list">
              <?php
              $table = "codes";
              $item = "idExercise";
              $value3 = $_GET["idExercise"];
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
        <p class="text-white mt-3" style="text-align:justify;">
          <?php echo $resultLanguage["end_code_language"] ?>
        </p>
      </div>
      <div style="display:none; margin:25%;" id="resultIncorrect" class="result">
        <div class="alert" role="alert">
          <b style="color:red;">¡Incorrecto!</b>
          <button type="button" class="btn btn-link recharge" style="color:#F4ED10;">
           <b>¿Intentalo nuevamente?</b> 
          </button>
        </div>
      </div>

      <div style="display:none;" id="resultCorrect">
        <div id="showMessage">

        </div>
        <div class="alert p-1 mt-4 result" role="alert" style="margin-right:25%; margin-left:25%; color:#76E225;">
          <b>¡LO LOGRASTE!</b><br>
          <button idLabel="<?php echo $_GET["idLabel"]; ?>" type="button" class="btn btn-link openAnother"
            style="color:#EF4306;">
            <b>¿Desea intentar otro ejercicio?</b>
          </button>
        </div>
        <?php
        $table = "exercises";
        $item = "id_exercise";
        $value4 = $_GET["idExercise"];
        $result = ExerciseModel::mdlShowExercise($table, $item, $value4);
        foreach ($result as $key => $values) { ?>
          <p style="text-align:justify;" class="text-white"><b>Resultado:</b></p>
          <img src="<?php echo $values["img_result_exercise"] ?>" class="img-fluid" alt="img"><br>
        <?php } ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
  <script src="assets/js/client/exercise-cards.js"></script>