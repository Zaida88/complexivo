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
    <title> WORLDCODES </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    
    if(isset($_SESSION["login"]) && $_SESSION["login"] == "ok"){

        include "views/layout/menu.php";

        if (isset($_GET["routes"])) {

            if (
                $_GET["routes"] == "proyect" ||
                $_GET["routes"] == "dashboard" ||
                $_GET["routes"] == "logout"
            ) {
                include "views/" . $_GET["routes"] . ".php";

            } else {

                include "views/404.php";

            }

        } else {

            include "views/dashboard.php";

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
            }
        } else {
            include "views/home.php";
        }
    }
    ?>

</body>

</html>