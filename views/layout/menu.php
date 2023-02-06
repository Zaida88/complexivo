<link rel="stylesheet" href="assets/css/menu.css">

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <div style="width: 87%; margin-left: 5%;" class="position-absolute">
            <div class="btn-group float-end">
                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class='bx bx-user-circle'></i>
                    <?php echo $_SESSION["first_name"]; ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profile">Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>

    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class='bx bxs-food-menu'></i>
            <h4><b>MENU</b></h4>
        </div>
        <div class="options__menu">
            <?php
            if ($_SESSION["rol"] == 1) {
                echo '<a href="dashboard-admin">
                        <div class="option">
                        <i class="fa-solid fa-house"></i>
                            <h4>Inicio</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '<a href="dashboard-client">
            <div class="option">
            <i class="fa-solid fa-house"></i>
                <h4>Inicio</h4>
            </div>
        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '<a href="users">
                        <div class="option">
                        <i class=
                        "bx bx-group"></i>
                            <h4>Usuarios</h4>
                        </div>
                    </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="proyect">
                            <div class="option">
                            <i class="bx bxs-info-circle"></i>
                                <h4>Informacion General</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=2">
                            <div class="option">
                            <i class="bx bx-code-block"></i>
                                <h4>HTML</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=3">
                            <div class="option">
                            <i class="bx bxl-css3"></i>
                                <h4>CSS</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=1">
                            <div class="option">
                            <i class="bx bxl-nodejs"></i>
                                <h4>JAVASCRIPT</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="wins">
                            <div class="option">
                            <i class="bx bx-trophy"></i>
                                <h4>Logros</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=2">
                            <div class="option">
                            <i class="bx bx-code-block"></i>
                                <h4>HTML</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=3">
                            <div class="option">
                            <i class="bx bxl-css3"></i>
                                <h4>CSS</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="index.php?routes=list-exercises&idLanguage=1">
                            <div class="option">
                            <i class="bx bxl-nodejs"></i>
                                <h4>JAVASCRIPT</h4>
                            </div>
                        </a>';
            }
            ?>
        </div>

    </div>

    <script src="assets/js/menu.js"></script>
</body>