<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title> WORLDCODES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] == "ok") {
        include "views/layout/menu.php";
        if ($_SESSION["rol"] == 1) {
            if (isset($_GET["routes"])) {
                if (
                    $_GET["routes"] == "lenguajes" ||
                    $_GET["routes"] == "proyect" ||
                    $_GET["routes"] == "profile" ||
                    $_GET["routes"] == "users" ||
                    $_GET["routes"] == "html" ||
                    $_GET["routes"] == "css" ||
                    $_GET["routes"] == "js" ||
                    $_GET["routes"] == "dashboard-admin" ||
                    $_GET["routes"] == "profile" ||
                    $_GET["routes"] == "logout"
                ) {
                    include "views/admin/" . $_GET["routes"] . ".php";

                } else {
                    include "views/admin/404.php";
                }
            } else {
                include "views/admin/dashboard-admin.php";
            }
        } else if ($_SESSION["rol"] == 2) {
            if (isset($_GET["routes"])) {
                if (
                    $_GET["routes"] == "dashboard-client" ||
                    $_GET["routes"] == "html" ||
                    $_GET["routes"] == "js" ||
                    $_GET["routes"] == "css" ||
                    $_GET["routes"] == "wins" ||
                    $_GET["routes"] == "exercise" ||
                    $_GET["routes"] == "profile" ||
                    $_GET["routes"] == "logout"
                ) {
                    include "views/client/" . $_GET["routes"] . ".php";
                } else {
                    include "views/client/404.php";
                }
            } else {
                include "views/client/dashboard-client.php";
            }
        }


    } else {
        if (isset($_GET["routes"])) {
            if (
                $_GET["routes"] == "home" ||
                $_GET["routes"] == "reset-pass" ||
                $_GET["routes"] == "login" ||
                $_GET["routes"] == "registration"
            ) {
                include "views/" . $_GET["routes"] . ".php";
            } else {
                include "views/404.php";
            }
        } else {
            include "views/home.php";
        }
    }
    ?>
<script src="assets/js/main.js"></script>
<script src="assets/js/exercises.js"></script>
<script src="assets/js/proyect.js"></script>
</body>

</html>