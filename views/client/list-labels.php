<div class="content">
    <?php
    $item = "id_language";
    $value = $_GET["idLanguage"];
    $language = DashboardClientController::ctrShowLanguages($item, $value); ?>
    <h1 style="margin-bottom: 0;"><b>Etiquetas de
            <?php echo $language["name_language"] ?>
        </b></h1>
    <input type="hidden" value="<?php echo $language['id_language']; ?>" id="idLanguages">
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUser">
    <div class="d-flex justify-content-center mt-5">
        <div class="box-body" style="width:75%;">
            <table class="table table-striped table-sm table-responsive bg-body-secondary labels" style="width:100%;">
                <thead class="table-dark">
                    <tr>
                        <th style="width:5%;">#</th>
                        <th>Nombre</th>
                        <th style="width:12%;">Estado</th>
                        <th style="width:12%;"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<script src="assets/js/client/list-labels.js"></script>
