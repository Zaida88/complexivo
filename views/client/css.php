<link rel="stylesheet" href="assets/css/exercise.css">
<div class="content d-flex justify-content-center">
  <?php
  $item = "id_language";
  $value = 3;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
  ?>
</div>

<div class="content">
  <div class="row">
    <?php
    $itemEx = "id_user";
    $item = "id_language";
    $value = $language["id_language"];
    $valueEx = $_SESSION["id"];
    $optionEx = "*";
    $exercise = ExerciseController::ctrShowExercises($itemEx, $item, $value, $valueEx, $optionEx);
    foreach ($exercise as $key => $values) { ?>
      <div class="card ms-4" style="width: 14rem;">
      <a href="exercise"  style="text-decoration: none; color: black;">
      <div class="card-body">
          <h5 class="card-title">
            <?php echo $values["name_exercise"]; ?>
          </h5>
          Finalizado:
          <input class="form-check-input" type="checkbox" <?php echo $values['state'] == true ? 'checked' : ''; ?>
            onclick="return false;">
        </div>
      </a>
      </div>
    <?php } ?>
  </div>
</div>
<script src="assets/js/exercises.js"></script>