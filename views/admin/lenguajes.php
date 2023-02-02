<div class="content">
  <link rel="stylesheet" href="assets/css/proyects.css">

  <div class="header">
    <ul class="nav">
      <li><a href="proyect"><b>Informacion Pagina</b></a></li>
      <li><a href="lenguajes"><b>Lenguajes</b></a></li>
    </ul>
  </div>

  <div class="content">
    <div class="row">
      <?php
        $item = null;
        $value = null;
        $languages = DashboardClientController::ctrShowLanguages($item, $value);
        foreach ($languages as $key => $language) 
        {
          echo 
          '<div class="col-sm-4 mb-2 mb-sm-0 languages">
          <a idLanguage="' . $language["id_language"] . '" btnShowLanguage  href="' . $language["route"] . '" style="text-decoration: none; color: black; size=1;" >
            <div class="card">
              <img src="' . $language["logo"] . '" class="card-img-top" alt="' . $language["name"] . '" style="width:100%;height: 185px;">

              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title" style="margin-bottom: 0;">' . $language["name"] . '</h5>
                </div>
                <p class="card-text">' . $language["description"] . '</p><br>
                <center><a href="*" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square" ></i>Editar</a></center>
              </div>
            </div>
          </a>
    </div>';
        }
      ?>
  </div>
</div>
















  </body>

  </html>