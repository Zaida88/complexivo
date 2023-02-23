<div class="content">
    <?php
    $item = "id_label";
    $value = $_GET["idLabels"];
    $label = LabelController::ctrShowLabel($item, $value);
    ?>
    <div class="d-flex justify-content-start go">
        <button type=" button" class="btn btn-dark back"
            idBack="<?php echo $value = $_GET["idLanguages"]; ?>">Regresar</button>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-success">Ver ejercicios</button>
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