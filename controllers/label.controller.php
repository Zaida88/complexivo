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
                $name = $_POST["name_label"];
                $name = rtrim($name);
                $name = ltrim($name);
                $route = "assets/img/labels/" . $name . "/";
                if (!file_exists($route)) {
                    mkdir($route, 0777);
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
                    swal("Etiqueta agregada con exito", "", "success")
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

    static public function ctrShowLabelUpdate($item, $value)
    {
        $table = "labels";
        $result = LabelModel::mdlShowLabelUpdate($table, $item, $value);

        return $result;

    }

    static public function ctrUpdateLabel()
    {
        if (isset($_POST["updateLabel"])) {
            if (
                isset($_POST["description_label"]) &&
                isset($_POST["name_label"])
            ) {
                $table1 = "labels";
                $item1 = "id_label";
                $value1 = $_POST["idLabel"];
                $option = "name_label";
                $result1 = LabelModel::mdlVerifyLabel($table1, $item1, $value1, $option);
                $_SESSION["f"] = 0;

                foreach ($result1 as $index => $value) {
                    if (in_array($_POST["name_label"], $value) == 1) {
                        $_SESSION["f"]++;
                    }
                }

                if ($_SESSION["f"] == 0) {

                    if (!$_FILES['img_label']['error'] == 0) {
                        $table = "labels";
                        $data = array(
                            "id_label" => $_POST["idLabel"],
                            "name_label" => $_POST["name_label"],
                            "description_label" => $_POST["description_label"]
                        );
                        $results = LabelModel::mdlUpdateLabel($table, $data);

                        if ($results == "ok") {
                            echo '<script>
                                        swal("Actualizado con exito", "", "success")
                                        .then((value) => {
                                            window.location = "index.php?route=list-labels&idLanguage=" + ' . $_POST["idLanguages"] . ';
                                        });
                                             </script>';
                        }
                    } else {
                        $table = "labels";
                        $img = $_FILES["img_label"]["name"];
                        $path = $_FILES["img_label"]["tmp_name"];
                        $name = $_POST["name_label"];
                        $name = rtrim($name);
                        $name = ltrim($name);
                        $route = "assets/img/labels/" . $name . "/";
                        if (!file_exists($route)) {
                            mkdir($route, 0777);
                        }
                        $newLabelImg = $route . $img;
                        copy($path, $newLabelImg);
                        $data = array(
                            "id_label" => $_POST["idLabel"],
                            "name_label" => $_POST["name_label"],
                            "description_label" => $_POST["description_label"],
                            "img_label" => $newLabelImg
                        );
                        $results = LabelModel::mdlUpdateLabelImg($table, $data);

                        if ($results == "ok") {
                            echo '<script>
                                        swal("Actualizado con exito", "", "success")
                                        .then((value) => {
                                            window.location = "index.php?route=list-labels&idLanguage=" + ' . $_POST["idLanguages"] . ';
                                        });
                                             </script>';
                        }
                    }

                } else {
                    echo '<script>
                    swal("El nombre de la etiqueta ya se encuentra registrado", "", "error")
                    .then((value) => {
                        window.location = "index.php?route=list-labels&idLanguage=" + ' . $_POST["idLanguages"] . ';
                    });
                         </script>';
                }

            } else {
                $idLanguage = $_POST["language"];
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "index.php?route=list-labels&idLanguage=" + ' . $_POST["idLanguages"] . ';

				});
					 </script>';
            }
        }

    }

    static public function ctrDeleteLabel()
    {

        if (isset($_GET["idLabel"])) {

            $table = "code_exercise_label";
            $item = "idLabel";
            $value = $_GET["idLabel"];
            $value = (int) $value;
            $result = LabelModel::mdlShowDelete($table, $item, $value);
            if ($result) {
                $table2 = "wins";
                $data2 = $result["idExercise"];
                $result2 = WinsModel::mdlDeleteCode($table2, $data2);
                if ($result2) {
                    $table3 = "codes";
                    $data3 = $result["id_exercise"];
                    $result4 = CodeModel::mdlDeleteCodes($table3, $data3);
                    if ($result4) {
                        $table4 = "exercises";
                        $data4 = $_GET["idLabel"];
                        $result5 = ExerciseModel::mdlDeleteExercises($table4, $data4);
                        if ($result5) {
                            $table5 = "labels";
                            $data5 = $_GET["idLabel"];
                            $result6 = LabelModel::mdlDeleteLabel($table5, $data5);
                            if ($result6 == "ok") {
                                echo '<script>
                                    swal("La etiqueta ha sido eliminada correctamente", "", "success")
                                    .then((value) => {
                                        window.location = "index.php?route=list-labels&idLanguage=" + ' . $_GET["idLanguage"] . ';
                                    });
                                    </script>';
                            }
                        }
                    }
                }

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