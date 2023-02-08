<?php
$item = null;
$value = null;
$proyect = ProyectController::ctrShowProyect($item, $value);
foreach ($proyect as $key => $value) {
    echo '
    <div class="container d-flex justify-content-center">
    <div class="col-lg-9 row p-4 m-4 pt-lg-4 pb-lg-2 rounded-5 align-items-center shadow-lg bg-dark">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-1">
        <h1 class="display-4 fw-bold lh-1 text-white">' . $value["name_proyect"] . '</h1>
        <p class="lead text-white">'. $value["description_proyect"] . '</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <a href="login"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Iniciar sesión</button></a>
        <a href="registration"><button type="button" class="btn btn-light btn-lg px-4">Registrarse</button></a>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 shadow-lg">
          <img src="' . $value["logo_proyect"] . '" alt="' . $value["logo_proyect"] . '" width="100%">
      </div>
    </div>
  </div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">

<ul class="nav col-md-4 justify-content-end">
<h5 style="margin-right: 30%;">Información de contacto</h5>
  <li class="nav-item" style="margin-right: 30%;"><i class="fa-solid fa-phone">&nbsp;</i>' . $value["phone_number_proyect"] . '</li>
  <li class="nav-item" style="margin-right: 30%;"><i class="fa-solid fa-envelope">&nbsp;</i>' . $value["email_proyect"] . '</li>
</ul><br><br>
<p class="col-md-3 mb-0 text-muted">&copy; 2023 Worldcodes</p>
</footer>
';
}
?>
