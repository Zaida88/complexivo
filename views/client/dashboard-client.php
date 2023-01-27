<div class="content">
  <h1 class="d-flex justify-content-center">Lenguajes</h1><br>
  <div class="row">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardClientController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) {
      echo '<div class="col-sm-4 mb-5 mb-sm-0 languages">
      <a idLanguage="' . $language["id"] . '" btnShowLanguage  href="' . $language["route"] . '" style="text-decoration: none; color: black;" >
        <div class="card">
        <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 245px;">
        <div class="card-body">
        <div class="d-flex justify-content-center">
        <h5 class="card-title" style="margin-bottom: 0;">' . $language["name"] . '</h5>
        </div>
        <p class="card-text">' . $language["description"] . '</p><br>
        </div>
        </div>
        </a>
        </div>';
    }
    ?>
  </div>
</div>