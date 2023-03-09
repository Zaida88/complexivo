<link rel="stylesheet" href="assets/css/client/exercise.css">
<div class="container-fluid" style="margin-top: -15px;">
  <div class="row text-white text-center">
    <div style="background-color:black;" class="col-sm-3">
      <div class="justify-content-center">
        <div class="d-flex justify-content-start go mt-4">
          <button style="background-color:#B61717; color:white;" type=" button" class="btn back" idLabel="<?php echo $_GET["idLabel"]; ?>"
            idLanguage="<?php echo $_GET["idLanguage"]; ?>">
            <i class="fa-sharp fa-solid fa-arrow-left"></i>&nbsp;Regresar
          </button>
        </div>
        <div class="d-flex justify-content-center">
          <h2 style="color:#F4ED10;" class="card-title mt-4"><b>Realizar ejercicio</b></h2>
        </div>
        <div class="content d-flex justify-content-center">
          <?php
          $table = "exercises";
          $itemEx = "idLabel";
          $itemEx2 = "number_exercise";
          $valueEx = $_GET["idLabel"];
          $valueEx2 = $_GET["numberExercise"];
          $result1 = ExerciseModel::mdlExercise($table, $itemEx, $valueEx, $itemEx2, $valueEx2); ?>
          <div style="background-color:black;"  class="card rounded-4" style="width: auto;">
            <div style="background-color:black;" class="card-body rounded-4">
              <h4 style="color:#10D4F4;" class="card-title d-flex justify-content-center" style="margin-bottom: -15px;">
                <?php echo $result1["name_exercise"]; ?>
              </h4><br>
              <p class="card-text text-white">
                <?php echo $result1["description_exercise"]; ?>
              </p>
              <p style="color:#A7B2E7;" class="d-flex justify-content-start"><b>Ejemplo:</b></p>
              <img src="<?php echo $result1["img_example_exercise"] ?>" class="img-fluid" alt="img">
              <div class="d-flex justify-content-center mt-4 go">
                <button style="background-color:#8A10F4; color:white;" class="btn" onclick="check()">
                  <b>Comprobar</b>
                </button>
              </div>
            </div>
          </div>
        </div>
        <textarea style="display:none;" id="idExercises"><?php echo $result1["id_exercise"]; ?></textarea>
        <textarea style="display:none;" id="idUser"><?php echo $_SESSION["id_user"] ?></textarea>
        <textarea style="display:none;" id="idLabel"><?php echo $_GET["idLabel"] ?></textarea>
      </div>
    </div>
    <div style="background-color:black;" class="bord col-sm">
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
        <p class="text-white mt-3" style="text-align:justify;">
          <?php echo $resultLanguage["end_code_language"] ?>
        </p>
      </div>
      <div style="display:none; margin:25%;" id="resultIncorrect" class="result">
        <div class="alert" role="alert">
          <h3><b style="color:red;">¡Incorrecto!</b></h3>
          <button type="button" class="btn btn-link recharge" style="color:#10F44E;">
           <b>¿Intentalo nuevamente?</b> 
          </button>
        </div>
      </div>

      <div style="display:none;" id="resultCorrect">
        <div id="showMessage">

        </div>
        <div class="alert p-1 mt-4 result" role="alert" style="margin-right:25%;margin-left:25%;">
          <h3><b style="color:#29F410;">¡LO LOGRASTE!</b></h3><br>
          <?php
          $tableExs = "exercises";
          $itemExs2 = "idLabel";
          $valueExs2 = $_GET["idLabel"];
          $results = ExerciseModel::mdlExercises($tableExs, $itemExs2, $valueExs2);
          if ($result1["number_exercise"] < count($results)) { ?>
            <button idLabel="<?php echo $_GET["idLabel"]; ?>" numberExercise="<?php echo $result1["number_exercise"]; ?>"
              idLanguage="<?php echo $_GET["idLanguage"]; ?>" type="button"
              style="background-color:#10F49B; color:black;" class="btn btn-secondary next">
              <b>Siguiente</b>&nbsp;<i class="fa-solid fa-arrow-right-to-bracket"></i></button>
          <?php } else { ?>
            <button idLanguage="<?php echo $_GET["idLanguage"]; ?>" type="button" class="btn btn-link openAnother">¿Desea
              aprender algo nuevo?</button>
          <?php } ?>
        </div>
        <p style="text-align:justify; color:#F4108F;" class=""><b>Resultado:</b></p>
        <img src="<?php echo $result1["img_result_exercise"] ?>" class="img-fluid" alt="img"><br>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
  <script src="assets/js/client/exercise-cards.js"></script>