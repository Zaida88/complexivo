<?php

class LabelController
{
    static public function ctrCreateLabel()
    {
        if (isset($_POST['createLabel'])) {
            $idLanguage = $_POST["idLanguage"];
            $table1 = "labels";
            $item1 = "name_label";
            $value1 = $_POST["name_label"];
            $option1 = "*";
            $result1 = LabelModel::mdlLabelsAdminCreate($table1, $item1, $value1, $option1);

            if (empty($result1)) {

                $table = "labels";
                $img = $_FILES["img_label"]["name"];
                $path = $_FILES["img_label"]["tmp_name"];
                $route = "assets/img/labels/" . $_POST["name_label"] . "/";
                if (!file_exists($route)) {
                    mkdir($route, 0755);
                }
                $newLabelImg = $route . $img;
                copy($path, $newLabelImg);

                $data = array(
                    "idLanguage" => $_POST["idLanguage"],
                    "name_label" => $_POST["name_label"],
                    "description_label" => $_POST["description_label"],
                    "img_label" => $newLabelImg
                );
                $result = LabelModel::mdlCreateLabel($table, $data);

                if ($result == "ok") {
                    echo '<script>
                    swal("Etiqueta agregado con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=list-labels&idLanguage=" + ' . $idLanguage . ';
                    });
                         </script>';
                }

            } else {
                echo '<script>
                swal("El nombre de la etiqueta ya se encuentra registrado", "", "error");
                     </script>';
            }

        }
    }

    static public function ctrDeleteLabel()
    {

        if (isset($_GET["idLabel"])) {

            $table1 = "labels";
            $data1 = $_GET["idLabel"];
            $data1 = (int) $data1;
            $result = LabelModel::mdlDeleteLabel($table1, $data1);

            if ($result == "ok") {

                echo '<script>
                swal("La etiqueta ha sido eliminada correctamente", "", "success")
                .then((value) => {
                    window.location = "index.php?route=list-labels&idLanguage=" + ' . $_GET["idLanguage"] . ';
                });
                </script>';
            }
        }

    }

    static public function ctrShowLabel($item, $value)
    {
        $table = "labels";
        $results = LabelModel::mdlShowLabel($table, $item, $value);

        return $results;

    }

    static public function ctrTableLabels($item, $value)
    {
        $table = "labels";
        $result = LabelModel::mdlTableLabels($table, $item, $value);
        return $result;

    }

    static public function ctrListLabels($item, $value, $option)
    {
        $table = "labels";
        $result = LabelModel::mdlListLabels($table, $item, $value, $option);
        return $result;

    }

    static public function ctrSearchLabel($value, $value2)
    {
        $table = "labels";
        $result = LabelModel::mdlSearchLabel($table, $value, $value2);
        return $result;

    }
}
?>