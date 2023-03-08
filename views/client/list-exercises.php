<div class="content">
    <?php
    $item = "idLanguage";
    $item2 = "id_label";
    $value = $_GET["idLanguage"];
    $value2 = $_GET["idLabel"];
    $label = LabelController::ctrShowLabel($item, $value, $item2, $value2);
    ?>
    <div class="d-flex justify-content-start go">
        <button style="background-color:#B61717; color:white;" type=" button" class="btn back" numberLabel="<?php echo $label["number_label"]; ?>"
            idLanguages="<?php echo $label["idLanguage"]; ?>">
            <i class="fa-sharp fa-solid fa-arrow-left"></i>&nbsp;Regresar
        </button>
    </div>
    <h1 class="mb-0 mt-2"><b>Ejercicios de
            <?php echo $label["name_label"] ?>
        </b></h1>
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUsers">
    <input type="hidden" value="<?php echo $label['id_label']; ?>" id="id_label">
    <div class="d-flex justify-content-center mt-3">
        <div class="box-body" style="width:75%;">
            <table class="table table-striped table-sm table-responsive bg-body-secondary exercises" style="width:100%;">
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


<script src="assets/js/client/list-exercises.js"></script>