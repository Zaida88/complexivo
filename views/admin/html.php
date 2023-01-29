<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

<div class="content d-flex justify-content-center">
  <?php
  $item = "id";
  $value = 2;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">' . $language["name"] . ' - Ejercicios</h1>
        </div>';
  ?>
</div>
</div>