<?php

class LabelsController
{
    static public function ctrShowLabels($item, $value)
    {
        $table = "labels";
        $result = LabelsModel::mdlShowLabels($table, $item, $value);
        return $result;

    }

    static public function ctrCreateLabel()
    {
        if (isset($_POST['createLabel'])) {
            $idLanguage = $_POST["idLanguage"];
            $table1 = "labels";
            $item1 = "name_label";
            $value1 = $_POST["name_label"];
            $option1 = "*";
            $result1 = LabelsModel::mdlListLabelsAdminCreate($table1, $item1, $value1, $option1);

            if (empty($result1)) {
                
                if(!$_FILES['newImgLabel']['error'] == 0){
                    $table = "labels";
                    $newImgLabel = "assets/img/users/user-default.png";
                
                    $data = array(
                        "idLanguage" => $_POST["idLanguage"],
                        "name_label" => $_POST["name_label"],
                        "description_label" => $_POST["description_label"],
                        "img_label" => $newImgLabel
                    );
                    $result = LabelsModel::mdlCreateLabel($table, $data);

                    if ($result == "ok") {
                        $table1 = "labels";
                        $item1 = "name_label";
                        $value1 = $_POST["name_label"];
                        $result1 = LabelsModel::mdlListLabelsAdmin($table1, $item1, $value1);

                        
                    }
                }else{
                    $table = "labels";
                    $newImgLabel = $_FILES["newImgLabel"]["name"];
                    $path = $_FILES["newImgLabel"]["tmp_name"];
                    $route = "assets/img/labels/" . $_POST["newNameLabel"] . "/";
					if (!file_exists($route)) {
					mkdir($route, 0755);
					}
					$newImgLabel = $route . $photo;
					copy($path, $newImgLabel);

                    $data = array(
                        "idLanguage" => $_POST["idLanguage"],
                        "name_label" => $_POST["name_label"],
                        "description_label" => $_POST["description_label"],
                        "img_label" => $newImgLabel
                    );
                    
                    foreach ($result1 as $index => $value) {
                        $_SESSION["label"] = $value["id_label"];
                    }

                    echo '<script>
                    swal("Equeta agregada con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=labels&idLanguage=" + ' . $idLanguage . ';
                    });
                        </script>';
                }

            } else {
                echo '<script>
                swal("El nombre de la etiqueta ya se encuentra registrado", "", "error")
                .then((value) => {
                    window.location = "index.php?route=labels&idLanguage=" + ' . $idLanguage . ';
                });
                     </script>';
            }

        }
    }
}