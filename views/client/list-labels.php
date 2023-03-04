<div class="content">
    <?php
    $item = "id_language";
    $value = $_GET["idLanguage"];
    $language = DashboardClientController::ctrShowLanguages($item, $value); ?>
    <h1 style="margin-bottom: 0;"><b>Etiquetas de
            <?php echo $language["name_language"] ?>
        </b></h1>
        
    <div class="input-group mb-3 me-3 mt-2 d-flex justify-content-end">
        <span class="input-group-text" id="basic-addon1">&#128270;</span>
        <input type="text" class="form-control" id="search" placeholder="Buscar" style="max-width:20%;">
    </div>

    <input type="hidden" value="<?php echo $language['id_language']; ?>" id="idLanguages">
    <div class="row" id="showLabels">

    </div>
</div>


<script src="assets/js/client/list-labels.js"></script>