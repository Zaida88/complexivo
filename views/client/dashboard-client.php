<div class="content" style="margin-bottom: 3%">
  <h1 class="d-flex justify-content-center">Lenguajes</h1><br>
  <div class="row">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardClientController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) {
      echo '<div class="col-sm-4 mb-5 mb-sm-0 go">
      <a style="padding: 0;" class="openLanguage btn" idLanguage="' . $language["id_language"] . '">
      <span class="visually-hidden">Danger: </span>
      <div class="card">
        <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 245px;">
        <div class="card-body">
        <div class="d-flex justify-content-center">
        <h5 class="card-title" style="margin-bottom: 0;">' . $language["name"] . '</h5>
        </div>
        <p class="card-text" style="margin-top: -20px;">' . $language["description"] . '</p><br>
        </div>
        </div>
        </a>
        </div>';
    }
    ?>
  </div>
</div>

<script src="assets/js/dashboard-client.js"></script>