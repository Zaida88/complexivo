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