<?php

class CodeController
{
    static public function ctrListCodes($item, $value)
    {
        $table = "codes";
        $result = CodeModel::mdlListCodes($table, $item, $value);

        return $result;

    }

    static public function ctrCreateCode()
    {
        if (isset($_POST['createCode'])) {
            $idExercise = $_POST["idExercise"];
            $idLanguage = $_POST["idLanguage"];
            $value2 = $_POST["name_code"];
            $value3 = $_POST["number_code"];
            $table = "codes";

            $result = CodeModel::mdlCreateCode($table, $idExercise, $value2, $value3);

            if ($result == "ok") {
                echo '<script>
                    swal("Tarjeta agregada con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=list-codes&idLanguage=" + ' . $idLanguage . '+"&idExercise="+' . $idExercise . ';
                    });
                         </script>';
            }
        }
    }

    static public function ctrUpdateCode()
    {
        if (isset($_POST["updateCode"])) {
            if (
                isset($_POST["nameCode"]) &&
                isset($_POST["numberCode"])
            ) {
                $idExercise = $_POST["exercise"];
                $idLanguage = $_POST["language"];
                $table = "codes";
                $data = array(
                    "id_code" => $_POST["idCode"],
                    "name_code" => $_POST["nameCode"],
                    "number_code" => $_POST["numberCode"]
                );
                $results = CodeModel::mdlUpdateCode($table, $data);

                if ($results == "ok") {
                    echo '<script>
                	swal("Actualizado con exito", "", "success")
                	.then((value) => {
                		window.location = "index.php?route=list-codes&idLanguage=" + ' . $idLanguage . '+"&idExercise="+' . $idExercise . ';
                	});
                		 </script>';
                }


            } else {
                $idExercise = $_POST["exercise"];
                $idLanguage = $_POST["language"];
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "index.php?route=list-codes&idLanguage=" + ' . $idLanguage . '+"&idExercise="+' . $idExercise . ';

				});
					 </script>';
            }
        }

    }

    static public function ctrDeleteCode()
    {

        if (isset($_GET["idCode"])) {
            $idLanguage = $_GET["idLanguage"];
            $idExercise = $_GET["idExercise"];

            $table = "codes";
            $data = $_GET["idCode"];
            $data = (int) $data;
            $result = CodeModel::mdlDeleteCode($table, $data);

            if ($result == "ok") {

                echo '<script>
                        swal("La tarjeta ha sido eliminada correctamente", "", "success")
                        .then((value) => {
                            window.location = "index.php?route=list-codes&idLanguage=" + ' . $idLanguage . '+"&idExercise="+' . $idExercise . ';
                        });
                             </script>';

            }

        }

    }

}
?>