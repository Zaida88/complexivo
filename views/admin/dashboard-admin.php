<div class="content">
  
<link rel="stylesheet" href="assets/css/lenguajes.css">

  <h1 class="d-flex justify-content-center"><b>Lenguajes</b></h1><br>
  <div class="row-1">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardAdminController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) {
      echo 
      '<div class="col-sm-3 mb-1 mb-sm-3 languages">
        <div>
          <a idLanguage="' . $language["id_language"] . '" btnShowLanguage  href="' . $language["route"] . '" style="text-decoration: none; color: black;" >
            <div class="card">
              <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 220px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;"><b>' . $language["name"] . '</b></h5>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>';
    }
    ?>
  </div>
</div>