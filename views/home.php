<?php
$item = null;
$value = null;
$proyect = ProyectController::ctrShowProyect($item, $value);
foreach ($proyect as $key => $value) {
    echo '
    <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-0 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-1">
        <h1 class="display-4 fw-bold lh-1">' . $value["name"] . '</h1>
        <p class="lead">'. $value["description"] . '</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <a href="login"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Iniciar sesión</button></a>
        <a href="registration"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Registrarse</button></a>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 shadow-lg">
          <img src="' . $value["logo"] . '" alt="' . $value["logo"] . '" width="100%">
      </div>
    </div>
  </div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
<p class="col-md-4 mb-0 text-muted">&copy; 2023 Worldcodes</p>

<ul class="nav col-md-4 justify-content-end">
<h5 style="margin-right: 25%;">Información de contacto</h5>
  <li class="nav-item" style="margin-right: 7%;"><i class="fa-solid fa-phone">&nbsp;</i>' . $value["phone_number"] . '</li>
  <li class="nav-item" style="margin-right: 7%;"><i class="fa-solid fa-envelope">&nbsp;</i>' . $value["email"] . '</li>
</ul>
</footer>
';
}
?>
