<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

<h1 class="d-flex justify-content-center"><b>Perfil</b></h1><br>

<div class="row">

    <div class="col">

      <table class="table table-striped">

        <thead class="table-danger">
          <tr>
            <th style="width:15%; text-align: center;">Nombre de usuario</th>
            <th style="width:15%; text-align: center;">Nombre</th>
            <th style="width:13%; text-align: center;">Correo</th>
            <th style="width:3%; text-align: center;"></th>
          </tr>
        </thead>

        <tbody>
          <?php
      $item = null;
      $valor = null;
      $users = UsersController::ctrShowUsers($item, $valor);

      foreach ($users as $key => $value) {
        echo 
        '<td>' . $value["username"] . '</td>
        <td> '. $value["first_name"] . '</td>
        <td>' . $value["email"] . '</td>
        
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
  </div>