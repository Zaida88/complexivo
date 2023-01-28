<link rel="stylesheet" href="assets/css/proyect.css">


<div class="content">
  <div class="header">
    <ul class="nav">
      <li><a href="proyect"><b>Informacion Pagina</b></a></li>
      <li><a href="lenguajes"><b>Lenguajes</b></a></li>
    </ul>
  </div>

  <div class="box">

    <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas">

        <thead style="background-color:white; color:black; border: 1px white solid;">
          <tr>
            <th style="width:15%;">Nombre</th>
            <th style="width:25%;">Descripcion</th>
            <th style="">Logo</th>
            <th style="width:20%;">Correo</th>
            <th style="width:20%;">Telefono</th>
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
              <button class="btn btn-warning btnUpdateProyect" idProyect="'.$value["id"].'" data-toggle="modal" data-target="#modalUpdateProyect"><i class="fa fa-pencil"></i></button>
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

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#04246E; color:white">

            <button type="button" class="close" data-dismiss="modal"
              style="background:#04246E; color:white">&times;</button>

            <h4 class="modal-title" style="background:#04246E;">Editar Proyecto</h4>

          </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

          <div class="modal-body" style="background:white; color:white">

            <div class="box-body" style="background:white; color:white; border: 2px white solid;">

              <!-- ENTRADA PARA EL NOMBRE -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon" style="background:white; color:#04246E; border: 2px #04246E solid;"><i
                      class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" id="updateName" name="updateName" value=""
                    style="border: 2px #04246E solid;background:#04246E;color:white;" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL PROYECT -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon" style="background:white; color:#04246E; border: 2px #04246E solid;"><i
                      class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg" id="updateProyect" name="updateProyect" value=""
                    style="border: 2px #04246E solid;background:white;color:#04246E;" readonly>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

              <div class="form-group">

                <div class="panel" style="background:white; color:#04246E; border: 2px white solid;">SUBIR FOTO</div>

                <input type="file" class="nuevologo" name="updateLogo"
                  style="background:#04246E; color:white; border: 2px #04246E solid;">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="assets/img/proyect/default/anonymous.png"
                  style="background:#04246E; color:#04246E; border: 2px #04246E solid;"
                  class="img-thumbnail previsualizarEditar" width="130px">

                <input type="hidden" name="logoActual" id="logoActual">

              </div>

            </div>

          </div>

          <!--=====================================
        PIE DEL MODAL
        ======================================-->

          <div class="modal-footer" style="background:white; color:white; border: 2px white solid;">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
              style="background:#6A0436; color:white; border: 2px #6A0436 solid;">Salir</button>

            <button type="submit" class="btn btn-primary"
              style="background:#04246E; color:white; border: 2px #04246E solid;">Modificar Proyecto</button>

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