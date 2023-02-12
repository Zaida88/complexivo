<div class="content">
    <div class="d-flex justify-content-start code">
        <button idLanguage="<?php echo $_GET['idLanguage']; ?> type=" button"
            class="btn btn-light back">Regresar</button>
    </div>
    <div class="d-flex justify-content-center mb-3  ">
        <?php
        $item1 = "id_exercise";
        $value1 = $_GET["idExercise"];
        $exercise1 = ExerciseController::ctrShowExercise($item1, $value1);
        ?>
        <h1 class="card-title">
            <b>
                <?php echo $exercise1["name_exercise"]; ?>
            </b>
        </h1>
    </div>

    <div class="d-flex justify-content-end go">
        <button type="button" class="btn btn-primary createCode">
            <b>Agregar
                Tarjeta</b>
        </button>
    </div>


    <div class="d-flex justify-content-center go">
        <table class="table table-bordered" style="margin-top:2%; width:70%;">
            <thead>
                <tr>
                    <th style="width:65%;">Código</th>
                    <th>Número</th>
                    <th style="width:10%;">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $item = "idExercise";
                $value = $_GET["idExercise"];
                $exercise = CodeController::ctrListCodes($item, $value);
                foreach ($exercise as $key => $values) { ?>
                    <tr>
                        <td>
                            <?php echo $values["name_code"]; ?>
                        </td>
                        <td>
                            <?php echo $values["number_code"]; ?>
                        </td>
                        <td>
                            <div class="btn-group code">
                                <button class="btn btn-info updateCode" idCode="<?php echo $values['id_code']; ?>"
                                    data-bs-toggle="modal" data-bs-target="#updateCodeModal"><i
                                        class="fa-solid fa-pen-to-square"></i></button>

                                <button class="btn btn-danger deleteCode" idCode="<?php echo $values['id_code']; ?>"
                                    idLanguage="<?php echo $_GET['idLanguage']; ?>"
                                    idExercise="<?php echo $_GET['idExercise']; ?>"><i
                                        class="fa-regular fa-circle-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>
</div>

<div class="modal fade" id="createCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar Tarjeta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="post">
                    <div class="mb-2">
                        <label class="col-form-label">Código:</label>
                        <input type="text" name="name_code" id="name_code" class="form-control" required>
                        <input type="hidden" name="idExercise" id="idExercise"
                            value="<?php echo $_GET['idExercise']; ?>" class="form-control" required>

                        <input type="hidden" name="idLanguage" id="idLanguage"
                            value="<?php echo $_GET['idLanguage']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="col-form-label">Número:</label>
                        <input type="number" name="number_code" id="number_code" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="createCode">Guardar</button>
                    </div>
                    <?php
                    $createCode = new CodeController();
                    $createCode->ctrCreateCode();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Editar Tarjeta</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="post">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Código:</label>
                        <input type="text" name="nameCode" id="nameCode" class="form-control" required>
                        <input type="hidden" name="idCode" id="idCode" class="form-control" required>
                        <input type="hidden" name="language" id="language" class="form-control" required>
                        <input type="hidden" name="exercise" id="exercise" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Número:</label>
                        <input type="text" name="numberCode" id="numberCode" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="updateCode">Guardar</button>
                    </div>
                    <?php
                    $updateCode = new CodeController();
                    $updateCode->ctrUpdateCode();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$deleteCode = new CodeController();
$deleteCode->ctrDeleteCode();

?>

<script src="assets/js/list-codes-admin.js"></script>