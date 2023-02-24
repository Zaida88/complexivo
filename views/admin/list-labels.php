<link rel="stylesheet" href="assets/css/admin/exercise.css">
<div class="content">
    <?php
    $item = "id_language";
    $value = $_GET["idLanguage"];
    $language = DashboardAdminController::ctrShowLanguages($item, $value);
    ?>
    <h1><b>Etiquetas de
            <?php echo $language["name_language"]; ?>
        </b></h1>
    <input type="hidden" value="<?php echo $_GET['idLanguage']; ?>" id="idLanguages">

    <div class="d-flex justify-content-end go">
        <button type="button" class="btn btn-primary createLabel"><i class="fa-solid fa-plus"></i>&nbsp;
            <b>Nueva Etiqueta</b>
        </button>
    </div><br>

    <div class="d-flex justify-content-center mt-3">
    <div class="box-body" style="width:90%;">
      <table class="table table-striped table-sm table-responsive bg-body-secondary labels" style="width:100%;">
        <thead class="table-dark">
          <tr>
            <th style="width:5%;">#</th>
            <th>Nombre</th>
            <th style="width:24%;">Opciones</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

</div>
<script src="assets/js/admin/label-admin.js"></script>