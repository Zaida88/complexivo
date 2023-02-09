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
          
          $project = ProjectController::ctrShowProject($item, $valor);
          
          foreach ($project as $project){
            echo "<tr>";
            echo "<td>".$project['name_project']."</td>";
            echo "<td>".$project['description_project']."</td>";
            echo "<td>".$project['email_project']."</td>";
            echo "<td>".$project['phone_number_project']."</td>";
            echo 
            '<td>
              <div style="width:90%;" class="go">
              <button type="button" class="float-sm-end btn btn-primary proyeditbtn" data-bs-toggle="modal"
                data-bs-target="#updateProjectModal"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
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
      <div class="col-sm-5 col-md-4">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 13rem;">
            <img src="<?php echo $project["logo_project"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $project["logo_project"]; ?>">
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
            $updateLogo = new ProjectController();
            $updateLogo->ctrChangeLogo();
            ?>
        </form>
      </div><br>
    </div>

   <!--=====================================
    MODEL EDITAR PROYECTO
    ======================================-->
  <div class="modal fade" id="updateProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Proyecto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">

            <input type="hidden" id="idProject" name="idProject">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="name_project" id="nameProject" class="form-control" 
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="description_project" id="descriptionProject" class="form-control" 
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Telefono:</label>
              <input type="text" name="phone_number_project" id="phoneNumberProject" class="form-control" 
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Correo:</label>
              <input type="email_project" name="email_project" id="emailProject" class="form-control" required>
            </div>
      
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateProject">Guardar</button>
            </div>
            <?php
            $updateProject = new ProjectController();
            $updateProject->ctrUpdateProject();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/project.js"></script>