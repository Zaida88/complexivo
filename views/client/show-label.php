<div class="content">
    <?php
    $item = "idLanguage";
    $item2 = "number_label";
    $value = $_GET["idLanguage"];
    $value2 = $_GET["numberLabel"];
    $label = LabelController::ctrShowLabel($item, $value, $item2, $value2);
    ?>
    <div class="d-flex justify-content-start go mb-3">
        <button type=" button" class="btn btn-dark back"
            idLanguage="<?php echo $label["idLanguage"]; ?>">Regresar</button>
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
<div class="d-flex justify-content-between m-5 navigate">
    <?php if ($label["number_label"] > 1) { ?>
        <button type="button" class="btn btn-secondary back" idLanguages="<?php echo $label["idLanguage"] ?>"
            numberLabels="<?php echo $label["number_label"] ?>"><i class="fa-solid fa-arrow-left"></i></button>
    <?php } ?>
    <div class="d-flex justify-content-end go">
        <button type="button" class="btn btn-success openListExercises"
            idLanguages="<?php echo $label["idLanguage"]; ?>" idLabel="<?php echo $label["id_label"] ?>">Aprende
            mas</button>
    </div>
    <?php
    $item = "idLanguage";
    $value = $label["idLanguage"];
    $labels = LabelController::ctrShowTableLabels($item, $value);
    if ($label["number_label"] < count($labels)) { ?>
        <button type="button" class="btn btn-secondary front" idLanguages="<?php echo $label["idLanguage"] ?>"
            numberLabels="<?php echo $label["number_label"] ?>"><i class="fa-solid fa-arrow-right"></i></button>
    <?php } ?>
</div>

<script src="assets/js/client/open-label.js"></script>