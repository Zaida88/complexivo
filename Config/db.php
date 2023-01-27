<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load();
class Connect
{
    static public function connection()
    {
        $connection = new PDO(
            "mysql:host=" . $_SERVER['MYSQL_ADDON_HOST'] . ";dbname=" . $_SERVER['MYSQL_ADDON_DB'],
            $_SERVER['MYSQL_ADDON_USER'],
            $_SERVER['MYSQL_ADDON_PASSWORD']
        );

        $connection->exec("set names utf8");

        return $connection;

    }
}
?>