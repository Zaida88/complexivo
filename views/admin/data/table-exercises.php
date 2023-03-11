<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

class TableExercises
{
    public function showTableExercises()
    {

        $item = "idLabel";
        $value = $_GET["idLabels"];
        $exercises = ExerciseController::ctrTableExercises($item, $value);

        if (count($exercises) == 0) {
            echo '{"data": []}';
            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($exercises); $i++) {

            if ($_GET["rol"] == 3) {
                $options = "<div class='btn-group'><button class='btn btn-success openCards' idLabel='" . $exercises[$i]["idLabel"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver tarjetas</button><button class='btn btn-info updateExercise' idLabel='" . $exercises[$i]["idLabel"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "' data-bs-toggle='modal' data-bs-target='#updateExerciseModal'><i class='fa-solid fa-pen-to-square'></i></button>     <button class='btn btn-danger deleteExercise' idLabel='" . $exercises[$i]["idLabel"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";
            } else {
                $options = "<div class='btn-group'><button class='btn btn-success openCards' idLabel='" . $exercises[$i]["idLabel"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver tarjetas</button><button class='btn btn-warning detail' idExercise='" . $exercises[$i]["id_exercise"] . "' data-bs-toggle='modal' data-bs-target='#detail'><i class='fa-solid fa-eye'></i>&nbsp;Detalle</button></div>";
            }

            if ($exercises[$i]["idLevel"] == 1) {
                $level = "Principiante";
            } elseif ($exercises[$i]["idLevel"] == 2) {
                $level = "Intermedio";
            } else {
                $level = "Avanzado";
            }

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $exercises[$i]["name_exercise"] . '",
                  "' . $level . '",
			      "' . $exercises[$i]["number_exercise"] . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 

		 }';

        echo $dataJson;
    }
}

$showTable = new TableExercises();
$showTable->showTableExercises();