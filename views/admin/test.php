<?php
require_once "code.controller.php";
require_once "code.model.php";
if (isset($_POST["id_exercise"])) {
    $item = "idExercise";
    $value = $_POST["id_exercise"];
    $exercise = CodeController::ctrListCodes($item, $value);
    foreach ($exercise as $key => $values) { ?>
        <input id="floatingInput" type="text" name="nameCode[]" class="form-control mb-2"
            value="<?php echo $values['name_code']; ?>" required />
    <?php } ?>
<?php } else { ?>
sfsafsaf
<?php } ?>