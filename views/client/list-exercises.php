<div class="content">
    <div class="d-flex justify-content-center">
        <?php
        $item = "id_language";
        $value = $_GET["idLanguage"];
        $language = DashboardClientController::ctrShowLanguages($item, $value);
        echo '<div>
  <h1 class="card-title" style="margin-bottom: 0;">Ejercicios de ' . $language["name"] . '</h1>
        </div>';
        ?>
    </div><br>
    <div class="d-flex justify-content-end eye">
        <h5>Ocultar finalizados</h5>
        <button idLanguage="<?php echo $language['id_language']; ?>" style="margin-top:-7px; margin-left:1px;"
            id="show_password" type="button" class="btn btn-light showHidden"> <span class="fa fa-eye icon"></span>
        </button>
    </div>
    <div class="row">
        <?php
        $itemEx = "id_user";
        $item = "id_language";
        $value = $language["id_language"];
        $valueEx = $_SESSION["id"];
        $optionEx = "*";
        $exercise = ExerciseController::ctrListExercises($itemEx, $item, $value, $valueEx, $optionEx);
        foreach ($exercise as $key => $values) { ?>
            <div class="card ms-4" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $values["name_exercise"]; ?>
                    </h5>
                    Finalizado:
                    <input class="form-check-input" type="checkbox" <?php echo $values['state'] == true ? 'checked' : ''; ?>
                        onclick="return false;">
                    <div class="d-flex justify-content-center go">
                        <button type="submit" class="btn btn-primary openExercise"
                            idExercise="<?php echo $values['id_exercise']; ?>"
                            idLanguage="<?php echo $value; ?>">Realizar</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="assets/js/list-exercises.js"></script>