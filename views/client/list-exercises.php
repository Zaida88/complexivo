<div class="content">
    <?php
    $item = "id_label";
    $value = $_GET["idLabel"];
    $label = LabelController::ctrShowLabel($item, $value);
    ?>
    <div class="d-flex justify-content-start go">
        <button type=" button" class="btn btn-dark back" idLabels="<?php echo $label["id_label"]; ?>">&#129044;&nbsp;Atrás</button>
    </div>
    <h1 class="mb-0 mt-2"><b>Ejercicios de
            <?php echo $label["name_label"] ?>
        </b></h1>
    <div class="d-flex justify-content-end eye">
        <div class="input-group mb-3 me-3" style="width:20%;">
            <span class="input-group-text" id="basic-addon1">&#128270;</span>
            <input type="text" class="form-control" id="search" placeholder="Buscar">
        </div>
        <h6 style="margin-top:9px; margin-right:2px;">Ocultar realizados</h6>
        <button idLabel="<?php echo $label['id_label']; ?>" type="button" class="btn btn-light showHidden mb-3"> <span
                class="fa fa-eye icon"></span>
        </button>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUsers">
    <input type="hidden" value="<?php echo $label['id_label']; ?>" id="id_label">
    <div class="row" id="showExercises">

    </div>
</div>


<script src="assets/js/client/list-exercises.js"></script>