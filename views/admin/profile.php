<div class="content">

<link rel="stylesheet" href="assets/css/users.css">

<h1 class="d-flex justify-content-center"><b>Perfil</b></h1><br>

<div class="row">

    <div class="col">

      <table class="table table-striped">

        <thead class="table-danger">
          <tr>
            <th style="width:15%; text-align: center;">Nombre de usuario</th>
            <th style="width:3%; text-align: center;"></th>
          </tr>
        </thead>

        <tbody>
          <?php
      $item = null;
      $valor = null;
      $users = UsersController::ctrShowUsers($item, $valor);

      
            ?>
        </tbody>
        
      </table>
      
    </div>
  </div>
  </div>