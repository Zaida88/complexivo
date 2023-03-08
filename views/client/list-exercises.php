<div class="content">
    <?php
    $item = "idLanguage";
    $item2 = "id_label";
    $value = $_GET["idLanguage"];
    $value2 = $_GET["idLabel"];
    $label = LabelController::ctrShowLabel($item, $value, $item2, $value2);
    ?>
    <div class="d-flex justify-content-start go">
        <button type=" button" class="btn btn-dark back" numberLabel="<?php echo $label["number_label"]; ?>"
            idLanguages="<?php echo $label["idLanguage"]; ?>">Regresar</button>
    </div>
    <h1 class="mb-0 mt-2"><b>Ejercicios de
            <?php echo $label["name_label"] ?>
        </b></h1>
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUsers">
    <input type="hidden" value="<?php echo $label['id_label']; ?>" id="id_label">
    <div class="row" id="showExercises">

    </div>
</div>


<script src="assets/js/client/list-exercises.js"></script>