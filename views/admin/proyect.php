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
            echo '<td><img src=' . $proyect["logo"] . '" width="150px"></td>';
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


  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-4">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 14rem;">
            <img src="<?php echo $_SESSION["photo"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["photo"]; ?>">
            <div class="card-body">
              <div class="mb-3">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newlogo" name="newlogo" accept="image/*">
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button name="logo" type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <?php
            $updateLgo = new ProyectController();
            $updateLgo->ctrUpdateProyect();
            ?>
        </form>
      </div><br>
    </div>
  </div>
</div>
</div>