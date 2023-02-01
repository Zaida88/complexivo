<div class="content">
    <h1>vista para realizar el ejercicio</h1>
    <?php
    $table = "codes";
    $item = "id_exercise";
    $value = $_GET["idExercise"];
    $result = ExerciseModel::mdlShowExercise($table, $item, $value);

    foreach ($result as $key => $code) {
        echo '<div class="col-sm-4 mb-5 mb-sm-0 languages">
      <div class="card">
      <h5 class="card-title" style="margin-bottom: 0;">' . $code["name"] . '</h5>
      </div>
      </div>';
    }
    ?>

</div>