<div class="content d-flex justify-content-center">
  <?php
  $item = "id";
  $value = 3;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
  ?>
</div>

<div class="content">
  <?php
  $tableEx = "exercises";
  $itemEx = "id_language";
  $valueEx = $language["id"];
  $exercise = ExerciseController::ctrShowExercises($tableEx, $itemEx, $valueEx);
  foreach ($exercise as $key => $values) {
    echo '
    <button class="btn btn-outline-secondary me-3">' . $values["name"] . '</button>';
  }
  ?>
</div>