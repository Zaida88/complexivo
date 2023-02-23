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
            $result1 = ExerciseModel::mdlListExercisesAdminCreate($table1, $item1, $value1, $option1);

            if (empty($result1)) {

                $table = "labels";
                $data = array(
                    "idLanguage" => $_POST["idLanguage"],
                    "name_label" => $_POST["name_label"],
                    "description_label" => $_POST["description_label"]
                );
                $result = ExerciseModel::mdlCreateExercise($table, $data);

                if ($result == "ok") {
                    $table1 = "labels";
                    $item1 = "name_label";
                    $value1 = $_POST["name_label"];
                    $result1 = ExerciseModel::mdlListExercisesAdmin($table1, $item1, $value1);


                    foreach ($result1 as $index => $value) {
                        $_SESSION["label"] = $value["id_label"];
                    }

                    echo '<script>
                    swal("Etiqueta agregado con exito", "", "success")
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

    static public function ctrUpdateLabel()
    {
        if (isset($_POST["updateLabel"])) {
            if (
                isset($_POST["nameLabel"]) &&
                isset($_POST["descriptionLabel"])
            ) {
                $table1 = "labels";
                $item1 = "id_label";
                $value1 = $_POST["idLabel"];
                $option = "name_label";
                $result1 = ExerciseModel::mdlVerifyExercises($table1, $item1, $value1, $option);
                $_SESSION["f"] = 0;

                foreach ($result1 as $index => $value) {
                    if (in_array($_POST["nameLabel"], $value) == 1) {
                        $_SESSION["f"]++;
                    }
                }

                if ($_SESSION["f"] == 0) {

                    $table = "labels";
                    $data = array(
                        "id_label" => $_POST["idLabel"],
                        "name_label" => $_POST["nameLabel"],
                        "description_label" => $_POST["descriptionLabel"]
                    );
                    $results = ExerciseModel::mdlUpdateExercise($table, $data);

                    if ($results == "ok") {
                        echo '<script>
                                        swal("Actualizado con exito", "", "success")
                                        .then((value) => {
                                            window.location = "index.php?route=labels&idLanguage=" + ' . $_POST["language"] . ';
                                        });
                                             </script>';
                    }

                } else {
                    echo '<script>
                    swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                    .then((value) => {
                        window.location = "index.php?route=labels&idLanguage=" + ' . $_POST["language"] . ';
                    });
                         </script>';
                }

            } else {
                $idLanguage = $_POST["language"];
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "index.php?route=labels&idLanguage=" + ' . $_POST["language"] . ';

				});
					 </script>';
            }
        }

    }

    static public function ctrTableLabels($item, $value)
    {
        $table = "labels";
        $result = LabelModel::mdlTableLabels($table, $item, $value);

        return $result;

    }

    static public function ctrDeleteLabel()
    {

        if (isset($_GET["idLabel"])) {

                if ($result == "ok") {

                    $table = "labels";
                    $data = $_GET["idLabel"];
                    $data = (int) $data;
                    $result = ExerciseModel::mdlDeleteExercise($table, $data);

                    if ($result == "ok") {
                        echo '<script>
                        swal("El ejercicio ha sido borrado correctamente", "", "success")
                        .then((value) => {
                            window.location = "index.php?route=list-exercises&idLanguage=" + ' . $_GET["idLanguage"] . ';
                        });
                             </script>';
                    }
                }
        }

    }
}
?>