

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

      <table class="table table-striped proyect">

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
        echo 
        '<td>' . $value["name"] . '</td>
        <td>' . $value["description"] . '</td>
        <td><img src="' . $value["logo"] . '" width="150px"></td>
        <td>' . $value["email"] . '</td>
        <td>' . $value["phone_number"] . '</td>
        
        <td>
        <div class="btn-group" >
        <button class="btn btn-primary btnUpdateProyect" idProyect="' . $value["id"] . '" data-bs-toggle="modal" data-bs-target="#modalUpdateProyect">Editar</button>
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

  <div id="modalUpdateProyect" class="modal fade" role="dialog">
    
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" method="POST" enctype="multipart/form-data">
        
          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header">

            <h4 class="modal-title">Editar Informacion</h4>
            
          </div>
          
          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->
          
          <div class="modal-body">

            <div class="box-body">
              
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="updateName" name="updateName" required>
                  <input type="hidden" name="idProyect" id="idProyect" required>

                </div>
            </div>

            <!-- ENTRADA PARA EL DESCRIPCION -->
            <div class="form-group">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <input type="text" class="form-control input-lg" id="updateDescription" name="updateDescription" required>

                </div>
            </div>

            <!-- ENTRADA PARA EL CORREO -->
            <div class="form-group">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="updateEmail" name="updateEmail" required>

                </div>
            </div>

            <!-- ENTRADA PARA EL TELEFONO -->
            <div class="form-group">
                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="updatePhoneNumber" name="updatePhoneNumber" required>

                </div>
            </div>


            <!-- ENTRADA PARA EL FOTO -->
            <div class="form-group">
                <div class="panel">
                  Selecione la foto:
                </div>
                
                <input type="file" class="newLogo" name="newLogo" accept="image/*"
                <img src="assets/img/proyect/logo/img.png" class="img-thumbnail previsualizarEditar" width="180px">
                <input type="hidden" name="logoActual" id="logoActual">
            </div>
            
            
            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">
            
          <button type="button" class="btn btn-default pull-left" data-dismis="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>

          </div>

          <?php
          $update = new ProyectController();
          $update -> ctrUpdateProyect();
          ?>
        </form>  
      </div>

    </div>

  </div>









  </body>

  </html>