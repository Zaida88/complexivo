<div class="content" style="margin-bottom: 3%">
  <center><h1><b>Lenguajes</b></h1></center><br>
  <div class="row">
      
      
        <div class="col-sm-2 mb-4 mb-sm-0"><br>
          
            </div class="row">
              <div class="col">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th style="width:15%;">Nombre</th>
                      <th style="width:15%;">Imagen</th>
                      <th style="width:3%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                       $item = null; 
                       $value = null;
                       $languages = DashboardAdminController::ctrShowLanguages($item, $value);
                       foreach ($languages as $key => $language) 
                          {
                            $data= $language['id_language']."||".
                                    $language['name_language']."||".
                                    $language['description_language'];
                          ?>
                        
                        <tr>
                          <td>
                            <?php echo $language["name_language"]; ?>
                          </td>
                          <td>
                            <?php echo $language["logo_language"]; ?>
                          </td>        
                          <td>
                            <div class="btn-group user" >
                              <button class="btn btn-info" idUser="<?php echo $language['id_language']; ?>"
                                data-bs-toggle="modal" data-bs-target="#updateLenguajesModal" onclick =" updateLenguageform(' <?php  echo  $data  ?> ') ">
                                <i class="fa-solid fa-user-pen"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>

              <br>
            </div>
          
        </div>
  </div>
</div>
<script>

</script>


  


 
<script src="assets/js/dashboard-admin.js"></script>









<div class="content">
  <link rel="stylesheet" href="assets/css/dashboard-admin.css">
    <center><h1> <b>Editar Lenguaje</b></h1></center>

    <div class="container py-3">
        <div class="col-sm-5 col-md-4">
            <form role="form" method="post">
                <input type="hidden" name="" id="id_language">
                <div class="contain">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><b>Nombre:</b></label>
                        <input type="text" name="" id="nameLanguageU" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label"><b>Descripcion:</b></label>
                        <input type="text" name="" id="descriptionLanguageU" class="form-control" >
                    </div>
                    <div class="modal-footer">
                        <a href="dashboard-admin" class="btn btn-secondary">Cancelar</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success" name="updateLenguage">Guardar</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>    
             <?php
                
             ?>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/dashboard-admin.js"></script>
