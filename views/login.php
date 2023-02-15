<link rel="stylesheet" href="assets/css/login.css">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            <form method="post">
              <div class="mb-md-3 mt-md-3 pb-2">

                <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
                <?php
                $login = new UsersController();
                $login->ctrLogin();
                ?>
                <div class="form-outline form-white mb-4">
                  <input type="text" name="username" class="form-control form-control-lg"
                    placeholder="Nombre de usuario" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg"
                    placeholder="Contraseña" />
                </div>

                <p class="small"><a class="text-white-50" href="reset-pass">Olvidé mi contraseña</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar sesión</button>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>