<script src="assets/js/client/open-label.js"></script>
<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class DataLabel
{
    public $languages;
    public function searchLabel()
    {
        $value = $this->languages;
        $value2 = $_GET["idLanguages"];
        $result = LabelController::ctrSearchLabel($value, $value2);
        if (count($result) >= 1) { ?>
            <?php foreach ($result as $key => $values) { ?>
                <div class="card ms-4" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $values["name_label"]; ?>
                        </h5>
                        <div class="d-flex justify-content-center go">
                            <button type="submit" class="btn btn-primary openLabel"
                                idLabels="<?php echo $values['id_label']; ?>">Ver</button>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "<center><h4>No hemos encotrado ningun registro con la palabra " . "<strong>" . $value . "</strong><h4><center>";
        }
    }

    public function showAllLabels()
    {
        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $option = "*";
        $label = LabelController::ctrListLabels($item, $value, $option);
        foreach ($label as $key => $values) { ?>
            <div class="card ms-4" style="width: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $values["name_label"]; ?>
                    </h5>
                    <div class="d-flex justify-content-center go">
                        <button type="submit" class="btn btn-primary openLabel"
                        idLabels="<?php echo $values['id_label']; ?>" >Ver</button>
                    </div>
                </div>
            </div>
        <?php } 
    }
}

if (isset($_POST["labels"])) {
    $label = new DataLabel();
    $label->languages = $_POST["labels"];
    $label->searchLabel();
} else {
    $label = new DataLabel();
    $label->showAllLabels();
} ?>
