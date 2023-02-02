<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

      <div class="row justify-content-end">
        <div class="col-auto">
          <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#proyectModal">
            <i class="fa-solid fa-user-plus"></i>Agregar Ejercicio
          </a>
        </div>
      </div>

<div class="content d-flex justify-content-center">
  <?php
  $item = "id_language";
  $value = 1;
  $language = DashboardClientController::ctrShowLanguages($item, $value);
  echo '<div">
  <h1 class="card-title" style="margin-bottom: 0;">' . $language["name"] . ' - Ejercicios</h1>
        </div>';
  ?>
</div>
</div>