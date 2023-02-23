<div class="content">
    <?php
        $item = "id_language";
        $value = $_GET["idLanguage"];
        $language = DashboardAdminController::ctrShowLanguages($item, $value);
    ?>
    <h1><b>Etiquetas de <?php echo $language["name_language"]; ?></b></h1>
    <input type="hidden" value="<?php echo $_GET['idLanguage']; ?>" id="idLanguages">

    <div class="d-flex justify-content-end go">
        <button type="button" class="btn btn-primary createLabel"><i class="fa-solid fa-plus"></i>&nbsp;
            <b>Nueva Etiqueta</b>
        </button>
    </div><br>

    <div class="row">
        <div class="col">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th style="width:15%;">Nombre</th>
            <th style="width:10%;">Descripcion</th>
            <th style="width:10%;">Imagen</th>
            <th style="width:7%;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $item = "idLanguage";
          $value = $language["id_language"];;
          $labels = LabelsController::ctrShowLabels($item, $value);

          foreach ($labels as $labels)
          {?>
          <tr>
            <td>
              <?php echo $labels['name_label'];?>
            </td>
            <td>
              <?php echo $labels['description_label']; ?>
            </td>
            <td>
              <div class="cord" style="width: 5rem;">
               <img src="<?php echo $labels['img_label'];?>" class="card-img-top previewImg" alt="">
              </div> 
            </td>
            
            
            <td>
              <div class="btn-group languages" >
                <button class="btn btn-success openExercise" idLanguage="<?php echo $values['idLanguage']; ?>"
                        idLabel="<?php echo $labels['id_label']; ?>">
                        <i class="fa-solid fa-eye"></i>
                </button>&nbsp;
                <button class="btn btn-info updateLabel" idLanguage="<?php echo $values['idLanguage']; ?>"
                        idLabel="<?php echo $labels['id_label']; ?>"
                        data-bs-toggle="modal" data-bs-target="#updateLabelsModal">
                        <i class="fa-solid fa-pen-to-square"></i>
                </button>&nbsp;
                <button class="btn btn-danger deleteLabel" idLanguage="<?php echo $values['idLanguage']; ?>"
                        idLabel="<?php echo $labels['id_label']; ?>">
                        <i class="fa-solid fa-trash"></i>
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
    </div>

    <div class="modal fade" id="createLabelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Nueva Etiqueta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="post">
                <div class="mb-2">
                    <label class="col-form-label">Nombre de la etiqueta:</label>
                    <input type="text" name="name_label" id="name_label" class="form-control" required>
                    <input type="hidden" name="idLanguage" id="idLanguage" value="<?php echo $language['id_language']; ?>"
                    class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="col-form-label">Descripcion:</label>
                    <input type="text" name="description_label" id="description_label" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="newImgLabel" class="form-label"><b>Imagen:</b></label><br>
                    <div class="file-select" id="src-file2">
                    <input type="file" class="newImgLabel" name="newImgLabel" accept="image/*">
                    </div>
                    <img src="assets/img/labels/user-default.png" class="previewImg"
                        width="180px">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="createLabel">Guardar</button>
                </div>
                <?php
                $createLabel = new LabelsController();
                $createLabel->ctrCreateLabel();
                ?>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateLabelsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Etiqueta</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" name="nameLanguage" id="nameLanguage" class="form-control" required>
                            <input type="hidden" name="idLanguage" id="idLanguage" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <input type="text" name="descriptionLanguage" id="descriptionLanguage" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="newImgLabel" class="form-label"><b>Imagen:</b></label><br>
                            <div class="file-select" id="src-file2">
                                <input type="file" class="newImgLabel" name="newImgLabel" accept="image/*">
                            </div>
                            <img src="assets/img/labels/user-default.png" class="previewImg"
                                width="180px">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" name="updateLanguage">Guardar</button>
                        </div> 
                        <?php
                            $updateLanguage = new DashboardAdminController();
                            $updateLanguage->ctrUpdateLanguage();
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $deleteLabel = new ExerciseController();
    $deleteLabel->ctrDeleteLabel();
?>
<script src="assets/js/label-admin.js"></script>