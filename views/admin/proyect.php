<div class="content">
  <br>
  <center><h1> <b>Informacion del Proyecto</b></h1></center>

  <div class="container py-3">

    <table class="table table-striped table-hover mt-4">
      <thead class="table-dark">
        <tr>
          <td>Nombre</td>
          <td>Descripcion</td>
          <td>correo</td>
          <td>telefono</td>
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
            echo 
            '<td>
              <div style="width:90%;" class="go">
              <button type="button" class="float-sm-end btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#updateProyectModal"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
              </div>
            </td>';
            echo "</tr>";
          }
          
          ?>
        </tbody>
      </thead>
    </table>
  </div>

   <!--=====================================
      FORMILARIO EDITAR LOGO
    ======================================-->

    <div class="row">
      <div class="col-sm-5 col-md-2">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 15rem;">
            <img src="<?php echo $proyect["logo"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $proyect["logo"]; ?>">
            <div class="card-body">
              <div class="mb-2">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newLogo" name="newLogo" accept="image/*">
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button name="logo" type="submit" class="btn btn-success">Guardar Logo</button>
              </div>
            </div>
            <?php
            $updateLogo = new ProyectController();
            $updateLogo->ctrChangeLogo();
            ?>
        </form>
      </div><br>
    </div>

   <!--=====================================
    MODEL EDITAR PROYECTO
    ======================================-->
  <div class="modal fade" id="updateProyectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Proyecto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" name="name" value="<?php echo $proyect["name"]; ?>"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" class="form-control" name="description" value="<?php echo $proyect["description"]; ?>"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Telefono:</label>
              <input type="text" class="form-control" name="phoneNumber" value="<?php echo $proyect["phone_number"]; ?>"
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Correo:</label>
              <input type="email" class="form-control" name="email" value="<?php echo $proyect["email"]; ?>" required>
            </div>
      
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateProyect">Guardar</button>
            </div>
            <?php
            $updateProyect = new ProyectController();
            $updateProyect->ctrUpdateProyect();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
