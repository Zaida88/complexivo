<div class="content">
    <?php
        $item = "id_language";
        $value = $_GET["idLanguage"];
        $language = DashboardClientController::ctrShowLanguages($item, $value); ?>
  <h1 style="margin-bottom: 0;"><b>Ejercicios de <?php echo $language["name_language"] ?></b></h1>
    <div class="d-flex justify-content-end eye">
    <div class="input-group mb-3 me-3" style="width:20%;">
  <span class="input-group-text" id="basic-addon1">&#128270;</span>
  <input type="text" class="form-control" id="search" placeholder="Buscar">
</div>
        <h6 style="margin-top:9px; margin-right:2px;">Ver todos</h6>
        <button idLanguage="<?php echo $language['id_language']; ?>"
            id="show_password" type="button" class="btn btn-light showHidden mb-3"> <span
                class="fa fa-eye-slash icon"></span>
        </button>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUsers">
    <input type="hidden" value="<?php echo $language['id_language']; ?>" id="idLanguages">
    <div class="row" id="showExercises">

    </div>
</div>

<script src="assets/js/list-exercises-filter.js"></script>