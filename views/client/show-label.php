<div class="content">
    <link rel="stylesheet" href="assets/css/client/label.css">
    
        <?php
        $item = "id_label";
        $value = $_GET["idLabel"];
        $label = LabelController::ctrShowLabel($item, $value);
        ?>
        <div class="d-flex justify-content-start go">
            <button type=" button" class="btn btn-dark back"
            idLanguage="<?php echo $label ["idLanguage"]; ?>">&#129044;&nbsp;Regresar</button>
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
            <img src="<?php echo $label["img_label"] ?>" class="img-fluid me-5" alt="img">
        </div>
        <br><br>
        <div class="d-flex justify-content-center go">
            <button type="button" class="btn btn-success openListExercises" idLabel="<?php echo $label["id_label"]; ?>">
                <i class="fa-solid fa-book"></i></i>&nbsp;<b>Aprende más</b></button>
        </div><br>
    </div>
</div>

<script src="assets/js/client/open-label.js"></script>