<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class TableLabelsClient
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
            
            $options = "<div class='btn-group'><button class='btn btn-success openLabel' numberLabel='" . $labels[$i]["number_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["id_label"] . "'></i>&nbsp;Aprende</button></div>";
            $state = 0;
            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
			      "' . $state . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 
		 }';

        echo $dataJson;
    }
}

$showTable = new TableLabelsClient();
$showTable->showTableLabels();