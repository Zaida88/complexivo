
<div class="content">
  
  <link rel="stylesheet" href="assets/css/users.css">

      <div class="row justify-content-end">
        <div class="col-auto">
         <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#createUserModal"><i class="fa-solid fa-user-plus"></i>Agregar usuario
          </button>            
        </div>
      </div>
  <h1 class="d-flex justify-content-center"><b>Usuarios</b></h1><br>

  <div class="row">
    <div class="col">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th style="width:15%;">Nombre</th>
            <th style="width:15%;">Correo</th>
            <th style="width:13%;">Rol</th>
            <th style="width:3%;"></th>
          </tr>
        </thead>

        <tbody>
            <?php
              $item = null;
              $valor = null;
              $user_show = UsersController::ctrListUsers($item, $valor);

              foreach ($user_show as $key => $value) 
              {
                echo 
                '<tr>
                  <td>' . $value["username"] . '</td>
                  <td>' . $value["email"] . '</td>
                  <td>' . $value["name"] . '</td>
                  <td>
                    <div class="btn-group" >
                    <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#updateUserModal"><i class="fa-solid fa-user-pen"></i></button>
                    <button class="btn btn-danger btnDeleteUser" idUser="'.$_SESSION["id"].'" photoUser="'.$_SESSION["photo"].'" username="'.$_SESSION["username"].'"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>';
              }
            ?>
          </tbody>
      </table>  
    </div>
  </div>

  <!--=====================================
  MODAL AGREGAR USUARIO
  ======================================-->
  <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Nuevo Usuario</b></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <?php
                $registration = new UsersController();
                $registration->ctrMakeUser();
              ?>
              <div id="container" class="row align-items-start">
                <div id="principal" class="col">
                  <div class="mb-3">
                    <label for="newUsername" class="form-label">Nombre de usuario</label>
                    <input type="text" name="newUsername" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="text" name="first_name" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" name="last_name" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                </div>
                <div id="sidebar" class="col">
                  <div class="mb-3">
                    <label for="password1" class="form-label">Contraseña</label>
                    <input type="password" name="password1" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="password2" class="form-label">Repetir contraseña</label>
                    <input type="password" name="password2" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="newPhoto" class="form-label">Foto de perfil: </label>
                    <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                    <img src="assets/img/users/user-default.png" class="previewImg" width="180px">
                  </div>
                </div>
              </div>
              <div class="float-sm-start ms-5">
                <a href="home"><button type="button" class="btn btn-secondary">Cancelar</button></a>
              </div>
              <div class="float-sm-end me-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!--=====================================
  MODAL EDITAR USUARIO
  ======================================-->

  <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Usuario</b></h1>
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
            $updateUser->ctrRenewUser();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  






</div>