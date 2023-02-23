<?php
require_once "../../controllers/label.controller.php";
require_once "../../models/label.model.php";

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

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
			      "' . $labels[$i]["description_label"] . '",
			      "' . $labels[$i]["img_label"] . '",
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