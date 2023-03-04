<?php
$item = null;
$value = null;
$project = ProjectController::ctrShowProject($item, $value);
foreach ($project as $key => $value) { ?>

  <body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
      <header class="py-5" style="background: -webkit-linear-gradient(to top, #aa076b, #61045f); 
      background: linear-gradient(to top, #aa076b, #61045f);">
        <div class="container px-5">
          <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
              <div class="my-5 text-center text-xl-start">
                <h1 class="display-5 fw-bolder text-white mb-2">
                  <?php echo $value["name_project"] ?>
                </h1>
                <p class="lead fw-normal text-white text-opacity-75 mb-4">
                  <?php echo $value["description_project"] ?>
                </p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                  <a href="login"><button type="button" class="btn btn-lg px-4 me-md-2 fw-bold"
                      style="background-color: black; color:white;">Iniciar
                      sesión</button></a>
                  <a href="registration"><button type="button" class="btn btn-light btn-lg px-4">Registrarse</button></a>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-4"
                src="<?php echo $value["logo_project"] ?>" alt="LOGO" /></div>
          </div>
        </div>
      </header>
      <section class="py-5 bg-dark text-white">
        <div class="container px-5 my-5">
          <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
              <div class="text-center">
                <h2 class="fw-bolder">Contenido</h2>
                <p class="lead fw-normal text-white-75 mb-5">Lenguajes disponiples</p>
              </div>
            </div>
          </div>
          <div class="row gx-5">

            <div class="col-lg-4 mb-5">
              <div class="card h-100 shadow border-0">
                <img class="card-img-top" src="assets/img/home/html.jpg" alt="html" />
                <div class="card-body p-4">
                  <a class="text-decoration-none link-dark stretched-link">
                    <h5 class="card-title mb-3">HTML</h5>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-5">
              <div class="card h-100 shadow border-0">
                <img class="card-img-top" src="assets/img/home/js.png" alt="JavaScript" />
                <div class="card-body p-4">
                  <a class="text-decoration-none link-dark stretched-link"><br>
                    <h5 class="card-title mb-3">JavaScript</h5>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-5">
              <div class="card h-100 shadow border-0">
                <img class="card-img-top" src="assets/img/home/css.jpg" alt="css" />
                <div class="card-body p-4">
                  <a class="text-decoration-none link-dark stretched-link">
                    <h5 class="card-title mb-3">CSS</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
    </main>
    <footer class="py-4 mt-auto" style="  background: -webkit-linear-gradient(to top, #aa076b, #61045f); 
      background: linear-gradient(to top, #aa076b, #61045f); ">
      <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
          <div class="col-auto">
            <div class="small m-0 text-white">Copyright &copy; Worldcodes 2023</div>
          </div>
          <div class="col-auto">
            <li class="link-light small"><i class="fa-solid fa-phone">&nbsp;&nbsp;</i>
              <?php echo $value["phone_number_project"] ?>
            </li>
            <li class="link-light small"><i class="fa-solid fa-envelope">&nbsp;&nbsp;</i>
              <?php echo $value["email_project"] ?>
            </li>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <?php
}
?>