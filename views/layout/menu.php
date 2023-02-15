<link rel="stylesheet" href="assets/css/menu.css">

<body id="body">

    <header>
        <div class="icon__menu me-5">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <div style="width: 87%; margin-left: 5%;" class="position-absolute">
            <div class="btn-group float-end">
                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img class="rounded-circle" style="width:40px;" src="<?php echo $_SESSION["photo_user"] ?>">
                    <?php echo $_SESSION["first_name_user"]; ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-code"></i>
            <h5>WORLDCODES</h5>
        </div>

        <div class="options__menu">

            <a href="profile">
                <div class="option">
                    <i class="fa-solid fa-user" title="Perfil"></i>
                    <h4>Perfil</h4>
                </div>
            </a>
            <?php
            if ($_SESSION["rol"] == 1) {
                echo '<a href="dashboard-admin">
            <div class="option" title="Inicio">
            <i class="fa-solid fa-house"></i>
                <h4>Inicio</h4>
            </div>
        </a>';
            }

            if ($_SESSION["rol"] == 2) {
                echo '<a href="dashboard-client">
            <div class="option" title="Inicio">
            <i class="fa-solid fa-house"></i>
                <h4>Inicio</h4>
            </div>
        </a>';
            }

            if ($_SESSION["rol"] == 3) {
                echo '<a href="dashboard-admin">
            <div class="option" title="Inicio">
            <i class="fa-solid fa-house"></i>
                <h4>Inicio</h4>
            </div>
        </a>';
            }

            if ($_SESSION["rol"] == 1) {
                echo '<a href="users">
                    <div class="option" title="Usuarios">
                    <i class=
                    "bx bx-group"></i>
                        <h4>Usuarios</h4>
                    </div>
                </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                    <a href="project">
                        <div class="option">
                        <i class="bx bxs-info-circle" title="Informacion General"></i>
                            <h4>Informacion General</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=2">
                        <div class="option">
                        <i class="bx bx-code-block" title="HTML"></i>
                            <h4>HTML</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=3">
                        <div class="option">
                        <i class="bx bxl-css3" title="CSS"></i>
                            <h4>CSS</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=1">
                        <div class="option">
                        <i class="bx bxl-nodejs" title="JavaScript"></i>
                            <h4>JAVASCRIPT</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                    <a href="wins">
                        <div class="option">
                        <i class="bx bx-trophy" title="Logros"></i>
                            <h4>Logros</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=2">
                        <div class="option">
                        <i class="bx bx-code-block" title="HTML"></i>
                            <h4>HTML</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=3">
                        <div class="option">
                        <i class="bx bxl-css3" title="CSS"></i>
                            <h4>CSS</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=1">
                        <div class="option">
                        <i class="bx bxl-nodejs" title="JavaScript"></i>
                            <h4>JAVASCRIPT</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 3) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=2">
                        <div class="option">
                        <i class="bx bx-code-block" title="HTML"></i>
                            <h4>HTML</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 3) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=3">
                        <div class="option">
                        <i class="bx bxl-css3" title="CSS"></i>
                            <h4>CSS</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 3) {
                echo '
                    <a href="index.php?route=list-exercises&idLanguage=1">
                        <div class="option">
                        <i class="bx bxl-nodejs" title="JavaScript"></i>
                            <h4>JAVASCRIPT</h4>
                        </div>
                    </a>';
            }
            ?>

        </div>

    </div>

    <script src="assets/js/menu.js"></script>
</body>

</html>