<div class="content" style="margin-bottom: 3%">
  <h1>Lenguajes</h1><br>
  <div class="row">
      <div class="row justify-content-end">
        <div class="col-auto">
         <button type="button" class="showLanguage btn btn-warning" data-bs-toggle="modal" 
         data-bs-target="#showLenguajesModal" data-bs-id="<?php $language["id_language"]; ?> ">
         <i class="fa-solid fa-circle-info"></i>&nbsp;<b>DETALLES</b>
          </button>            
        </div>
      </div>
  
    <?php
      $item = null;
      $value = null;
      $languages = DashboardAdminController::ctrShowLanguages($item, $value);
      foreach ($languages as $key => $language) {
        echo '
        <div class="col-sm-4 mb-5 mb-sm-0"><br>
          <a style="padding: 0;"
           idLanguage="' . $language["id_language"] . '">
            <span class="visually-hidden">Danger: </span>
            <div class="card">
              <img src="' . $language["logo_language"] . '" class="card-img-top" alt="' . $language["name_language"] . '" style="width:100%;height: 245px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;">' . $language["name_language"] . '</h5>
                </div>
              </div>
              <div class="btn-group  go">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="update-dashboardA?idLanguage='.$language["id_language"].'" class="btn btn-primary editbtn">
                <i class="fa-solid fa-pen-to-square"></i><b>&nbsp;&nbsp;EDITAR</b></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
              </div><br>
            </div>
          </a>
        </div>';
      }
    ?>
  </div>
</div>
<script>

</script>


  <!--=====================================
  MODAL MOSTRAR LENGUAJE
  ======================================-->

  <div class="modal fade" id="showLenguajesModal" tabindex="-1" aria-labelledby="showLenguajesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showLenguajesModalLabel"><b>Destalles de los Lenguajes</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <?php
              $item = null;
              $value = null;
              $languages = DashboardAdminController::ctrShowLanguages($item, $value);
              foreach ($languages as $key => $language) {
                echo '
                  
                    <div class="mb-3">
                      <h3><b>' . $language["name_language"] . '</b></h3>
                    </div>

                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Descripcion:</label>
                      <p>' . $language["description_language"] . '</p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondry" data-bs-dismiss="modal"></button>
                    </div>
                  
                ';
              }
            ?>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">SALIR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

