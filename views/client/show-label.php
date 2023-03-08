<div class="content">
    <link rel="stylesheet" href="assets/css/client/label.css">

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
    <div class="conten">
        <h1>
            <b><br>
                <center><?php echo $label["name_label"] ?></center>
            </b>
        </h1>
        <div class="me-5 ms-3">
            <p>
                <?php echo $label["description_label"] ?>
            </p>
            <p style="text-align: center;">
                <img src="<?php echo $label["img_label"] ?>" class="img-fluid me-5" alt="img">
            </p>
        </div>
    
        <div class="d-flex justify-content-between m-5 navigate">
            <?php if ($label["number_label"] > 1) { ?>
                <button style="background-color:rgb(64, 14, 50); color:white;" type="button" class="btn back" idLanguages="<?php echo $label["idLanguage"] ?>"
                    numberLabels="<?php echo $label["number_label"] ?>">
                    <b><i class="fa-solid fa-arrow-left"></i></b>
                </button>
            <?php } ?>
            <div class="d-flex justify-content-center go">
                <button type="button" class="btn btn-success openListExercises" 
                    idLanguages="<?php echo $label["idLanguage"]; ?>" idLabel="<?php echo $label["id_label"] ?>">
                    <i class="fa-solid fa-book"></i>&nbsp;&nbsp;<b>Aprende más</b>
                </button>
        </div>
        <?php
        $item = "idLanguage";
        $value = $label["idLanguage"];
        $labels = LabelController::ctrTableLabels($item, $value);
        if ($label["number_label"] < count($labels)) { ?>
            <button style="background-color:rgb(64, 14, 50); color:white;" type="button" class="btn btn-secondary front" idLanguages="<?php echo $label["idLanguage"] ?>"
                numberLabels="<?php echo $label["number_label"] ?>">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        <?php } ?>
    </div><br>
</div>
<script src="assets/js/client/open-label.js"></script>