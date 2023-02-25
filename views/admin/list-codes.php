<link rel="stylesheet" href="assets/css/admin/exercise.css">
<div class="content">
    <?php
    $item1 = "id_exercise";
    $value1 = $_GET["idExercise"];
    $exercise1 = ExerciseController::ctrShowExercise($item1, $value1);
    ?>
    <div class="d-flex justify-content-start mb-3 go">
        <button type=" button" class="btn btn-dark back"
            idLabels="<?php echo $exercise1["idLabel"]; ?>">&#129044;Atrás</button>
    </div>
    <h1 class="card-title ms-5 mt-3">
        <b>
            <?php echo $exercise1["name_exercise"]; ?>
        </b>
    </h1>

    <input type="hidden" value="<?php echo $exercise1['id_exercise']; ?>" id="exercise">

    <div class="d-flex justify-content-end go me-5">
        <button type="button" class="btn btn-primary createCode me-5"><i class="fa-solid fa-plus"></i>&nbsp;
            <b>Agregar
                Tarjeta</b>
        </button>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div class="box-body" style="width:80%;">
            <table class="table table-striped table-sm table-responsive bg-body-secondary codes" style="width:100%;">
                <thead class="table-dark">
                    <tr>
                        <th style="width:5%;">#</th>
                        <th>Código</th>
                        <th style="width:20%;">Número de tarjeta</th>
                        <th style="width:11%;">Opciones</thstyle=>
                    </tr>
                </thead>
            </table>
        </div>
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
                        <input onkeypress="return event.charCode != 34" type="text" name="name_code" id="name_code"
                            class="form-control" required>
                        <input type="hidden" name="idExercise" id="idExercise"
                            value="<?php echo $_GET['idExercise']; ?>" class="form-control" required>
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
                        <input type="text" onkeypress="return event.charCode != 34" name="nameCode" id="nameCode"
                            class="form-control" required>
                        <input type="hidden" name="idCode" id="idCode" class="form-control" required>
                        <input type="hidden" name="exercise" value="<?php echo $_GET["idExercise"]; ?>"
                            class="form-control" required>
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

<script src="assets/js/admin/list-codes-admin.js"></script>