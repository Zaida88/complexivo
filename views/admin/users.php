
<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreateUser" style="background-color:#04246E; color:white; border: 2px #04246E solid;">
          
          Agregar usuario

        </button>
<h1 class="d-flex justify-content-center"><b>Usuarios</b></h1><br>

<div class="row">

    <div class="col">

      <table class="table table-striped">

        <thead class="table-danger">
          <tr>
            <th style="width:15%; text-align: center;">Nombre</th>
            <th style="width:13%; text-align: center;">Rol</th>
            <th style="width:3%; text-align: center;">Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php
      $item = null;
      $valor = null;
      $users = UsersController::ctrShowUsers($item, $valor);

      foreach ($users as $key => $value) {
        echo '<td>' . $value["first_name"] . '</td>
        <td>' . $value["id_rol"] . '</td>
        
        <td>
        <div class="btn-group" >
        <button type="button" class="btn btn-primary"  . $value["id"] . data-bs-toggle="modal" data-bs-target="#modalUpdateProyect">Editar</button>
        |<button class="btn btn-danger">Eliminar</button>
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

<div id="modalCreateUser" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#04246E; color:white">

          <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" style="background:white; color:white">

          <div class="box-body" style="background:white; color:white; border: 2px white solid;">

          <div class="card-body ">
                    <div class="text-center">
                        <h3>Registro</h3>
                    </div>
                    <?php
                    $registration = new UsersController();
                    $registration->ctrCreateUser();
                    ?>
                    <div id="contain">
                        <div id="prin">
                            <div  class="mb-3">
                                <label for="newUsername" class="form-label">Nombre de usuario:</label>
                                <input type="text" name="newUsername" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Nombre:</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Apellido:</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div id="prin1">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password1" class="form-label">Contraseña:</label>
                                <input type="password" name="password1" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password2" class="form-label">Repetir contraseña:</label>
                                <input type="password" name="password2" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div id="containe">
                        <div id="nam">
                            <label for="newPhoto" class="form-label"><b>Foto de perfil: </b></label>
                            <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                        </div>
                        <div id="im">
                            <img src="assets/img/users/user-default.png" class="img-thumbnail previewImg" width="180px">
                            <input type="hidden" name="logoActual" id="logoActual">
                        </div>
                    </div><br>

                   
                </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer"  style="background-color:white; color:black; border: 2px white solid;">

        <div class="float-sm-start">
                        <a href="home"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                    </div>

                    <div class="float-sm-end">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
        </div>
        <?php

$createUser = new UsersController();
$createUser -> ctrCreateUser();

?>

</form>

</div>

</div>

</div>






  </div>