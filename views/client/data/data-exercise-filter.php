<script src="assets/js/client/open-exercises.js"></script>
<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

class DataExerciseFilter
{
    public $labels;
    public function searchExerciseFilter()
    {
        $value = $this->labels;
        $value2 = $_GET["idUsers"];
        $value3 = $_GET["label"];
        $value4 = 0;
        $item = "idUser";
        $item2 = "id_label";
        $item3 = "state_win";
        $result = ExerciseController::ctrSearchExerciseFilter($item, $item2, $item3, $value, $value2, $value3, $value4);
        if (count($result) >= 1) {
            foreach ($result as $key => $values) { ?>
                <div class="card ms-4" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $values["name_exercise"]; ?>
                        </h5>
                        Realizado:
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

    public function showAllExercisesFilter()
    {
        $item1 = "state_win";
        $value1 = 0;
        $itemEx = "idUser";
        $item = "id_label";
        $value = $_GET["label"];
        $valueEx = $_GET["idUsers"];
        $optionEx = "*";
        $exercise = ExerciseController::ctrListExercisesFilter($itemEx, $item, $value, $valueEx, $item1, $value1, $optionEx);
        foreach ($exercise as $key => $values) { ?>
            <div class="card ms-4" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $values["name_exercise"]; ?>
                    </h5>
                    Realizado:
                    <input class="form-check-input" type="checkbox" <?php echo $values['state_win'] == true ? 'checked' : ''; ?>
                        onclick="return false;">
                    <div class="d-flex justify-content-center go">
                        <button type="submit" class="btn btn-primary openExercise"
                            idExercise="<?php echo $values['id_exercise']; ?>" idLanguage="<?php echo $value; ?>">Realizar</button>
                    </div>
                </div>
            </div>
        <?php }
    }
}

if (isset($_POST["labels"])) {
    $exercise = new DataExerciseFilter();
    $exercise->labels = $_POST["labels"];
    $exercise->searchExerciseFilter();
} else {
    $exercise = new DataExerciseFilter();
    $exercise->showAllExercisesFilter();
} ?>
