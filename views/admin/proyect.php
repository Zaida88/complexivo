

<div class="content">
  <link rel="stylesheet" href="assets/css/proyects.css">

  <div class="header">
    <ul class="nav">
      <li><a href="proyect"><b>Informacion Pagina</b></a></li>
      <li><a href="lenguajes"><b>Lenguajes</b></a></li>
    </ul>
  </div>

  <div class="row">

    <div class="col">

      <table class="table table-striped">

        <thead class="table-danger"">
          <tr>
            <th style="width:17%;">Nombre</th>
            <th style="width:20%;">Descripcion</th>
            <th style="width:10%">Logo</th>
            <th style="width:18%;">Correo</th>
            <th style="width:13%;">Telefono</th>
            <th style="width:8%;"></th>
          </tr>
        </thead>

        <tbody>
          <?php
      $item = null;
      $valor = null;
      $proyect = ProyectController::ctrShowProyect($item, $valor);

      foreach ($proyect as $key => $value) {
        echo '<td>' . $value["name"] . '</td>
        <td>' . $value["description"] . '</td>
        <td><img src="' . $value["logo"] . '" width="150px"></td>
        <td>' . $value["email"] . '</td>
        <td>' . $value["phone_number"] . '</td>
        
        <td>
        <div class="btn-group" >
        <button type="button" class="btn btn-primary"  . $value["id"] . data-bs-toggle="modal" data-bs-target="#modalUpdateProyect">Editar</button>
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
  MODAL EDITAR PROYECTO
  ======================================-->
  
 
  <div class="modal fade" id="modalUpdateProyect" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">

    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data"> 

        <div class="modal-header">
          <h4 class="modal-title" id="modalTitle"><b>Editar Imformacion</b></h4>
        </div>

        <div class="modal-body">
          <div class="box-body" ">

          <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group">

            <div class="input-group">

              <label><b>Nombre: </b></label>
              <input type="text"  name="updateName" id="updateName" required>
              <input type="hidden" name="idProyect" id="idProyect" required>

            </div>

          </div><br>

          <div class="form-group">

            <div class="input-group">

              <label><b>Descripcion: </b></label>
              <input class="form-control input-lg" name="updateDescription" id="updateDescription" rows="6" required>

            </div>

          </div><br>

          <div class="form-group">

            <div class="input-group">

              <label><b>Correo: </b></label>
              <input class="form-control input-lg" name="updateEmail" id="updateEmail" rows="6" required>

            </div>

          </div><br>

          <div class="form-group">

            <div class="input-group">

              <label><b>Telefono: </b></label>
              <input class="form-control input-lg" name="updatePhone_number" id="updatePhone_number" rows="6" required>

            </div>

          </div><br>

          <!-- ENTRADA PARA SUBIR FOTO -->

          <div class="form-group">

            <label><b>Logo</b></label><br>
            <input type="file" class="nuevoLogo" name="nuevoLogo" accept="image/*"
              style="background:#615e9b; color:white;">
            <img src="assets/img/proyect/logo/default/imgp.png" style="border: none; background-color:white;"
              class="img-thumbnail previsualizarEditar" width="130px">
            <input type="hidden" name="logoActual" id="logoActual">

          </div>
            
        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal"
            style="background:#6A0436; color:white; border: 2px #6A0436 solid;">Salir</button>
          <button type="submit" class="btn btn-primary"
            style="background:#615e9b; color:white; border: 2px #615e9b solid;">Guardar</button>

        </div>

          <?php

            $updateProyect = new ProyectController();
            $updateProyect -> ctrUpdateProyect();

          ?>

      </form>
      </div>

    </div>

  </div>









  </body>

  </html>