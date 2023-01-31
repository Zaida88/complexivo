<link rel="stylesheet" href="assets/css/eye.css">
<div class="content d-flex justify-content-center">
  <?php
  $item = "id_language";
  $value = 1;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
  ?>
</div>

<div class="content">
  <?php
  $itemEx = "id_user";
  $item = "id_language";
  $value = $language["id_language"];
  $valueEx = $_SESSION["id"];
  $optionEx = "*";
  $exercise = ExerciseController::ctrShowExercises($itemEx, $item, $value, $valueEx, $optionEx);
  foreach ($exercise as $key => $values) {
    echo '
    <button class="check btn btn-outline-secondary me-3" id="' . $values["id"] . '">' . $values["name_exercise"] . '</button>';  ?>
  <?php  }?>

</div>
<script src="assets/js/exercises.js"></script>