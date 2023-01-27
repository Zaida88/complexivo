<main class="container-fluid p-5 mt-5 mb-0">
  <div class="d-flex justify-content-center">
    <div class="col-sm-3 mb-sm-0">
      <form method="post" class="card bg-body-tertiary">
        <div class="card-body">
          <div class="text-center">
            <h3>Iniciar sesión</h3>
          </div>
          <?php
          $login = new UsersControllers();
          $login->ctrLogin();
          ?>
          <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
            <div class="float-sm-end"><a href="reset-pass">Olvidé mi contraseña</a></div><br>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>