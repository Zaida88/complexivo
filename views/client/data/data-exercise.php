<script src="assets/js/client/open-exercises.js"></script>
<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

class DataExercise
{
    public $exercises;
    public function searchExercise()
    {
        $value = $this->exercises;
        $value2 = $_GET["idUsers"];
        $value3 = $_GET["idLanguages"];
        $result = ExerciseController::ctrSearchExercise($value, $value2, $value3);
        if (count($result) >= 1) { ?>
            <?php foreach ($result as $key => $values) { ?>
                <div class="card ms-4" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $values["name_exercise"]; ?>
                        </h5>
                        Finalizado:
                        <input class="form-check-input" type="checkbox" <?php echo $values['state_win'] == true ? 'checked' : ''; ?>
                            onclick="return false;">
                        <div class="d-flex justify-content-center go">
                            <button type="submit" class="btn btn-primary openExercise"
                                idExercise="<?php echo $values['id_exercise']; ?>" idLanguage="<?php echo $value; ?>">Realizar</button>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "<center><h4>No hemos encotrado ningun registro con la palabra " . "<strong>" . $value . "</strong><h4><center>";
        }
    }

    public function showAllExercises()
    {
        $itemEx = "idUser";
        $item = "id_language";
        $value = $_GET["idLanguages"];
        $valueEx = $_GET["idUsers"];
        $optionEx = "*";
        $exercise = ExerciseController::ctrListExercises($itemEx, $item, $value, $valueEx, $optionEx);
        foreach ($exercise as $key => $values) { ?>
            <div class="card ms-4" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $values["name_exercise"]; ?>
                    </h5>
                    Finalizado:
                    <input class="form-check-input" type="checkbox" <?php echo $values['state_win'] == true ? 'checked' : ''; ?>
                        onclick="return false;">
                    <div class="d-flex justify-content-center go">
                        <button type="submit" class="btn btn-primary openExercise"
                            idExercise="<?php echo $values['id_exercise']; ?>"
                            idLanguage="<?php echo $value; ?>" >Realizar</button>
                    </div>
                </div>
            </div>
        <?php } 
    }
}

if (isset($_POST["exercises"])) {
    $exercise = new DataExercise();
    $exercise->exercises = $_POST["exercises"];
    $exercise->searchExercise();
} else {
    $exercise = new DataExercise();
    $exercise->showAllExercises();
} ?>