<link rel="stylesheet" href="assets/css/eye.css">
<div class="content d-flex justify-content-center">
  <?php
  $item = "id";
  $value = 2;
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
  $optionEx = "*";
  $exercise = ExerciseController::ctrShowExercises($tableEx, $itemEx, $valueEx,$optionEx);
  foreach ($exercise as $key => $values) {
    echo '
    <button class="btn btn-outline-secondary me-3">' . $values["name"] . '</button>';
  }
  ?>
<script src="assets/js/eye.js"></script>
  <!-- <input type="password" name="password" class="form-control password1" value="clave" placeholder="" />
  <span class="fa fa-fw fa-eye password-icon show-password"></span> -->