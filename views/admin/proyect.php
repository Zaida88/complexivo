<div class="content">
  <h1><b>Informacion del Proyecto</b></h1>
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-4">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo $_SESSION["logo_proyect"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["logo_proyect"]; ?>">
            <div class="card-body">
              <div class="mb-3">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newLogo" name="newLogo" accept="image/*" required>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button name="logo" type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <?php
            $updateLogo = new ProyectController();
            $updateLogo->ctrChangeLogo();
            ?>
        </form>
      </div><br>
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-8 offset-md-0 row bg-body-secondary">
      <div class="col-sm-9 mt-4">
        <div class="row">
          <div class="col-5">
            <strong>Nombre:</strong>
          </div>
          <div class="col-7">
            <?php echo $_SESSION["name_proyect"]; ?>
          </div>
        </div>
      </div>
      <tbody class="divider">
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>description:</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["description_proyect"]; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>email:</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["email_proyect"]; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-5">
              <strong>telefono :</strong>
            </div>
            <div class="col-7">
              <?php echo $_SESSION["phone_number_proyect"]; ?>
            </div>
          </div>
        </div>
        <div style="width:100%;" class="go">
          <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#updateProfileModal">Editar información</button>
        </div>
        <hr>
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
            <label for="recipient-name" class="col-form-label">Nombre de proyecto:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $_SESSION["name_proyect"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <input type="text" class="form-control" name="description" value="<?php echo $_SESSION["description_proyect"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Correo:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION["email_proyect"]; ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Telefono:</label>
            <input type="email" class="form-control" name="phoneNumber" value="<?php echo $_SESSION["phone_number_proyect"]; ?>" required>
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
          $updateProject = new UsersController();
          $updateProject->ctrUpdateUser();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>