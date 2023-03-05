<div class="content">
  <link rel="stylesheet" href="assets/css/projects.css">

  <br>
  <center><h1> <b>Informacion del Proyecto</b></h1></center>

  <div class="container">
    <div class="row py-5">
      <div class="col-sm-5 offset-sm-2 col-md-7 offset-md-0">
        <table class="table table-striped table-sm table-responsive bg-body-secondary mt-4">
          <thead class="table-dark">
            <tr>
              <td style="width:12%;"><b>Título</b></td>
              <td style="width:20%;"><b>Descripcion</b></td>
              <td style="width:10%;"><b>Correo</b></td>
              <td style="width:10%;"><b>Telefono</b></td>
              <td style="width:8%;"></td>
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
                  <div>
                  <button class="btn btn-info proyeditbtn" data-bs-toggle="modal"
                    data-bs-target="#updateProjectModal"><i class="fa-solid fa-pen-to-square"></i></button>
                  </div>
                </td>';
                echo "</tr>";
              }
              
              ?>
            </tbody>
          </thead>
        </table>
      </div>
    </div>   
    <div class="log">
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


            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="nameProject" class="form-control" value="<?php echo $project['name_project']; ?>"
                >
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="description" class="form-control" value="<?php echo $project['description_project'];?>"
                >
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Correo:</label>
              <input type="email" name="email"  class="form-control" value="<?php echo $project['email_project']; ?>" >
              
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Telefono:</label>
              <input type="text" name="phoneNumber" class="form-control" value="<?php echo $project['phone_number_project'];?>">
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