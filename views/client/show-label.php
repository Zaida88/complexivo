<div class="content">
    <?php
    $item = "id_label";
    $value = $_GET["idLabel"];
    $label = LabelController::ctrShowLabel($item, $value);
    ?>
    <div class="d-flex justify-content-start go">
        <button type=" button" class="btn btn-dark back"
        idLanguage="<?php echo $label ["idLanguage"]; ?>">&#129044;Atrás</button>
    </div>
    <div class="d-flex justify-content-end go">
        <button type="button" class="btn btn-success openListExercises" idLabel="<?php echo $label["id_label"]; ?>">
        <i class="fa-regular fa-eye"></i>&nbsp; Ver ejercicios</button>
    </div>
    <h1>
        <?php echo $label["name_label"] ?>
    </h1>
    <div class="me-5 ms-3">
        <p>
            <?php echo $label["description_label"] ?>
        </p>
        <img src="<?php echo $label["img_label"] ?>" class="img-fluid me-5" alt="img">
    </div>
</div>

<script src="assets/js/client/open-label.js"></script>