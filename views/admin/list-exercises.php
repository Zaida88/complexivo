<div class="content">
    <div class="d-flex justify-content-center">
        <?php
        $item = "id_language";
        $value = $_GET["idLanguage"];
        $language = DashboardAdminController::ctrShowLanguages($item, $value);
        echo '<div>
  <h1 class="card-title" style="margin-bottom: 0;"><b> Ejercicio de ' . $language["name_language"] . '</b></h1>
        </div>';
        ?>
    </div><br>
    <div class="d-flex justify-content-end eye">
        <button idLanguage="<?php echo $language['id_language']; ?>" style="margin-top:-7px; margin-left:1px;"
            id="" type="button" class="btn btn-primary showexercise"> <b>Agregar Ejercicio</b> 
        </button>
    </div>
    <div class="row">
        <?php
        $itemEx = "idUser";
        $item = "id_language";
        $value = $language["id_language"];
        $valueEx = $_SESSION["id_user"];
        $optionEx = "*";
        $exercise = ExerciseController::ctrListExercises($itemEx, $item, $value, $valueEx, $optionEx);
        foreach ($exercise as $key => $values) { ?>
            <div class="card ms-4" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $values["name_exercise"]; ?>
                    </h5>
                    
                    <div class="d-flex justify-content-center go">
                        <button type="submit" class="btn btn-info editExercise" data-bs-toggle="modal" data-bs-target="#updateExerciseModal"
                            idExercise="<?php echo $values['id_exercise']; ?>"
                            idLanguage="<?php echo $value; ?>" > <b>Editar</b> </button>
                            &nbsp&nbsp
                        <button type="" class="btn btn-danger deleteExercise"
                            idExercise="<?php echo $values['id_exercise']; ?>"
                            idLanguage="<?php echo $value; ?>" > <b>Eliminar</b> </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<!--=====================================
  MODAL EDITAR EJERCICIOS
  ======================================-->

  <div class="modal fade" id="updateExerciseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Ejercicio</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post">

            <input  type="hidden" id="id_user" name="id_user">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre del Ejercicio:</label>
              <input type="text" name="name_exercise" id="name_exercise" class="form-control" value=""
                required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Descripcion:</label>
              <input type="text" name="description_exercise" id="description_exercise" class="form-control" value=""
                required>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success" name="updateUser">Guardar</button>
            </div>
            <?php
            $updateUser = new UsersController();
            $updateUser->ctrRenewUser();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>

<script src="assets/js/list-exercises.js"></script>