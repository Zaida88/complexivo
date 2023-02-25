<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class TableLabels
{

    public function showTableLabels()
    {

        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $labels = LabelController::ctrTableLabels($item, $value);

        if (count($labels) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($labels); $i++) {

            $options = "<div class='btn-group'><button class='btn btn-success openExercises' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["id_label"] . "'><i class='fa-solid fa-eye'></i>&nbsp;Ver ejercicios</button><button class='btn btn-info updateLabel' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["id_label"] . "' data-bs-toggle='modal' data-bs-target='#updateLabelModal'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger deleteLabel' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["id_label"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 
		 }';

        echo $dataJson;
    }
}

$showTable = new TableLabels();
$showTable->showTableLabels();