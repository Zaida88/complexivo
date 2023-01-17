<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotEnv->load();

$conn = new mysqli($_SERVER['MYSQL_ADDON_HOST'], $_SERVER['MYSQL_ADDON_USER'], $_SERVER['MYSQL_ADDON_PASSWORD'], $_SERVER['MYSQL_ADDON_DB']);
$conn->query("set names 'utf8'"); 
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Error de conexión:" . $conn->connect_error);
}
?>