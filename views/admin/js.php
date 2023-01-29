<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

<h1 class="d-flex justify-content-center"><b>JAVASCRIPT - Ejercicios</b></h1><br>

<div class="content d-flex justify-content-center">
  <?php
  $item = "id";
  $value = 1;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
  ?>
</div>
</div>