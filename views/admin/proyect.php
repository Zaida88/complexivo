<div class="content">
  <h1>Proyecto</h1>

  <div class="container py-3">

    <table class="table table-striped table-hover mt-4">
      <thead class="table-dark">
        <tr>
          <td>Nombre</td>
          <td>Descripcion</td>
          <td>correo</td>
          <td>telefono</td>
          <td>Logo</td>
          <td></td>
        </tr>
        
        <tbody>
          <?php
          
          $item = null;
          $valor = null;
          
          $proyect = ProyectController::ctrShowProyect($item, $valor);
          
          foreach ($proyect as $proyect){
            echo "<tr>";
            echo "<td>".$proyect['name']."</td>";
            echo "<td>".$proyect['description']."</td>";
            echo "<td>".$proyect['email']."</td>";
            echo "<td>".$proyect['phone_number']."</td>";
            echo "<td>".$proyect['logo']."</td>";
            echo 
            '<td>
              <div class="col-auto">
                <a href="#" class="btn btn-primary #btnUpdateProyect" data-bs-toggle="modal" data-bs-target="#updateProyectModal">Editar</a>
              </div>
            
            </td>';
            echo "</tr>";
          }
          
          ?>
        </tbody>
      </thead>
    </table>
  </div>

<!-- MODAL EDITAR PROYECTO-->

<div class="modal fade" id="updateProyectModal" tabindex="-1" aria-labelledby="updateProyectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateProyectModalLabel">EDITAR INFORMACION</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="updateName" id="updateName" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea name="updateDescription" id="updateDescription" class="form-control" row="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="updateEmail" id="updateEmail" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="phone_number" class="form-label">Telefono</label>
            <textarea type="number" name="updatePhoneNumber" id="updatePhoneNumber" class="form-control" required></textarea>
          </div>

          <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>
              <input type="file" class="newLogo" name="newLogo" accept="image/*"
                style="background:#615e9b; color:white;">
              <img src="assets/img/proyect/logo/img.png" 
                class="img-thumbnail previsualizarEditar" width="180px">
              <input type="hidden" name="logoActual" id="logoActual">

            </div>

          <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        <?php

          $updateProyect = new ProyectController();
          $updateProyect -> ctrUpdateProyect();

        ?>  
      </div>
    </div>
  </div>
</div>


</div>
</body>
</html>