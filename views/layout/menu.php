<link rel="stylesheet" href="assets/css/menu.css">

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <div style="width: 90%;">
            <a href="logout"><button type="button" class="btn float-sm-end"><b>Cerrar Sesión</b></button></a>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class='bx bxs-food-menu'></i>
            <h4><b>MENU</b></h4>
        </div>
        <div class="options__menu">

            <a href="#" class="selected">
                <div class="option">
                    <i class='bx bx-user-circle'></i>
                    <h4>Perfil</h4>
                </div>
            </a>
            <?php
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
                        <a href="html">
                            <div class="option">
                            <i class="bx bx-code-block"></i>
                                <h4>HTML</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="css">
                            <div class="option">
                            <i class="bx bxl-css3"></i>
                                <h4>CSS</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 1) {
                echo '
                        <a href="js">
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
                        <a href="html">
                            <div class="option">
                            <i class="bx bx-code-block"></i>
                                <h4>HTML</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="css">
                            <div class="option">
                            <i class="bx bxl-css3"></i>
                                <h4>CSS</h4>
                            </div>
                        </a>';
            }
            if ($_SESSION["rol"] == 2) {
                echo '
                        <a href="js">
                            <div class="option">
                            <i class="bx bxl-nodejs"></i>
                                <h4>JAVASCRIPT</h4>
                            </div>
                        </a>';
            }
            ?>
        </div>

    </div>

    <main>
    </main>

    <script src="assets/js/menu.js"></script>
</body>