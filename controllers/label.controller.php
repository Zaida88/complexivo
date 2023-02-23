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

                $table = "labels";
                $data = array(
                    "idLanguage" => $_POST["idLanguage"],
                    "name_label" => $_POST["name_label"],
                    "description_exercise" => $_POST["description_exercise"]
                );
                $result = ExerciseModel::mdlCreateExercise($table, $data);

                if ($result == "ok") {
                    $table1 = "labels";
                    $item1 = "name_label";
                    $value1 = $_POST["name_label"];
                    $result1 = ExerciseModel::mdlListExercisesAdmin($table1, $item1, $value1);


                    foreach ($result1 as $index => $value) {
                        $_SESSION["exercise"] = $value["id_exercise"];
                    }

                    echo '<script>
                    swal("Ejercicio agregado con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
                    });
                         </script>';
                }

            } else {
                echo '<script>
                swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                .then((value) => {
                    window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
                });
                     </script>';
            }

        }
    }
}