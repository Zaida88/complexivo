<link rel="stylesheet" href="assets/css/eye.css">
<div class="content d-flex justify-content-center">
  <?php
  $item = "id_language";
  $value = 2;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
  ?>
</div>

<div class="content">
  <?php
  $tableEx = "win_user";
  $itemEx = "id_user";
  $item = "id_language";
  $value = $language["id_language"];
  $valueEx = $_SESSION["id"];
  $optionEx = "*";
  $exercise = ExerciseController::ctrShowExercises($tableEx, $itemEx, $item,$value,$valueEx,$optionEx);
  foreach ($exercise as $key => $values) {
    echo '
    <button class="btn btn-outline-secondary me-3">' . $values["name"] . '</button>';
  }
  ?>
<script src="assets/js/exercises.js"></script>
  <!-- <input type="password" name="password" class="form-control password1" value="clave" placeholder="" />
  <span class="fa fa-fw fa-eye password-icon show-password"></span> -->