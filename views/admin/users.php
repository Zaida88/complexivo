
<div class="content">
  
  <link rel="stylesheet" href="assets/css/users.css">

      <div class="row justify-content-end">
        <div class="col-auto">
         <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#createUserModal"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;Agregar usuario
          </button>            
        </div>
      </div>
  <h1><b>Usuarios</b></h1><br>

  <div class="row">
    <div class="col">
      <table class="table table-striped tab">
        <thead class="table-dark">
          <tr>
            <th style="width:15%;">Username</th>
            <th style="width:15%;">Correo</th>
            <th style="width:13%;">Rol</th>
            <th style="width:13%;">Estado</th>
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
                ?>
                 
                <tr>
                  <td>
                     <?php echo $value["username_user"]; ?>
                  </td>
                  <td>
                    <?php echo $value["email_user"]; ?>
                  </td>
                  <td>
                    <?php echo $value["name_rol"]; ?>
                  </td>
                  
                  <?php
                  if( $value["state_user"] != 0){?>

                    <td>
                        <button class="btn btn-success btn-xs btnActivate" idUser="<?php $value["id_user"]; ?>" 
                          stateUser="0">Activado
                        </button>
                    </td>
                  <?php
                  }else{?>

                    <td>
                      <button class="btn btn-danger btn-xs btnActivate" idUser="<?php $value["id_user"]; ?>" 
                        stateUser="1">Desactivado
                      </button>
                    </td>
                    <?php
                  }  ?>

                  <td>
                    <div class="btn-group users" >
                      <button class="btn btn-primary updateUser" idUser="<?php echo $value['id_user']; ?>"
                        data-bs-toggle="modal" data-bs-target="#updateUserModal">
                        <i class="fa-solid fa-user-pen"></i> 
                      </button>
                    </div>
                  </td>
                </tr>
            <?php
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Nuevo Usuario</b></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="card-body">
              <?php
                $registration = new UsersController();
                $registration->ctrMakeUser();
              ?>
                <div class="row ">
                  <div id="principal">
                    <div class="mb-3">
                      <label for="newUsername" class="form-label"><b>Nombre de usuario:</b></label>
                      <input type="text" name="newUsername" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="first_name" class="form-label"><b>Nombre:</b></label>
                      <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="last_name" class="form-label"><b>Apellido:</b></label>
                      <input type="text" name="last_name" class="form-control" required>
                    </div>
                  </div>
                  <div id="sidebar">
                    <div class="mb-3">
                      <label for="email" class="form-label"><b>Correo electrónico:</b></label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="password1" class="form-label"><b>Contraseña:</b></label>
                      <input type="password" name="password1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                      <label for="password2" class="form-label"><b>Repetir contraseña:</b></label>
                      <input type="password" name="password2" class="form-control" required>
                    </div>
                  </div>

                    <div class="mb-3">
                      <label for="newPhoto" class="form-label"><b>Foto de perfil:</b></label>
                      <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                      <img src="assets/img/users/user-default.png" class="previewImg"
                        width="180px">
                    </div>
                </div>
                <div class="float-sm-start ms-5">
                  <a href="users"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                </div>
                <div class="float-sm-end me-5">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
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
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Permiso</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
          
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de usuario:</label>
                <input type="text" name="usernameUser" id="usernameUser" class="form-control" readonly>
                <input type="hidden" name="idUser" id="idUser" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="message-text" class="col-form-label">Correo:</label>
                <input type="text" name="emailUser" id="emailUser" class="form-control" readonly>
            </div>

           <div class="mb-3">
            <label for="message-text" class="col-form-label">Rol usuario:</label><br>
            <input type="text" name="idRole" id="idRole" class="form-control"  
            placeholder="Escribe el rol, 1 admin, 2 client, 3 creator..">
           </div>
            <br><br>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateUser">Guardar</button>
            </div>
            <?php
              $updateUser = new UsersController();
              $updateUser->ctrUpdateUserRol();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>