<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class TableLabels
{

    public function showTableLabels()
    {

        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $labels = LabelController::ctrShowTableLabels($item, $value);

        if (count($labels) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($labels); $i++) {

            if ($_GET["rol"] == 3) {
                $options = "<div class='btn-group'><button class='btn btn-success openExercises' idLabel='" . $labels[$i]["id_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver ejercicios</button><button class='btn btn-info updateLabel' idLabel='" . $labels[$i]["id_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "' data-bs-toggle='modal' data-bs-target='#updateLabelModal'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger deleteLabel' idLabel='" . $labels[$i]["id_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";
            } else {
                $options = "<div class='btn-group'><button class='btn btn-success openExercises' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["id_label"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver ejercicios</button><button class='btn btn-warning detail' idLabel='" . $labels[$i]["id_label"] . "' data-bs-toggle='modal' data-bs-target='#detail'><i class='fa-solid fa-eye'></i>&nbsp;Detalle</button></div>";
            }



            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
			      "' . $labels[$i]["number_label"] . '",
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