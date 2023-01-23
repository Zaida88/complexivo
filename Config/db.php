<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load();
class Connect
{
    public static function connection()
    {
        $connection = new mysqli($_SERVER['MYSQL_ADDON_HOST'], $_SERVER['MYSQL_ADDON_USER'], $_SERVER['MYSQL_ADDON_PASSWORD'], $_SERVER['MYSQL_ADDON_DB']);
        if ($connection->connect_error) {
            die("Error de conexión:" . $connection->connect_error);
        } else {
            return $connection;
        }

    }
}
?>