<div class="content">
  <h1>Perfil</h1>
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-4">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo $_SESSION["photo"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["photo"]; ?>">
            <div class="card-body">
              <div class="mb-3">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newPhoto" name="newPhoto" accept="image/*" required>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button name="photo" type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <?php
            $updatePhoto = new UsersController();
            $updatePhoto->ctrChangePhoto();
            ?>
        </form>
      </div><br>
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-8 offset-md-0 row bg-body-secondary">
      <div class="col-sm-9 mt-4">
        <div class="row">
          <div class="col-5">
            <strong>Nombre de usuario:</strong>
          </div>
          <div class="col-7">
            <?php echo $_SESSION["username"]; ?>
          </div>
        </div>
      </div>
      <tbody class="divider">
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>Nombre:</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["first_name"]; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>Apellido:</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["last_name"]; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>Correo:</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["email"]; ?>
            </div>
          </div>
        </div>
        <div style="width:100%;" class="go">
          <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#updateProfileModal">Editar información</button>
        </div>
        <hr>
        <div style="margin-to p:-3%;">
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updatePassModal">Cambiar
            contraseña</button>
        </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar información</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de usuario:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $_SESSION["username"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $_SESSION["first_name"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Apellido:</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $_SESSION["last_name"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Correo:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["email"]; ?>" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Contraseña actual:</label>
            <input type="password" class="form-control" name="pass" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="updateUser">Guardar cambios</button>
          </div>
          <?php
          $updateUser = new UsersController();
          $updateUser->ctrUpdateUser();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updatePassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nueva contraseña:</label>
            <input type="password" class="form-control" name="newPass1" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Repetir contraseña:</label>
            <input type="password" class="form-control" name="newPass2" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Contraseña actual:</label>
            <input type="password" class="form-control" name="actualPass" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="updatePass">Cambiar contraseña</button>
          </div>
          <?php
          $updatePass = new UsersController();
          $updatePass->ctrUpdatePass();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>