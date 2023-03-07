<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/img/icon.ico" type="image/x-icon">
    <title> WORLDCODES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

</head>

<body class="bg-body-tertiary">

    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
        include "views/layout/menu.php";
        if ($_SESSION["rol"] == 1) {
            if (isset($_GET["route"])) {
                if (
                    $_GET["route"] == "project" ||
                    $_GET["route"] == "users" ||
                    $_GET["route"] == "list-labels" ||
                    $_GET["route"] == "list-exercises" ||
                    $_GET["route"] == "list-codes" ||
                    $_GET["route"] == "dashboard-admin" ||
                    $_GET["route"] == "profile" ||
                    $_GET["route"] == "logout"
                ) {
                    include "views/admin/" . $_GET["route"] . ".php";

                } else {
                    include "views/admin/404.php";
                }
            } else {
                include "views/admin/dashboard-admin.php";
            }
        } else if ($_SESSION["rol"] == 2) {
            if (isset($_GET["route"])) {
                if (
                    $_GET["route"] == "dashboard-client" ||
                    $_GET["route"] == "wins" ||
                    $_GET["route"] == "list-labels" ||
                    $_GET["route"] == "show-label" ||
                    $_GET["route"] == "list-exercises" ||
                    $_GET["route"] == "exercise-cards" ||
                    $_GET["route"] == "profile" ||
                    $_GET["route"] == "logout"
                ) {
                    include "views/client/" . $_GET["route"] . ".php";
                } else {
                    include "views/client/404.php";
                }
            } else {
                include "views/client/dashboard-client.php";
            }
        } else if ($_SESSION["rol"] == 3) {
            if (isset($_GET["route"])) {
                if (
                    $_GET["route"] == "dashboard-content-creator" ||
                    $_GET["route"] == "list-labels" ||
                    $_GET["route"] == "list-exercises" ||
                    $_GET["route"] == "list-codes" ||
                    $_GET["route"] == "profile" ||
                    $_GET["route"] == "logout"
                ) {
                    include "views/admin/" . $_GET["route"] . ".php";
                } else {
                    include "views/admin/404-cc.php";
                }
            } else {
                include "views/admin/dashboard-content-creator.php";
            }
        }


    } else {
        if (isset($_GET["route"])) {
            if (
                $_GET["route"] == "home" ||
                $_GET["route"] == "reset-pass" ||
                $_GET["route"] == "login" ||
                $_GET["route"] == "registration"
            ) {
                include "views/" . $_GET["route"] . ".php";
            } else {
                include "views/404.php";
            }
        } else {
            include "views/home.php";
        }
    }
    ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/user.js"></script>
</body>

</html>